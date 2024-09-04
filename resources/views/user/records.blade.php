@extends('user.layouts.app')

@section('title', 'Find DOT')

@section('content')

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
                        <th scope="col" class="px-6 py-3">
                            Actions
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
                            <td class="px-6 py-4">
                                <a href="{{ route('record.single', $record->name) }}" class="text-blue-500">Details</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <p class="text-center py-4">Total Records: {{ $records->total() }}</p>
            {{ $records->links() }}

        </div>

    </div>

@endsection