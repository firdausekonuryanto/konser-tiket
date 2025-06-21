<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4"><b>Detail Pemesanan Tiket</b></h2>
                    <hr><br>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Informasi Pemesanan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                            <div>
                                <p><span class="font-medium">Nama Pemesan:</span> {{ $order->nama_pemesan }}</p>
                                <p><span class="font-medium">Email:</span> {{ $order->email }}</p>
                            </div>
                            <div>
                                <p><span class="font-medium">Konser:</span> {{ $order->concert->judul }}</p>
                                <p><span class="font-medium">Tanggal Pesan:</span> {{ $order->created_at->translatedFormat('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-lg font-semibold mb-2">Detail Tiket</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border border-gray-300 dark:border-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                <tr>
                                    <th class="px-4 py-2 border">No</th>
                                    <th class="px-4 py-2 border">Kode Tiket</th>
                                    <th class="px-4 py-2 border">Status</th>
                                    @if (Auth::user()->role === 'admin')
                                    <th class="px-4 py-2 border">Aksi</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->details as $index => $detail)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 border font-mono">{{ $detail->ticket_code }}</td>
                                        
                                        <td class="px-4 py-2 border">
                                        @if($detail->is_used == 0)
                                         <span style="background-color: yellowgreen; color: black;" class="px-2 py-1 rounded-full text-xs">
                                                {{ $detail->is_used ? 'Sudah Digunakan' : 'Belum Digunakan' }}
                                            </span>
                                        </td>
                                        @else
                                        
                                                                                <span style="background-color: red; color: white;" class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">
                                                                                        {{ $detail->is_used ? 'Sudah Digunakan' : 'Belum Digunakan' }}
                                                                                    </span>


                                        @endif

                                       
                                       
                                        @if (Auth::user()->role === 'admin')    
                                        <td class="px-4 py-2 border text-center">
                                        <form action="{{ route('ticket.update-status', $detail->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="inline-block px-3 py-1 {{ $detail->is_used ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-blue-500 hover:bg-blue-600' }} text-white text-xs rounded">
                                                    {{ $detail->is_used ? 'Reset Status' : 'Tandai Digunakan' }}
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        @if (Auth::user()->role === 'admin')
 <a href="{{ route('pemesanan.index') }}" 
                           class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Kembali
                        </a>
                        @else
 <a href="{{ route('pemesanan_user.index') }}" 
                           class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Kembali
                        </a>
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>