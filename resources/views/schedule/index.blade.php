@extends('layouts.app')
@section('title', 'Schedule')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
        <h1 class="text-2xl font-bold">Vaccination Schedule</h1>
        <p class="text-sm text-gray-500">{{ $schedules->count() }} appointment(s), latest first</p>
    </div>

    <x-panel title="Full Schedule">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b">
                    <th class="py-2 pr-4">#</th>
                    <th class="py-2 pr-4">Patient</th>
                    <th class="py-2 pr-4 hidden md:table-cell">Purok</th>
                    <th class="py-2 pr-4">Vaccine</th>
                    <th class="py-2 pr-4 hidden md:table-cell">Dose</th>
                    <th class="py-2 pr-4">Date</th>
                    <th class="py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules->sortByDesc('scheduled_at') as $row)
                    <tr class="{{ $loop->first ? 'bg-emerald-50 font-semibold' : ($loop->odd ? 'bg-gray-50' : 'bg-white') }}">
                        <td class="py-2 pr-4">{{ $loop->iteration }}</td>
                        <td class="py-2 pr-4">
                            {{ $row->patient_name }}
                            @if($loop->first)
                                <span class="ml-1 bg-emerald-600 text-white text-xs px-2 py-0.5 rounded">Latest</span>
                            @endif
                        </td>
                        <td class="py-2 pr-4 hidden md:table-cell">{{ $row->purok }}</td>
                        <td class="py-2 pr-4">{{ $row->vaccine }}</td>
                        <td class="py-2 pr-4 hidden md:table-cell">{{ $row->dose }}</td>
                        <td class="py-2 pr-4">{{ $row->scheduled_at->format('M d, Y') }}</td>
                        <td class="py-2">
                            @if($row->status === 'Done')
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded">Done</span>
                            @elseif($row->status === 'Overdue')
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded">Overdue</span>
                            @else
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 rounded">{{ $row->status }}</span>
                            @endif
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