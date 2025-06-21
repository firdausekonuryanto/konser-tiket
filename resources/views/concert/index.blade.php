<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Daftar Konser</h2>
                        <a href="{{ route('concert.create') }}" 
                           style="background-color:yellowgreen; color: black;" class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700">
                            + Tambah Konser
                        </a>
                    </div>

                    <div class="mb-6 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
    <form action="{{ route('concert.index') }}" method="GET" class="flex flex-wrap items-end gap-3">
        <!-- Search Field -->
        <div class="flex-1 min-w-[200px]">
            <label class="block text-sm font-medium mb-1">Cari (Judul/Lokasi)</label>
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
            <div>
                <label class="block text-sm font-medium mb-1"><br></label>
               <button type="submit" 
            style="background-color:orange; color: black;;" class="px-4 py-2 bg-blue-600 text-white border border-blue-600 rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                Terapkan
            </button>            
         @if(request()->anyFilled(['search', 'kategori', 'start_date', 'end_date']))
            <a href="{{ route('concert.index') }}" style="background-color: black; color: wthite;;"
                                class="px-4 py-2 bg-blue-600 text-white border border-blue-600 rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                Reset
            </a>
            @endif</div>
        </div>
    </form>
</div>


                    @if(session('success'))
                        <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border border-gray-300 dark:border-gray-700">
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
                                    <th class="px-4 py-2 border">Aksi</th>
                                </tr>
                            </thead>
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
                                       <td class="px-4 py-2 border space-x-1">
    <a href="{{ route('concert.show', $concert) }}"
       class="inline-flex items-center px-2 py-1 text-white text-xs rounded hover:opacity-90"
       style="background-color: #3B82F6;"> {{-- Biru --}}
        <!-- Icon Lihat (mata) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        Lihat
    </a>

    <a href="{{ route('concert.edit', $concert) }}"
       class="inline-flex items-center px-2 py-1 text-white text-xs rounded hover:opacity-90"
       style="background-color: #F59E0B;"> {{-- Kuning --}}
        <!-- Icon Edit (pensil) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5h6m-3-3v6m7 8a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h11a2 2 0 012 2z" />
        </svg>
        Edit
    </a>

    <form action="{{ route('concert.destroy', $concert) }}" method="POST" class="inline"
          onsubmit="return confirm('Yakin ingin menghapus konser ini?')">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="inline-flex items-center px-2 py-1 text-white text-xs rounded hover:opacity-90"
                style="background-color: #DC2626;"> {{-- Merah --}}
            <!-- Icon Hapus (trash) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
            Hapus
        </button>
    </form>
</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center px-4 py-4 text-gray-500">
                                            Belum ada konser.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
