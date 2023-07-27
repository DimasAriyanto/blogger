<x-layout>
    <x-slot:title>
        Category Post
        </x-slot>
        <h1 class="mb-3 text-center">Category Post By {{ $category->name }}</h1>

        {{-- <div class="row justify-content-center mb-3">
        <div class="col-md-6">
        <form action="/posts">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
        </div>
    </div> --}}

        @if ($category)
            <div class="container">
                <div class="row">
                    @foreach ($category->posts as $post)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a
                                        href="{{ route('categoryPost', ['category' => $post->category->slug]) }}"
                                        class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p>
                                        <small class="text-muted">
                                            By. <a href="{{ route('userPost', ['user' => $post->user->username]) }}"
                                                class="text-decoration-none">{{ $post->user->name }}</a>
                                            {{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p class="card-text">{{ $post->excerpt }}</p>
                                    <a href="{{ route('detail', ['post' => $post->slug]) }}"
                                        class="btn btn-primary">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center fs-4">No post found.</p>
        @endif

        {{-- <div class="d-flex justify-content-end">
    {{ $posts->links() }}
  </div> --}}
</x-layout>
