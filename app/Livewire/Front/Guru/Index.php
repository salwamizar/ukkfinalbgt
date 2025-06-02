<?php

namespace App\Livewire\Front\Guru;

use Livewire\Component;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $gurus;

    public function mount()
    {
        $this->gurus = DB::table('gurus')
            ->select('*', DB::raw('getGenderCode(gender) as gender_text'))
            ->get();
    }

    public function render()
    {
        return view('livewire.front.guru.index');
    }
}
