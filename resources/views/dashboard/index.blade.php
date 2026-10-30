@extends('layouts.app')
@section('title', $title)

@section('content')
    <h1 class="text-2xl font-bold">{{ $title }}</h1>

    {{-- Alert banner: @if / @elseif / @else --}}
    @if($alerts->count() > 0)
        <div class="bg-red-100 text-red-800 p-4 rounded">
            {{ $alerts->count() }} overdue vaccination(s) need attention.
        </div>
    @elseif($outOfStock)
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            MMR stock is low. Check the supply room.
        </div>
    @else
        <div class="bg-green-100 text-green-800 p-4 rounded">
            All clear.
        </div>
    @endif

    {{-- Stats: component used in a loop --}}
    <div class="grid gap-4 md:grid-cols-4">
        @foreach($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    {{-- Schedule table inside the slot component --}}
    <x-panel title="Vaccine Schedule">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b">
                    <th class="py-2 pr-4">#</th>
                    <th class="py-2 pr-4">Patient</th>
                    <th class="py-2 pr-4">Purok</th>
                    <th class="py-2 pr-4">Vaccine</th>
                    <th class="py-2 pr-4">Dose</th>
                    <th class="py-2 pr-4">Date</th>
                    <th class="py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules->sortByDesc('scheduled_at') as $row)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="py-2 pr-4">{{ $loop->iteration }}</td>
                        <td class="py-2 pr-4">{{ $row->patient_name }}</td>
                        <td class="py-2 pr-4">{{ $row->purok }}</td>
                        <td class="py-2 pr-4">{{ $row->vaccine }}</td>
                        <td class="py-2 pr-4">{{ $row->dose }}</td>
                        <td class="py-2 pr-4">{{ $row->scheduled_at->format('M d, Y') }}</td>
                        <td class="py-2">
                            {{ $row->status }}
                            @unless($row->status !== 'Overdue')
                                <span class="ml-1 bg-red-600 text-white text-xs px-2 py-0.5 rounded">Overdue</span>
                            @endunless
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-4 text-center text-gray-500">No schedules yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-panel>
@endsection