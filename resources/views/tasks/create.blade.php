@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-2xl bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Tambah Tugas</h1>

    <!-- Notifikasi error -->
    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Judul -->
        <div>
            <label class="block font-semibold text-gray-700">Judul:</label>
            <input type="text" name="title" value="{{ old('title') }}" 
                class="border border-gray-300 p-3 w-full rounded-lg focus:ring focus:ring-blue-200" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block font-semibold text-gray-700">Deskripsi:</label>
            <textarea name="description" rows="4" 
                class="border border-gray-300 p-3 w-full rounded-lg focus:ring focus:ring-blue-200">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deadline -->
        <div>
            <label class="block font-semibold text-gray-700">Deadline:</label>
            <input type="date" name="deadline" value="{{ old('deadline') }}" 
                class="border border-gray-300 p-3 w-full rounded-lg focus:ring focus:ring-blue-200" required min="{{ date('Y-m-d') }}">
            @error('deadline')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block font-semibold text-gray-700">Status:</label>
            <select name="status" 
                class="border border-gray-300 p-3 w-full rounded-lg focus:ring focus:ring-blue-200">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>Sedang Berjalan</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol -->
        <div class="flex justify-between">
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
