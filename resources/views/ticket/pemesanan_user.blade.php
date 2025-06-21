<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Daftar Pemesanan Tiket</h2>

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form Pencarian -->
                   <div class="mb-6">
    <form action="{{ route('pemesanan.index') }}" method="GET">
        <div class="flex items-stretch">
            <!-- Input Search -->
            <input type="text" 
       name="search" 
       placeholder="Cari berdasarkan ID, Nama, atau Kode Tiket"
       value="{{ request('search') }}"
       class="w-full sm:w-80 md:w-96 px-4 py-2 border border-r-0 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600">         
           
        <!-- Date Range -->
        <div class="flex items-center gap-2">
            <div>
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                       class="w-full text-gray-900 dark:text-gray-900 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:border-gray-500">
            </div>
            <span class="mb-1">-</span>
            <div>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                       class="w-full text-gray-900 dark:text-gray-900 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:border-gray-500">
            </div>
        </div>

       <!-- Submit Button -->
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white border border-blue-600 rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                Cari
            </button>
            
            <!-- Reset Button (conditional) -->
            @if(request('search'))
            <a href="{{ route('pemesanan.index') }}" 
               class="ml-2 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none flex items-center">
                Reset
            </a>
            @endif
        </div>
    </form>
</div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border border-gray-300 dark:border-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                <tr>
                                    <th class="px-4 py-2 border">No</th>
                                    <th class="px-4 py-2 border">ID</th>
                                    <th class="px-4 py-2 border">Nama Pemesan</th>
                                    <th class="px-4 py-2 border">Email</th>
                                    <th class="px-4 py-2 border">Judul Konser</th>
                                    <th class="px-4 py-2 border">Jumlah Tiket</th>
                                    <th class="px-4 py-2 border">Total Harga</th>
                                    <th class="px-4 py-2 border">Tanggal Pesan</th>
                                    <th class="px-4 py-2 border">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pesanan as $index => $order)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="px-4 py-2 border">{{ $pesanan->firstItem() + $index }}</td>
                                        <td class="px-4 py-2 border">{{ $order->id }}</td>
                                        <td class="px-4 py-2 border">{{ $order->nama_pemesan }}</td>
                                        <td class="px-4 py-2 border">{{ $order->email }}</td>
                                        <td class="px-4 py-2 border">{{ $order->concert->judul ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $order->jumlah_tiket }}</td>
                                        <td class="px-4 py-2 border">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                        <td class="px-4 py-2 border">{{ $order->created_at->translatedFormat('d F Y H:i') }}</td>
                                        <td class="px-4 py-2 border text-center">
                                            <a href="{{ route('pemesanan.detail', $order->id) }}" 
                                               class="inline-block px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center px-4 py-4 text-gray-500">
                                            @if(request('search'))
                                                Tidak ditemukan hasil pencarian untuk "{{ request('search') }}"
                                            @else
                                                Belum ada pemesanan tiket.
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $pesanan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>