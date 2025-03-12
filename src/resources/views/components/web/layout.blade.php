<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'サイト名' }}</title>
    @vite(['resources/sass/web/app.scss', 'resources/js/web/app.js'])
</head>
<body
    id="{{ $bodys['id'] ?? 'app' }}"
    class="{{ $bodys['class'] ?? 'app' }}">

    <x-web.header />

    <main class="container">
        {{ $slot }}
    </main>

    <x-web.footer />

</body>
</html>
