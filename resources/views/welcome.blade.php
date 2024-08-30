<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find DOT</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">

    
    <header class="bg-gray-800">
        <nav class="container mx-auto px-4 py-2 flex items-center justify-between w-4/5">
            <div>
                <a href="/" class="text-white font-bold text-lg">Search companies</a>
                <a href="/about" class="ml-4 text-gray-300 hover:text-white">About</a>
                <a href="/contact" class="ml-4 text-gray-300 hover:text-white">Contact</a>
            </div>
            <div>
                <a href="/login" class="text-gray-300 hover:text-white">Login</a>
                <a href="/register" class="ml-4 text-gray-300 hover:text-white">Register</a>
            </div>
        </nav>
    </header>

    <div class="container mx-auto p-10 w-4/5">
        <header class="text-center py-8">
            <h1 class="text-4xl font-bold">Find your DOT</h1>
        </header>

        <div class="search-frontpage">
            <form class="mt-8" action="/" method="GET">
                <div class="flex items-center justify-center">
                    <input type="text" value="{{ request('search') }}" name="search" class="w-64 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                    <button type="submit" class="ml-4 px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
                </div>
            </form>
        </div>
        
        @if ( count($records) > 0)
            <div class="mt-8">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Operating status</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Docket</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dot</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $record->properties['status_code'] == 'A' ? 'Authorized for Property' : 'Not Authorized' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ( isset($record->properties['docket1prefix']) )
                                        {{ $record->properties['docket1prefix'] }}
                                    @endif
                                    @if ( isset($record->properties['docket1']) )
                                        {{ $record->properties['docket1'] }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="/records/{{ $record->name }}" class="text-blue-500 hover:text-blue-700">
                                        {{ $record->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ( isset($record->properties['legal_name']) )
                                        {{ $record->properties['legal_name'] }}
                                    @endif
                                    @if ( isset($record->properties['dba_name']) )
                                        <br/>
                                        <b>DBA Name:</b>
                                        <br/>
                                        {{ $record->properties['dba_name'] }}
                                    @endif
                                </td>
                                <td>
                                {{ $record->properties['phy_city'] }}, {{ $record->properties['phy_state'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="/login" class="text-gray-500 hover:text-gray-700">Login to See</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No records found.</p>
        @endif

        <br/><br/><br/>

    </div>

    <footer class="bg-gray-800 py-4 fixed bottom-0 w-full">
        <div class="container mx-auto flex justify-between w-4/5">
            <div class="flex items-center">
                <img src="https://dotfiler.stan-ideas.com/wp-content/uploads/dotfiler-logo.png" alt="Logo" class="h-8">
            </div>
            <div class="flex items-center">
                <ul class="flex space-x-4">
                    <li><a href="/menu1" class="text-gray-300 hover:text-white">Menu 1</a></li>
                    <li><a href="/menu2" class="text-gray-300 hover:text-white">Menu 2</a></li>
                    <li><a href="/menu3" class="text-gray-300 hover:text-white">Menu 3</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>