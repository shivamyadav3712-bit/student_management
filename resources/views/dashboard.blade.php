<title>Dashboard</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Simple Stats Card -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-indigo-500">
                    <div class="p-6">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Students</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalStudents }}</p>
                    </div>
                </div>
            </div>

            <!-- Recent Students Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Recently Added Students</h3>
                        <a href="{{ route('students.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150">
                            View Full List
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-100">
                                    <th class="py-3 px-2 text-sm font-semibold text-gray-600">Name</th>
                                    <th class="py-3 px-2 text-sm font-semibold text-gray-600">Course</th>
                                    <th class="py-3 px-2 text-sm font-semibold text-gray-600">Phone</th>
                                    <th class="py-3 px-2 text-sm font-semibold text-gray-600 text-right">Added</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($latestStudents as $student)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-4 px-2 text-sm text-gray-700 font-medium">{{ $student->name }}</td>
                                        <td class="py-4 px-2 text-sm">
                                            <span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded-md text-xs font-semibold">
                                                {{ $student->course }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-2 text-sm text-gray-600">{{ $student->phone }}</td>
                                        <td class="py-4 px-2 text-sm text-gray-500 text-right">
                                            {{ $student->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-10 text-center text-gray-400">
                                            No student records found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>