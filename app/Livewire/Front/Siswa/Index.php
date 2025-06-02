<?php

namespace App\Livewire\Front\Siswa;

use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public $siswas;

    public function mount()
    {
        $this->siswas = Siswa::with('user')->get();
    }

    public function render()
    {
        return view('livewire.front.siswa.index');
    }
}
