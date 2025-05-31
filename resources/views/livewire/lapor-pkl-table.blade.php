<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Laporan PKL</h2>

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama Siswa</th>
                <th class="border px-4 py-2">Industri</th>
                <th class="border px-4 py-2">Bidang Usaha</th>
                <th class="border px-4 py-2">Tanggal Mulai</th>
                <th class="border px-4 py-2">Tanggal Selesai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pkl as $lapor)
                <tr>
                    <td class="border px-4 py-2">{{ $lapor->no }}</td>
                    <td class="border px-4 py-2">{{ $lapor->nama_instansi }}</td>
                    <td class="border px-4 py-2">{{ $lapor->tanggal_mulai }}</td>
                    <td class="border px-4 py-2">{{ $lapor->tanggal_selesai }}</td>
                    <td class="border px-4 py-2">{{ $lapor->deskripsi_kegiatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Belum ada laporan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
