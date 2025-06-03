<?php

namespace App\Livewire\Front\Industri;

use Livewire\Component;
use App\Models\Industri;
use Livewire\Volt\Compilers\Mount;
use Livewire\WithPagination;

class Index extends Component
{

    public $industris;
    use WithPagination;

    public $rowPerPage=2;

    public function mount()
    {
        $this->industris = Industri::all();
    }

    public function render()
    {
        return view('livewire.front.industri.index', );
    }
}
