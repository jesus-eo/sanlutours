<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use stdClass;

class PayPalController extends Controller
{
    public $plazasReservadas = 0;
    public $tour;
    public $plazas = 0;
    public $total;

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
        $this->total = request()->input('total');
        $this->plazasReservadas = request()->input('plazasreservadas');
        $this->tour = json_decode(request()->input('tour'));
        $this->plazas = intval($this->tour->plazas) - intval($this->plazasReservadas);
        session_start();
        $_SESSION['tour']=$this->tour;
        $_SESSION['plazasreservadas']=$this->plazasReservadas;
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
                        "currency_code" => "EUR",
                        "value" => $this->total
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
            $tour=$_SESSION['tour'];
            $plazasReservadas=$_SESSION['plazasreservadas'];
            $plazas=$_SESSION['plazas'];


            Tour::findOrfail($tour->id);
            DB::table('tours') -> where('id', $tour->id) ->update(["plazas" => $plazas]);
             #Creo reserva prueba
            $nuevoreserva = new Reserva();
            $nuevoreserva->numpersonas = $plazasReservadas;
            $nuevoreserva->fechahora = $tour->fechahora;
            $nuevoreserva->user_id = Auth::id();
            $nuevoreserva->tour_id = $tour->id;
            $nuevoreserva->save();

            unset($_SESSION['tour']);
            unset($_SESSION['plazas']);
            unset($_SESSION['plazasreservadas']);

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
