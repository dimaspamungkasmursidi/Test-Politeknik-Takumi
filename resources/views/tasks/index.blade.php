@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Daftar Tugas</h1>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-lg mb-4 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah & Filter -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition w-full md:w-auto text-center">
            + Tambah Tugas
        </a>

        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('tasks.index') }}" class="flex gap-2 w-full md:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari tugas..." 
                    class="border border-gray-300 p-2 rounded-lg focus:ring focus:ring-blue-200 w-full md:w-64">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                    Cari
                </button>
            </form>

            <!-- Form Filter Status -->
            <form method="GET" action="{{ route('tasks.index') }}" class="flex gap-2 w-full md:w-auto">
                <select name="status" class="border border-gray-300 p-2 rounded-lg focus:ring focus:ring-green-200 w-full md:w-auto">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Sedang Berjalan</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                </select>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                    Filter
                </button>
            </form>
        </div>
    </div>

    <!-- Tabel Responsif -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full border-collapse text-sm md:text-base">
            <thead>
                <tr class="bg-gray-500 text-gray-100 text-left">
                    <th class="p-3">Judul</th>
                    <th class="p-3">Deskripsi</th>
                    <th class="p-3">Deadline</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr class="border-t border-gray-300 odd:bg-gray-100 even:bg-white">
                    <td class="p-3">{{ $task->title }}</td>
                    <td class="p-3">{{ $task->description }}</td>
                    <td class="p-3 text-nowrap">
                        {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}
                    </td>

                    <td class="p-3">
                        @php
                            $statusLabels = [
                                'pending' => 'Belum Selesai',
                                'in_progress' => 'Sedang Berjalan',
                                'completed' => 'Selesai',
                            ];
                        @endphp
                        <span class="px-2 py-1 rounded-full text-white text-sm text-nowrap
                            {{ $task->status == 'pending' ? 'bg-yellow-500' : 
                            ($task->status == 'in_progress' ? 'bg-blue-500' : 'bg-green-500') }}">
                            {{ $statusLabels[$task->status] ?? 'Tidak Diketahui' }}
                        </span>
                    </td>
                    <td class="p-3 flex flex-wrap gap-2">
                        <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg transition text-center">
                            Edit
                        </a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg transition text-center">
                                Hapus
                            </button>
                        </form>
                        @if ($task->status !== 'completed')
                            <form method="POST" action="{{ route('tasks.complete', $task->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg transition text-center">
                                    Selesaikan
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection