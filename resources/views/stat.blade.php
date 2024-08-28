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
            <h1 class="text-4xl font-bold">Statistics Page</h1>
        </header>



        <div class="relative overflow-x-auto ">
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
                    </tr>
                </thead>
                <tbody>

                    @foreach ($records as $record)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $record->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $record->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $record->updated_at }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <p class="text-center py-4">Total Records: {{ $records->total() }}</p>
            {{ $records->links() }}

        </div>

    </div>

</body>

</html>