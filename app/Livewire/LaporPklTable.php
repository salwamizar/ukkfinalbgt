<?php

namespace App\Livewire;

use Livewire\Component;
use App\models\Pkl;
use Illuminate\Support\Facades\Auth;

class LaporPklTable extends Component
{

    public $pkl;

    public function mount()
    {
        $this->pkl = Auth::user()->siswa->laporanPkl ?? [];
    }

    public function render()
    {
        return view('livewire.lapor-pkl-table');
    }
}
