<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($data as $item)
        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <img class="rounded-t-lg" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" />
            <div class="p-5">
                <p class="text-gray-900/50">{{ $item->price }}</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->desc }}</p>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>
