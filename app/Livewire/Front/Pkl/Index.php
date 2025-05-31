<?php

namespace App\Livewire\Front\Pkl;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;
use App\Models\Pkl;
use Auth;
use Livewire\Component;

class Index extends Component
{
    public $userMail;
    public $isOpen = false;

    public function mount()
    {
        $this->userMail = Auth::user()->email;
    }

    public function create()
    {
        $this->openModal();
    }

    public function openModal() 
    {
        $this->isOpen = true;
    }

    public function hideModal() 
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.front.pkl.index', [
            'isOpen' => $this->isOpen,
        ]);
    }
}
