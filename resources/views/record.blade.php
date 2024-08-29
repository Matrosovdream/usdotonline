<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Statistics</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">

    <div class="container mx-auto p-10">
        <header class="text-center py-8">
            <h1 class="text-4xl font-bold">Dot #{{ $record->name }}</h1>
        </header>

        <p>
           {{ $record->properties->count() }}
        </p>

        <div class="relative overflow-x-auto ">

            @if ( $record->properties->count() > 0 )

                <ul>
                    @foreach($record->properties as $property)
                        <li class="bg-white border-b">
                            <h2 class="text-lg font-bold">{{ $property->property_name }}</h2>
                            <p class="text-gray-500">{{ $property->property_value }}</p>
                        </li>
                    @endforeach
                </ul>

            @endif

        </div>

    </div>

</body>

</html>