<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | {{ @$title }}</title>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    {{-- js --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <header>
        <x-navbar />
    </header>

    <main>
        <div class="container mt-4">
            {{ $slot }}
        </div>
    </main>
</body>

</html>
