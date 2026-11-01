<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Laporan Karhutla Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border-b py-3 px-4">Tgl Lapor</th>
                                <th class="border-b py-3 px-4">Pelapor</th>
                                <th class="border-b py-3 px-4">Wilayah</th>
                                <th class="border-b py-3 px-4">Keterangan</th>
                                <th class="border-b py-3 px-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                                <tr class="hover:bg-gray-50">
                                    <td class="border-b py-3 px-4">{{ $report->created_at->format('d M Y') }}</td>
                                    <td class="border-b py-3 px-4">{{ $report->user->name ?? 'Anonim' }}</td>
                                    <td class="border-b py-3 px-4">{{ $report->area->name ?? '-' }}</td>
                                    <td class="border-b py-3 px-4">{{ Str::limit($report->description, 50) }}</td>
                                    <td class="border-b py-3 px-4 font-bold text-yellow-600">
                                        {{ strtoupper($report->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>