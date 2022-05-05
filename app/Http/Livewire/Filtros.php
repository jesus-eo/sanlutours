<?php

namespace App\Http\Livewire;

use App\Models\Tour;
use Livewire\Component;

class Filtros extends Component
{
    public $busqueda = "";
    public $tipo ="";
    public $orden ="created_at";
    public $sentido ="asc";


    public function render()
    {

        return view('livewire.filtros',[
            "tours" => Tour::where('tipo', $this->tipo)->where('nombre', 'ilike', "%$this->busqueda%")->orderBy($this->orden, $this->sentido)->get(),
        ]);
    }
}
