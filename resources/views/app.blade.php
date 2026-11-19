<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
        @routes
    @viteReactRefresh
    @vite(['resources/js/app.jsx', 'resources/css/app.css'])
    <x-inertia::head />
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body>
    <x-inertia::app />
</body>

</html>
