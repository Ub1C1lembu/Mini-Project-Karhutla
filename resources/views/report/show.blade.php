<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Laporan Karhutla') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div
                        class="flex flex-col sm:flex-row justify-between items-center mb-6 pb-4 border-b border-gray-200 gap-4">
                        <h3 class="text-lg font-bold">Informasi Kejadian</h3>

                        @if(session('status'))
                            <span class="text-green-600 font-semibold text-sm">{{ session('status') }}</span>
                        @endif

                        <form action="{{ route('report.updateStatus', $report->id) }}" method="POST"
                            class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm font-bold">
                                <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>PENDING
                                </option>
                                <option value="diproses" {{ $report->status === 'diproses' ? 'selected' : '' }}>DIPROSES
                                </option>
                                <option value="selesai" {{ $report->status === 'selesai' ? 'selected' : '' }}>SELESAI
                                </option>
                            </select>
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 transition">
                                Perbarui
                            </button>
                        </form>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Lapor</p>
                            <p class="font-semibold">{{ $report->created_at->format('d F Y, H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Pelapor</p>
                            <p class="font-semibold">{{ $report->user->name ?? 'Anonim' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Wilayah</p>
                            <p class="font-semibold">{{ $report->area->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Titik Koordinat</p>
                            <p class="font-semibold">{{ $report->latitude }}, {{ $report->longitude }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <p class="text-sm text-gray-500 mb-1">Keterangan / Deskripsi</p>
                        <div class="p-4 bg-gray-50 rounded border border-gray-200">
                            {{ $report->description }}
                        </div>
                    </div>

                    <div class="mb-6">
                        <p class="text-sm text-gray-500 mb-2">Foto Bukti</p>
                        @if($report->photo_path)
                            <img src="{{ asset('storage/' . $report->photo_path) }}" alt="Bukti Karhutla"
                                class="max-w-2xl h-auto rounded shadow-sm border border-gray-200">
                        @else
                            <p class="italic text-gray-500">Tidak ada foto yang dilampirkan.</p>
                        @endif
                    </div>

                    <div class="mt-8 pt-4 border-t border-gray-200 flex justify-end">
                        <a href="{{ route('report.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                            Kembali ke Daftar
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>