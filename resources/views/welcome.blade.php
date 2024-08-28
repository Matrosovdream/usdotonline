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
            <h1 class="text-4xl font-bold">Find your DOT</h1>
        </header>

        <form class="mt-8" action="/" method="GET">
            <div class="flex items-center justify-center">
                <input type="text" value="{{ request('search') }}" name="search" class="w-64 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                <button type="submit" class="ml-4 px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
            </div>
        </form>

        <br/>

        <div class="relative overflow-x-auto ">
        @if ( count($records) > 0 )
            
                <table class="w-100 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mx-auto">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Updated
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Source
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Property
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $record->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $record->created_at ? $record->created_at->format('Y-m-d H:i') : 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $record->updated_at ? $record->updated_at->format('Y-m-d H:i') : 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $record->source->name }}
                                </td>
                                <td class="px-6 py-4">
                                    
                                    <ul>
                                        @foreach ($record->properties->take(10) as $prop)
                                            <li><b>{{ $prop->property_name }}</b> : {{ $prop->property_value }}</li>
                                        @endforeach
                                    </ul>
                                                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
        @else
            <p>No records found.</p>
        @endif
        </div>

    </div>

</body>

</html>