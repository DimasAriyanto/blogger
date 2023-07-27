<x-layout>
    <x-slot:title>
        Author
        </x-slot>
        <h1 class="mb-3 text-center">Author</h1>

        <div class="container">
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('userPost', ['user' => $user->username]) }}">
                            <div class="card bg-dark text-white">
                                <img src="https://source.unsplash.com/500x500?{{ $user->name }}" class="card-img"
                                    alt="{{ $user->name }}">
                                <div class="card-img-overlay d-flex align-items-center p-0">
                                    <h5 class="card-title text-center flex-fill p-4 fs-3"
                                        style="background-color: rgba(0,0,0,0.7)">{{ $user->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
</x-layout>
