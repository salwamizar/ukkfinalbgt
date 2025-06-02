<?php

namespace App\Livewire\Front\Pkl;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;
use App\Models\Pkl;
use Auth;
use Doctrine\DBAL\Query;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $siswaId, $industriId, $guruId, $mulai, $selesai;

    use WithPagination;
    public $userMail;
    public $search;
    public $rowPerPage=3;
    public $isOpen = 0;

    public function mount()
    {
        $this->userMail = Auth::user()->email;
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal() 
    {
        $this->isOpen = true;
    }

    public function closeModal() 
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.front.pkl.index', [
            'isOpen' => $this->isOpen,
            'pkls' => Pkl::latest()->paginate($this->rowPerPage),
            'pkls' => $this->search === Null ?
                Pkl::latest()->paginate($this->rowPerPage) :
                Pkl::latest()->whereHas('siswa', function ($query) {
                                    $query->where('nama', 'like', '%' . $this->search . '%');
                                })
                            ->orWhereHas('industri', function ($query) {
                                    $query->where('nama', 'like', '%' . $this->search . '%');
                            })->paginate($this->rowPerPage),
            
            // data siswa yangs edang login
            'siswa_login' => Siswa::where('email', '=', $this->userMail)->first(),

            'industris'=>Industri::all(),
            'gurus'=>Guru::all(),
        ]);
    }

    private function resetInputFields()
    {
        $this->siswaId      ='';
        $this->industriId   ='';
        $this->guruId       ='';
        $this->mulai        ='';
        $this->selesai      ='';
    }

    // validasi data
    public function store()
    {
        $this->validate([
            'siswaId'       => 'required',
            'industriId'    => 'required',
            'mulai'         => 'required|date',
            'selesai'       => 'required|date|after:mulai',
        ]);

                DB::beginTransaction();
        
        try {
            $siswa = Siswa::find($this->siswaId);

            if ($siswa->status_lapor_pkl) {
                // session()->flash('error', 'Transaksi dibatalkan: Siswa sudah melapor.');

                DB::rollBack();
                $this->closeModal();

                return redirect()->route('livewire.front.pkl.index')->with('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
            }

            // Simpan data PKL
            Pkl::create([
                'siswa_id'      => $this->siswaId,
                'industri_id'   => $this->industriId,
                'guru_id'       => $this->guruId,
                'mulai'         => $this->mulai,
                'selesai'       => $this->selesai,
            ]);

            // Update status_lapor siswa
            //$siswa->update(['status_lapor_pkl' => 1]);

            DB::commit();
            
            $this->closeModal();
            $this->resetInputFields();

            return redirect()->route('livewire.front.pkl.index')->with('success', 'Data PKL berhasil disimpan dan status siswa diperbarui!');
        }
        catch (\Exception $e) {
            DB::rollBack();
            // session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            $this->closeModal();
            return redirect()->route('livewire.front.pkl.index')->with('error', 'Terjadi kesalahan:');
        }
    }
}