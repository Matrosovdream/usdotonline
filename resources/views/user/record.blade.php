@extends('user.layouts.app')

@section('title', 'Find DOT')

@section('content')

    @include('user.components.record.header')

    <br/>

    <div class="container mx-auto text-black px-4 py-2 w-4/5">
        <!-- Tabs Navigation -->
        <div class="flex border-b border-gray-200">

            @foreach ($tabs as $tab)
                <button class="tab-button
                    py-2 px-4
                    {{ $tab['slug'] == $currentTab ? 'text-blue-600 border-b-2 border-blue-600 font-semibold' : '' }}">
                    <a href="/records/{{ $record->name }}/?tab={{ $tab['slug'] }}">{{ $tab['name'] }}</a>
                </button>   
            @endforeach

        </div>

    </div>

    <div class="container mx-auto text-black px-4 py-2 w-4/5">

        @if ($currentTab == 'general' || $currentTab == '')
            @include('user.components.record.tabs.general')
        @elseif ($currentTab == 'reviews')
            @include('user.components.record.tabs.reviews')
        @endif

    </div>

    <br/><br/>
    <br/><br/>

@endsection