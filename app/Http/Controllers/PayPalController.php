<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use stdClass;

class PayPalController extends Controller
{
    public $plazasReservadas = 0;
    public $tour;
    public $plazas = 0;

    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return redirect()->route('dashboard');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction()
    {
        #Recalculo las plazas
        $this->plazasReservadas = request()->input('plazasreservadas');
        $this->tour = json_decode(request()->input('tour'));
        $this->plazas = intval($this->tour->plazas) - intval($this->plazasReservadas);
        session_start();
        $_SESSION['idtour']=$this->tour->id;
        $_SESSION['plazas']=$this->plazas;


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "10.00"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirigir para aprobar href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    #redirige a paypal
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('fault', 'Algo salió mal.');

        } else {
            return redirect()
                ->route('createTransaction')
                ->with('fault', $response['message'] ?? 'Algo salió mal.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            session_start();
           $tourid=$_SESSION['idtour'];
           $plazas=$_SESSION['plazas'];


            Tour::findOrfail($tourid);
            DB::table('tours') -> where('id', $tourid) ->update(["plazas" => $plazas]);
            unset($_SESSION['idtour']);
            unset($_SESSION['plazas']);

            return redirect()
                ->route('dashboard')-> with("succes", "Pago realizado con exito");;
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('fault', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('dashboard')
            ->with('fault', $response['message'] ?? 'Tu has cancelado la transacción.');
    }
}
