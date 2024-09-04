<div class="bg-gray-800 py-8">

<div class="container mx-auto text-white px-4 py-2 w-4/5">
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
            <div class="flex ml-2">
                @php
                    $rating = $record->getRating();
                @endphp

                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $rating)
                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 1l2.928 6.472L20 7.778l-5 4.868 1.178 6.85L10 16.566l-6.178 3.93L5 12.646 0 7.778l7.072-.306L10 1z"
                            ></path>
                        </svg>
                    @else
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 1l2.928 6.472L20 7.778l-5 4.868 1.178 6.85L10 16.566l-6.178 3.93L5 12.646 0 7.778l7.072-.306L10 1z"
                            ></path>
                        </svg>
                    @endif
                @endfor
            </div>

        </div>
        <span class="ml-2 text-lg">({{ $record->getReviewCount() }} reviews)</span>
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
        <span class="text-gray-400">FMCSA: 8/30/2024UTC ?</span>
    </div>
</div>

</div>