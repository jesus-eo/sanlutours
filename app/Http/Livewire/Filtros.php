<?php

namespace App\Http\Livewire;

use App\Models\Tour;
use Livewire\Component;

class Filtros extends Component
{
    public $tipo ="";

    public function render()
    {
        return view('livewire.filtros',[
            "tours" => Tour::where('tipo', $this->tipo)->get(),
        ]);
    }
}
