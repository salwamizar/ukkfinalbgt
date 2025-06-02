<?php

namespace App\Livewire\Front\Industri;

use Livewire\Component;
use App\Models\Industri;
use Livewire\Volt\Compilers\Mount;

class Index extends Component
{

    public $industris;

    public function mount()
    {
        $this->industris = Industri::all();
    }

    public function render()
    {
        return view('livewire.front.industri.index');
    }
}
