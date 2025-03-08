<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    {{-- Logo / Home --}}
    <a href="{{ route('tasks.index') }}" class="text-2xl font-bold text-gray-800">
        Task Management
    </a>

    {{-- Hamburger Button (Mobile) --}}
    <button id="menu-toggle" class="md:hidden text-gray-800 focus:outline-none">
        ☰
    </button>

    {{-- Menu User --}}
    <div id="menu" class="hidden md:flex items-center gap-2 absolute md:relative top-16 left-0 md:top-0 md:left-auto w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none p-4 md:p-0 flex-col md:flex-row">
        <div class="flex flex-col mb-6 md:mb-0 w-fit">
            {{-- Nama User --}}
            <span class="bg-gray-200 md:bg-transparent px-4 py-2 rounded-lg text-gray-700 font-medium">{{ Auth::user()->name }}</span>
        </div>
        {{-- Link Profile --}}
        <a href="{{ route('profile.edit') }}">
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition mt-4 md:mt-0">
                Profile
            </button>
        </a>
        {{-- Tombol Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition mt-4 md:mt-0">
                Logout
            </button>
        </form>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    
    menuToggle.addEventListener('click', function () {
        menu.classList.toggle('hidden');
        menuToggle.textContent = menu.classList.contains('hidden') ? '☰' : 'X';
    });
</script>
