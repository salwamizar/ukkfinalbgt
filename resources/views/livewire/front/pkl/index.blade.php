<div class="py-24">
    <x-layouts.app.header/>
    <!-- Card -->
    <div class="mx-auto rounded-lg shadow-md overflow-hidden px-4 py-4">

        <!-- Judul -->
        <div class="p-4 text-center text-xl font-bold">
            Daftar Siswa PKL
        </div>

        <!-- Form Entry dan Searching -->
        <div class="mx-auto flex items-center justify-between p-4 rounded-lg shadow-md">

            <!-- Button create pkl -->
                <button type="button" class="text-gray-900 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Lapor Pkl
                </button>

            <!-- Form searching -->

        </div>

        <!-- Table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Siswa</th>
                        <th scope="col" class="px-6 py-3">industri</th>
                        <th scope="col" class="px-6 py-3">Bidang Usaha</th>
                        <th scope="col" class="px-6 py-3">Guru pembimbing</th>
                        <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                        <th scope="col" class="px-6 py-3">Tanggal Selesai</th>
                        <th scope="col" class="px-6 py-3">Durasi (Hari)</th>
                    </tr>
                </thead>

                <!-- Data Tabel Pkl -->
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">No</td>
                        <td class="px-6 py-4">Nama"</td>
                        <td class="px-6 py-4">industri</td>
                        <td class="px-6 py-4">bidang Usaha</td>
                        <td class="px-6 py-4">guru pembimbing</td>
                        <td class="px-6 py-4">tanggal mulai</td>
                        <td class="px-6 py-4">tanggal selesai</td>
                        <td class="px-6 py-4">durasi</td>
                    </tr>
                </tbody>
            </table>

            <!-- Paginate -->
            <div>
            </div>

        </div>
    </div>
    
</div>
