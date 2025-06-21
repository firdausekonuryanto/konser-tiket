<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
        <!-- Filter Section -->
                     <div class="mb-6 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
    <form action="{{ route('beli.index') }}" method="GET" class="flex flex-wrap items-end gap-3">
        <!-- Search Field -->
        <div class="flex-1 min-w-[200px]">
            <label class="block text-sm font-medium mb-1">Cari (Judul/artis/Lokasi)</label>
            <input type="text" name="search" value="{{ request('search') }}"
       class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:border-gray-500 text-gray-900 dark:text-gray-900">        </div>
        
        <!-- Category Filter -->
        <div class="flex-1 min-w-[180px]">
            <label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="kategori" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:border-gray-500 text-gray-900 dark:text-gray-900">
                <option value="">Semua</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Date Range -->
        <div class="flex items-center gap-2">
            <div>
                <label class="block text-sm font-medium mb-1">Mulai</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                       class="w-full text-gray-900 dark:text-gray-900 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:border-gray-500">
            </div>
            <span class="mb-1">-</span>
            <div>
                <label class="block text-sm font-medium mb-1">Akhir</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                       class="w-full text-gray-900 dark:text-gray-900 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:border-gray-500">
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex gap-2">
            <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white border border-blue-600 rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                Terapkan
            </button>
            @if(request()->anyFilled(['search', 'kategori', 'start_date', 'end_date']))
            <a href="{{ route('beli.index') }}" 
                                class="px-4 py-2 bg-blue-600 text-white border border-blue-600 rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                Reset
            </a>
            @endif
        </div>
    </form>
</div>

                        <!-- Main Table -->
                        <div class="overflow-x-auto">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <h2 class="text-2xl font-bold mb-4">Tabel Pembelian Tiket</h2>
                            <table class="min-w-full table-auto border border-gray-300 dark:border-gray-700">
                                <!-- Table Headers -->
                                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                    <tr>
                                        <th class="px-4 py-2 border">No</th>
                                        <th class="px-4 py-2 border">Judul</th>
                                        <th class="px-4 py-2 border">Artis</th>
                                        <th class="px-4 py-2 border">Waktu</th>
                                        <th class="px-4 py-2 border">Lokasi</th>
                                        <th class="px-4 py-2 border">Harga</th>
                                        <th class="px-4 py-2 border">Kuota</th>
                                        <th class="px-4 py-2 border">Kategori</th>
                                        <th class="px-4 py-2 border">Qty</th>
                                        <th class="px-4 py-2 border">Aksi</th>
                                    </tr>
                                </thead>
                                
                                <!-- Table Body -->
                                <tbody class="text-gray-900 dark:text-gray-100">
                                    @forelse($concerts as $index => $concert)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                            <td class="px-4 py-2 border">{{ $index + $concerts->firstItem() }}</td>
                                            <td class="px-4 py-2 border">{{ $concert->judul }}</td>
                                            <td class="px-4 py-2 border">{{ $concert->artis }}</td>
                                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($concert->waktu)->translatedFormat('d F Y H:i') }}</td>
                                            <td class="px-4 py-2 border">{{ $concert->lokasi }}</td>
                                            <td class="px-4 py-2 border">Rp{{ number_format($concert->harga, 0, ',', '.') }}</td>
                                            <td class="px-4 py-2 border">{{ $concert->kuota }}</td>
                                            <td class="px-4 py-2 border">{{ $concert->kategori }}</td>
                                            <td class="px-4 py-2 border">
                                                <input type="number" 
                                                       class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300
                                                       dark:bg-gray-700 dark:text-white dark:border-gray-600" 
                                                       name="qty" 
                                                       style="width: 70px;" 
                                                       id="qty_{{ $concert->id }}"
                                                       min="1"
                                                       max="5"
                                                       value="1">
                                            </td>
                                            <td class="px-4 py-2 border space-x-1">
                                                <form action="{{ route('beli.store', $concert->id) }}" method="POST" class="inline"
                                                    onsubmit="return confirm('Yakin ingin membeli tiket konser ini?') && setQtyValue(this, 'qty_{{ $concert->id }}')">
                                                    @csrf
                                                    <input type="hidden" name="jumlah_tiket" id="hidden_qty_{{ $concert->id }}">
                                                    <button type="submit" style="background-color: yellowgreen; color:black"
                                                            class="inline-block px-2 py-1 bg-green-600 text-white text-xs rounded hover:bg-green-700">
                                                        Beli
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center px-4 py-4 text-gray-500">
                                                Tidak ada konser yang ditemukan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $concerts->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function setQtyValue(form, qtyId) {
        const qtyInput = document.getElementById(qtyId);
        const hiddenInput = form.querySelector('input[name="jumlah_tiket"]');
        hiddenInput.value = qtyInput.value;
        return true;
    }
    </script>
</x-app-layout>