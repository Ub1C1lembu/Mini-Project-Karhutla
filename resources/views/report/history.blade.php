<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border-b py-3 px-4">Tanggal Lapor</th>
                                <th class="border-b py-3 px-4">Keterangan</th>
                                <th class="border-b py-3 px-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports as $report)
                                <tr class="hover:bg-gray-50">
                                    <td class="border-b py-3 px-4">{{ $report->created_at->format('d M Y, H:i') }}</td>
                                    <td class="border-b py-3 px-4">{{ Str::limit($report->description, 50) }}</td>
                                    <td
                                        class="border-b py-3 px-4 font-bold 
                                        {{ $report->status === 'selesai' ? 'text-green-600' : ($report->status === 'diproses' ? 'text-blue-600' : 'text-yellow-600') }}">
                                        {{ strtoupper($report->status) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="border-b py-4 text-center text-gray-500">Belum ada riwayat
                                        laporan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>