<h1 class="text-2xl font-bold mb-4">Contacts</h1>
<div class="flex space-x-4">
    <!-- Names Column -->
    <div class="w-1/3 bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold mb-2">Names</h2>
        <ul>
            <li class="flex justify-between items-center py-2 border-b">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 20a8.571 8.571 0 01-5.833-2.267c-3.222-3.21-3.23-8.416-.013-11.637C5.66 4.495 7.84 3.6 10 3.6s4.34.895 5.847 2.497c3.217 3.221 3.209 8.427-.013 11.637A8.571 8.571 0 0110 20zM10 2a9.94 9.94 0 00-7.071 2.929C.682 5.924 0 7.871 0 10s.682 4.076 2.929 5.071A9.94 9.94 0 0010 18a9.94 9.94 0 007.071-2.929C19.318 14.076 20 12.129 20 10s-.682-4.076-2.929-5.071A9.94 9.94 0 0010 2z">
                        </path>
                    </svg>
                    <span class="text-lg">
                        @if (isset($record->properties['legal_name']))
                            {{ $record->properties['legal_name'] }}
                        @endif
                    </span>
                </div>
                <span class="text-gray-600 text-sm">{{date('m/d/Y', strtotime($record->properties['add_date']))}}</span>
            </li>
            @if (isset($record->properties['dba_name']))
                <li class="flex justify-between items-center py-2">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 20a8.571 8.571 0 01-5.833-2.267c-3.222-3.21-3.23-8.416-.013-11.637C5.66 4.495 7.84 3.6 10 3.6s4.34.895 5.847 2.497c3.217 3.221 3.209 8.427-.013 11.637A8.571 8.571 0 0110 20zM10 2a9.94 9.94 0 00-7.071 2.929C.682 5.924 0 7.871 0 10s.682 4.076 2.929 5.071A9.94 9.94 0 0010 18a9.94 9.94 0 007.071-2.929C19.318 14.076 20 12.129 20 10s-.682-4.076-2.929-5.071A9.94 9.94 0 0010 2z">
                            </path>
                        </svg>
                        <span class="text-lg">
                            {{ $record->properties['dba_name'] }}
                        </span>
                    </div>
                    <span
                        class="text-gray-600 text-sm">{{date('m/d/Y', strtotime($record->properties['mcs150_date']))}}</span>
                </li>
            @endif
        </ul>
    </div>

    <!-- Addresses Column -->
    <div class="w-1/3 bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold mb-2">Addresses</h2>
        <ul>
            <li class="flex items-center space-x-2 py-2 border-b">
                <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 20a8.571 8.571 0 01-5.833-2.267c-3.222-3.21-3.23-8.416-.013-11.637C5.66 4.495 7.84 3.6 10 3.6s4.34.895 5.847 2.497c3.217 3.221 3.209 8.427-.013 11.637A8.571 8.571 0 0110 20zM10 2a9.94 9.94 0 00-7.071 2.929C.682 5.924 0 7.871 0 10s.682 4.076 2.929 5.071A9.94 9.94 0 0010 18a9.94 9.94 0 007.071-2.929C19.318 14.076 20 12.129 20 10s-.682-4.076-2.929-5.071A9.94 9.94 0 0010 2z">
                    </path>
                </svg>
                <a href="{{ $record->addressLink }}" class="text-blue-600 hover:underline">
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
                        <path
                            d="M10 20a8.571 8.571 0 01-5.833-2.267c-3.222-3.21-3.23-8.416-.013-11.637C5.66 4.495 7.84 3.6 10 3.6s4.34.895 5.847 2.497c3.217 3.221 3.209 8.427-.013 11.637A8.571 8.571 0 0110 20zM10 2a9.94 9.94 0 00-7.071 2.929C.682 5.924 0 7.871 0 10s.682 4.076 2.929 5.071A9.94 9.94 0 0010 18a9.94 9.94 0 007.071-2.929C19.318 14.076 20 12.129 20 10s-.682-4.076-2.929-5.071A9.94 9.94 0 0010 2z">
                        </path>
                    </svg>
                    <span class="text-gray-600">
                        @if (Auth::check())
                            {{ $record->properties['phone'] }}
                        @else
                            <a href="/login" class="text-gray-500 hover:text-gray-700">Login to See</a>
                        @endif
                    </span>
                </div>
                <span class="text-gray-600 text-sm">4/10/2015 ?</span>
            </li>
        </ul>
    </div>
</div>


<br /><br />


<h1 class="text-2xl font-bold text-gray-700 mb-4">General</h1>

<div class="mb-4">
    <div class="flex space-x-2 mb-2">
        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">8/10/2022 ?</button>
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
                @if (isset($record->properties['legal_name']))
                    {{ $record->properties['legal_name'] }}
                @endif
            </li>
            <li>
                <span class="font-medium">DBA Name:</span>
                @if (isset($record->properties['dba_name']))
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
                    @if (isset($record->properties['docket1prefix']))
                        {{ $record->properties['docket1prefix'] }}
                    @endif
                    @if (isset($record->properties['docket1']))
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
            <li><span class="font-medium">Id:</span> ?</li>
        </ul>
    </div>
    <div>
        <ul class="text-gray-700 space-y-1">
            <li><span class="font-medium">Common:</span> —</li>
            <li><span class="font-medium">Contract:</span> Active (<a href="#" class="text-blue-500 hover:underline">5
                    years</a>)</li>
            <li><span class="font-medium">Broker:</span> ?</li>
            <li><span class="font-medium">Authority:</span> ?</li>

            @if (isset($record->properties['phy_street']) && !empty($record->properties['phy_street']))
                <li>
                    <span class="font-medium">Physical Address:</span>
                    <a href="#" class="text-blue-500 hover:underline">
                        {{ $record->properties['phy_street'] }},
                        {{ $record->properties['phy_city'] }} {{ $record->properties['phy_zip'] }}
                    </a>
                </li>
            @endif
            @if (isset($record->properties['carrier_mailing_street']) && !empty($record->properties['carrier_mailing_street']))
                <li>
                    <span class="font-medium">Mailing Address:</span>
                    <a href="#" class="text-blue-500 hover:underline">
                        {{ $record->properties['carrier_mailing_street'] }},
                        {{ $record->properties['carrier_mailing_city'] }} {{ $record->properties['carrier_mailing_zip'] }}
                    </a>
                </li>
            @endif
            <li class="flex justify-between items-center">
                <span class="font-medium">Phone:</span>
                @if (Auth::check())
                    {{ $record->properties['phone'] }}
                @else
                    <a href="/login" class="text-gray-500 hover:text-gray-700">Login to See</a>
                @endif
            </li>
            <li class="flex justify-between items-center">
                <span class="font-medium">Contact Name:</span>
                @if (Auth::check())
                    {{ $record->properties['legal_name'] }}
                @else
                    <a href="/login" class="text-gray-500 hover:text-gray-700">Login to See</a>
                @endif
            </li>
            @if (isset($record->properties['fax']))
                <li class="flex justify-between items-center">
                    <span class="font-medium">Fax:</span>
                    @if (Auth::check())
                        {{ $record->properties['fax'] }}
                    @else
                        <a href="/login" class="text-gray-500 hover:text-gray-700">Login to See</a>
                    @endif
                </li>
            @endif
            <li class="flex justify-between items-center">
                <span class="font-medium">Email:</span>
                @if (Auth::check())
                    {{ $record->properties['email_address'] }}
                @else
                    <a href="/login" class="text-gray-500 hover:text-gray-700">Login to See</a>
                @endif
            </li>
        </ul>
    </div>
</div>