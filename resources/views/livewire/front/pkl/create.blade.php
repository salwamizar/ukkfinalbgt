<div>
<!-- Main modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal container -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Lapor Pkl
                        </h2>
                        <span>
                        {{ $siswa_login->nama }}

                        <button wire:click="closeModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="">
                        <form class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <select wire:model="siswaId" id="siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <!-- opsi siswa -->
                                        <option value="">Pilih Nama Siswa</option>
                                        <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
                                    </select>

                                    @error('siswaId') <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-2">
                                    <label for="industri" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Industri</label>
                                    <select wire:model="industriId" id="industri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <!-- opsi industri -->
                                        <option value="">Pilih Industri</option>
                                        @foreach ($industris as $industri )
                                            <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('industriId') <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-2">
                                    <label for="guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guru Pembimbing</label>
                                    <select wire:model="guruId" id="guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <!-- opsi guru  -->
                                        <option value="">Pilih Guru Pembimbing</option>
                                        @foreach ($gurus as $guru )
                                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('guruId') <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex items-center justify-between pb-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Pelaksanaan Pkl
                                    </h4>
                                </div>
                                
                                <!-- Tanggal Mulai -->
                                <div class="col-span-2">
                                    <label for="mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                                    <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input wire:model="mulai" datepicker id="default-datepicker" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="mm/dd/yy">
                                    </div>
                                    @error('mulai') <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Tanggal Selesai -->
                                <div class="col-span-2">
                                    <label for="selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                                    <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input wire:model="selesai" datepicker id="default-datepicker" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="mm/dd/yy">
                                    @error('selesai') <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>

                            </div>
                            <button wire:click="store()" type="button" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Simpan
                            </button>
                            <button wire:click="closeModal()" type="button" class="text-red inline-flex items-center bg-white-700 hover:bg-white-800 focus:ring-4 focus:outline focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Batal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
