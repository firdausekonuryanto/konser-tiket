<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
    <h2><b>Edit Konser</b></h2>
    <hr>
    <br>
    <form action="{{ route('concert.update', $concert->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('concert._form', ['concert' => $concert])
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
