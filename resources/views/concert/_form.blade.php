<table class="w-full text-sm text-left text-gray-700 dark:text-gray-200">
    <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
        <tr>
            <td class="py-2 w-1/4 font-medium">Judul</td>
            <td class="w-4">:</td>
            <td>
                <input type="text" name="judul" value="{{ old('judul', $concert->judul) }}"
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">Artis</td>
            <td>:</td>
            <td>
                <input type="text" name="artis" value="{{ old('artis', $concert->artis) }}"
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">Waktu</td>
            <td>:</td>
            <td>
                <input type="datetime-local" name="waktu"
                    value="{{ old('waktu', \Carbon\Carbon::parse($concert->waktu)->format('Y-m-d\TH:i')) }}"
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">Lokasi</td>
            <td>:</td>
            <td>
                <input type="text" name="lokasi" value="{{ old('lokasi', $concert->lokasi) }}"
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">Harga</td>
            <td>:</td>
            <td>
                <input type="number" name="harga" value="{{ old('harga', $concert->harga) }}"
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">Kuota</td>
            <td>:</td>
            <td>
                <input type="number" name="kuota" value="{{ old('kuota', $concert->kuota) }}"
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">Kategori</td>
            <td>:</td>
            <td>
                <select name="kategori"
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @foreach(['Festival', 'VIP', 'Presale'] as $kategori)
                        <option value="{{ $kategori }}" @selected(old('kategori', $concert->kategori) == $kategori)>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">URL Gambar</td>
            <td>:</td>
            <td>
                <input type="text" name="gambar" value="{{ old('gambar', $concert->gambar) }}"
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </td>
        </tr>
    </tbody>
</table>
