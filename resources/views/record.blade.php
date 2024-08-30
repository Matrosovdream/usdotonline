<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DOT #{{$record->name}}</title>

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

    <div class="bg-gray-800 py-8">

        <div class="container mx-auto w-full text-white px-4 py-2 w-4/5">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h1 class="text-3xl font-bold">
                        @if (isset($record->properties['legal_name']))
                            {{ $record->properties['legal_name'] }}
                        @endif
                    </h1>
                    <p class="text-lg text-gray-300">
                        {{ $record->properties['phy_city'] }}, {{ $record->properties['phy_state'] }}
                    </p>
                </div>
                <button class="bg-yellow-500 text-blue-900 py-2 px-4 rounded-lg hover:bg-yellow-600">
                    Start Monitoring
                </button>
            </div>
            <div class="flex items-center mb-4">
                <span class="text-lg">Rating</span>
                <div class="flex ml-2">
                    <!-- Assuming no rating stars filled -->
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09L5.8 10.7 1 6.49l6.561-.92L10 0l2.439 5.57L19 6.49l-4.8 4.21 1.678 7.39L10 15z">
                        </path>
                    </svg>
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09L5.8 10.7 1 6.49l6.561-.92L10 0l2.439 5.57L19 6.49l-4.8 4.21 1.678 7.39L10 15z">
                        </path>
                    </svg>
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09L5.8 10.7 1 6.49l6.561-.92L10 0l2.439 5.57L19 6.49l-4.8 4.21 1.678 7.39L10 15z">
                        </path>
                    </svg>
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09L5.8 10.7 1 6.49l6.561-.92L10 0l2.439 5.57L19 6.49l-4.8 4.21 1.678 7.39L10 15z">
                        </path>
                    </svg>
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09L5.8 10.7 1 6.49l6.561-.92L10 0l2.439 5.57L19 6.49l-4.8 4.21 1.678 7.39L10 15z">
                        </path>
                    </svg>
                </div>
                <span class="ml-2 text-lg">(0)</span>
            </div>
            <div class="flex items-center mb-4">
                <span class="text-lg">
                    DOT# <span class="font-bold text-white">{{ $record->name }}</span>
                </span>
                <span class="ml-4 text-lg">
                    @if (isset($record->properties['docket1prefix']))
                        {{ $record->properties['docket1prefix'] }}#
                    @endif
                    @if (isset($record->properties['docket1']))
                        {{ $record->properties['docket1'] }}
                    @endif
                </span>
                <a href="#" class="ml-4 text-yellow-500 hover:underline">Related Companies 17</a>
            </div>
            <div class="flex space-x-2 text-base">
                <?php if (isset($record->properties['add_date'])): ?>
                    <div class="bg-yellow-500 text-blue-900 py-2 px-4 rounded-lg text-center">
                        <span>Added</span> <b><?= date('Y') - date('Y', strtotime($record->properties['add_date'])) ?> years</b>
                    </div>
                <?php endif; ?>

                <?php if (isset($record->properties['mcs150_date'])): ?>
                    <div class="bg-yellow-500 text-blue-900 py-2 px-4 rounded-lg text-center">
                        <span>Contract Active</span> <b><?= date('Y') - date('Y', strtotime($record->properties['mcs150_date'])) ?> years</b>
                    </div>
                <?php endif; ?>

                <?php if (isset($record->properties['truck_units'])): ?>
                    <div class="bg-yellow-500 text-blue-900 py-2 px-4 rounded-lg text-center">
                        <span>Trailers</span> <b><?= $record->properties['truck_units'] ?></b>
                    </div>
                <?php endif; ?>

                <?php if (isset($record->properties['total_drivers'])): ?>
                    <div class="bg-yellow-500 text-blue-900 py-2 px-4 rounded-lg text-center">
                        <span>Drivers</span> <b><?= $record->properties['total_drivers'] ?></b>
                    </div>
                <?php endif; ?>
            </div>
            <div class="text-right mt-4">
                <span class="text-gray-400">FMCSA: 8/30/2024UTC</span>
            </div>
        </div>

    </div>

    <br/>

    <div class="container mx-auto w-full text-black px-4 py-2 w-4/5">
        <h1 class="text-2xl font-bold mb-4">Contacts</h1>
        <div class="flex space-x-4">
            <!-- Names Column -->
            <div class="w-1/3 bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold mb-2">Names</h2>
                <ul>
                    <li class="flex justify-between items-center py-2 border-b">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 20a8.571 8.571 0 01-5.833-2.267c-3.222-3.21-3.23-8.416-.013-11.637C5.66 4.495 7.84 3.6 10 3.6s4.34.895 5.847 2.497c3.217 3.221 3.209 8.427-.013 11.637A8.571 8.571 0 0110 20zM10 2a9.94 9.94 0 00-7.071 2.929C.682 5.924 0 7.871 0 10s.682 4.076 2.929 5.071A9.94 9.94 0 0010 18a9.94 9.94 0 007.071-2.929C19.318 14.076 20 12.129 20 10s-.682-4.076-2.929-5.071A9.94 9.94 0 0010 2z"></path>
                            </svg>
                            <span class="text-lg">
                                <?php if (isset($record->properties['legal_name'])): ?>
                                    {{ $record->properties['legal_name'] }}
                                <?php endif; ?>
                            </span>
                        </div>
                        <span class="text-gray-600 text-sm">{{date('m/d/Y', strtotime($record->properties['add_date']))}}</span>
                    </li>
                    <li class="flex justify-between items-center py-2">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 20a8.571 8.571 0 01-5.833-2.267c-3.222-3.21-3.23-8.416-.013-11.637C5.66 4.495 7.84 3.6 10 3.6s4.34.895 5.847 2.497c3.217 3.221 3.209 8.427-.013 11.637A8.571 8.571 0 0110 20zM10 2a9.94 9.94 0 00-7.071 2.929C.682 5.924 0 7.871 0 10s.682 4.076 2.929 5.071A9.94 9.94 0 0010 18a9.94 9.94 0 007.071-2.929C19.318 14.076 20 12.129 20 10s-.682-4.076-2.929-5.071A9.94 9.94 0 0010 2z"></path>
                            </svg>
                            <span class="text-lg">
                                <?php if (isset($record->properties['dba_name'])): ?>
                                    {{ $record->properties['dba_name'] }}
                                <?php endif; ?>
                            </span>
                        </div>
                        <span class="text-gray-600 text-sm">{{date('m/d/Y', strtotime($record->properties['mcs150_date']))}}</span>
                    </li>
                </ul>
            </div>

            <!-- Addresses Column -->
            <div class="w-1/3 bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold mb-2">Addresses</h2>
                <ul>
                    <li class="flex items-center space-x-2 py-2 border-b">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 20a8.571 8.571 0 01-5.833-2.267c-3.222-3.21-3.23-8.416-.013-11.637C5.66 4.495 7.84 3.6 10 3.6s4.34.895 5.847 2.497c3.217 3.221 3.209 8.427-.013 11.637A8.571 8.571 0 0110 20zM10 2a9.94 9.94 0 00-7.071 2.929C.682 5.924 0 7.871 0 10s.682 4.076 2.929 5.071A9.94 9.94 0 0010 18a9.94 9.94 0 007.071-2.929C19.318 14.076 20 12.129 20 10s-.682-4.076-2.929-5.071A9.94 9.94 0 0010 2z"></path>
                        </svg>
                        <a href="#" class="text-blue-600 hover:underline">
                            {{ $record->properties['phy_street'] }}, 
                            {{ $record->properties['phy_city'] }} {{ $record->properties['phy_zip'] }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info Column -->
            <div class="w-1/3 bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold mb-2">Contact Info</h2>
                <ul>
                    <li class="flex justify-between items-center py-2 border-b">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 20a8.571 8.571 0 01-5.833-2.267c-3.222-3.21-3.23-8.416-.013-11.637C5.66 4.495 7.84 3.6 10 3.6s4.34.895 5.847 2.497c3.217 3.221 3.209 8.427-.013 11.637A8.571 8.571 0 0110 20zM10 2a9.94 9.94 0 00-7.071 2.929C.682 5.924 0 7.871 0 10s.682 4.076 2.929 5.071A9.94 9.94 0 0010 18a9.94 9.94 0 007.071-2.929C19.318 14.076 20 12.129 20 10s-.682-4.076-2.929-5.071A9.94 9.94 0 0010 2z"></path>
                            </svg>
                            <span class="text-gray-600">
                                <a href="/login" class="text-gray-500 hover:text-gray-700">Login to See</a>
                            </span>
                        </div>
                        <span class="text-gray-600 text-sm">4/10/2015</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <br/><br/>


    <div class="container mx-auto w-full text-black px-4 py-2 w-4/5">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">General</h1>

        <div class="mb-4">
            <div class="flex space-x-2 mb-2">
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">8/10/2022</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">9/28/2020</button>
                <button class="px-4 py-2 bg-green-100 text-green-700 rounded-md">7/9/2019</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">12/13/2018</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">7/13/2018</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">4/10/2015</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">2/20/1997</button>
            </div>
            <!--<p class="text-gray-600 font-medium">7 changes</p>-->
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <ul class="text-gray-700 space-y-1">
                    <li>
                        <span class="font-medium">DOT Status:</span> 
                        <span class="text-green-500">Active</span>
                    </li>
                    <li>
                        <span class="font-medium">Operating Status:</span> 
                        <span class="text-green-500">
                            {{ $record->properties['status_code'] == 'A' ? 'Authorized for Property' : 'Not Authorized' }}
                        </span>
                    </li>
                    <li><span class="font-medium">Entity Type:</span> ?</li>
                    <li>
                        <span class="font-medium">Name:</span>
                        @if ( isset($record->properties['legal_name']) )
                            {{ $record->properties['legal_name'] }}
                        @endif
                    </li>
                    <li>
                        <span class="font-medium">DBA Name:</span> 
                        @if ( isset($record->properties['dba_name']) )
                            {{ $record->properties['dba_name'] }}
                        @endif
                    </li>
                    <li>
                        <span class="font-medium">DOT#:</span> 
                        <a href="#" class="text-blue-500 hover:underline">{{ $record->name }}</a>
                    </li>
                    <li>
                        <span class="font-medium">MC/MX/FF:</span> 
                        <a href="#" class="text-blue-500 hover:underline">
                            @if ( isset($record->properties['docket1prefix']) )
                                {{ $record->properties['docket1prefix'] }}
                            @endif
                            @if ( isset($record->properties['docket1']) )
                                {{ $record->properties['docket1'] }}
                            @endif
                        </a>
                    </li>
                    <li>
                        <span class="font-medium">Added:</span> 
                        <?= date('Y') - date('Y', strtotime($record->properties['add_date'])) ?> years ago
                    </li>
                    <li>
                        <span class="font-medium">Changed:</span>
                        <?= date('Y') - date('Y', strtotime($record->properties['mcs150_date'])) ?> years ago
                    </li>
                    <li><span class="font-medium">Id:</span> 3204581026131024417</li>
                </ul>
            </div>
            <div>
                <ul class="text-gray-700 space-y-1">
                    <li><span class="font-medium">Common:</span> —</li>
                    <li><span class="font-medium">Contract:</span> Active (<a href="#" class="text-blue-500 hover:underline">5 years</a>)</li>
                    <li><span class="font-medium">Broker:</span> —</li>
                    <li><span class="font-medium">Authority:</span> Property</li>
                    <li>
                        <span class="font-medium">Physical Address:</span>
                        <a href="#" class="text-blue-500 hover:underline">
                            {{ $record->properties['phy_street'] }}, 
                            {{ $record->properties['phy_city'] }} {{ $record->properties['phy_zip'] }}
                        </a>
                    </li>
                    <li>
                        <span class="font-medium">Mailing Address:</span>
                        <a href="#" class="text-blue-500 hover:underline">
                            {{ $record->properties['carrier_mailing_street'] }}, 
                            {{ $record->properties['carrier_mailing_city'] }} {{ $record->properties['carrier_mailing_zip'] }}
                        </a>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="font-medium">Phone:</span>
                        <a href="/login" class="text-gray-300 hover:text-white">Login to see</a>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="font-medium">Cell:</span>
                        <a href="/login" class="text-gray-300 hover:text-white">Login to see</a>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="font-medium">Contact Name:</span>
                        <a href="/login" class="text-gray-300 hover:text-white">Login to see</a>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="font-medium">Fax:</span>
                        <a href="/login" class="text-gray-300 hover:text-white">Login to see</a>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="font-medium">Email:</span>
                        <a href="/login" class="text-gray-300 hover:text-white">Login to see</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <br/><br/>
    <br/><br/>

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