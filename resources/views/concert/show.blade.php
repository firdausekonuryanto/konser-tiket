<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Detail Konser</h2>
                

                    <table class="text-sm text-left text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600">
                        <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                        <tr>
                            <td style="width: 33%;" rowspan="8">
 <img src="{{ $concert->gambar }}" alt="{{ $concert->judul }}" style="width: 400px;"
                             class="object-cover rounded shadow">
                            </td>
                        </tr>   
                        <tr>
                                <td style="width: 10%;"  class="py-2 px-3 font-medium w-1/4">Judul</td>
                                <td style="width: 5%;" class="w-4">:</td>
                                <td>{{ $concert->judul }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 font-medium">Artis</td>
                                <td>:</td>
                                <td>{{ $concert->artis }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 font-medium">Lokasi</td>
                                <td>:</td>
                                <td>{{ $concert->lokasi }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 font-medium">Waktu</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($concert->waktu)->translatedFormat('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 font-medium">Harga</td>
                                <td>:</td>
                                <td>Rp {{ number_format($concert->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 font-medium">Kuota</td>
                                <td>:</td>
                                <td>{{ $concert->kuota }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 font-medium">Kategori</td>
                                <td>:</td>
                                <td>{{ $concert->kategori }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6">
                        <a href="{{ route('concert.index') }}"
                           class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded shadow">
                            ← Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
