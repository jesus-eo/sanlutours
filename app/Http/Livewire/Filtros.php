<?php

namespace App\Http\Livewire;

use App\Models\Tour;
use Livewire\Component;

/**
 * Clases para filtrar tours por duracion, precio y busqueda por nombre.
 */
class Filtros extends Component
{
    public $busqueda = "";
    public $tipo ="";
    public $orden ="created_at";
    public $sentido ="asc";
    public $preciomax;

    /**
     * Realiza la busqueda de los tours que cumplen la condición del filtrado u ordenación.
     * @return array tours
     */
    public function render()
    {

        if($this->preciomax != null ){
            return view('livewire.filtros',[
                "tours" => Tour::where('tipo', $this->tipo)->where('precio','<',$this->preciomax)->where('nombre', 'ilike', "%$this->busqueda%")->orderBy($this->orden, $this->sentido)->get(),
            ]);
            $this->reset('preciomax');
        }
        return view('livewire.filtros',[
            "tours" => Tour::where('tipo', $this->tipo)->where('nombre', 'ilike', "%$this->busqueda%")->orderBy($this->orden, $this->sentido)->get(),
        ]);
    }
}
