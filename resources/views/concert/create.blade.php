<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
    <h2><b>Buat Konser Baru</b></h2>
    <hr>
    <br>
    <form action="{{ route('concert.store') }}" method="POST">
        @csrf
        @include('concert._form', ['concert' => new \App\Models\Concert])
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
