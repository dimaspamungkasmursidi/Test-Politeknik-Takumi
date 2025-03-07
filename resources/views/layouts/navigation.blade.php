<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    {{-- Logo / Home --}}
    <a href="{{ route('tasks.index') }}" class="text-2xl font-bold text-gray-800">
        Task Management
    </a>

    {{-- Menu User --}}
    <div class="flex items-center gap-6">
        {{-- Nama User --}}
        <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>

        {{-- Link Profile --}}
        <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-gray-900 transition">
            Profile
        </a>

        {{-- Tombol Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                Logout
            </button>
        </form>
    </div>
</nav>
