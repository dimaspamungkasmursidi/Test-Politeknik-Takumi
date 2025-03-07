<section class="bg-white shadow-md p-6 rounded-lg">
    {{-- Header --}}
    <header>
        <h2 class="text-lg font-semibold text-gray-800">
            Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    {{-- Form Update Password --}}
    <form method="post" action="{{ route('password.update') }}" class="mt-4 space-y-4">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div>
            <label for="update_password_current_password" class="block text-gray-700 font-medium">
                Current Password
            </label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring-2 focus:ring-gray-800" 
                autocomplete="current-password"
                required>
            @error('current_password') 
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
            @enderror
        </div>

        {{-- New Password --}}
        <div>
            <label for="update_password_password" class="block text-gray-700 font-medium">
                New Password
            </label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring-2 focus:ring-gray-800" 
                autocomplete="new-password"
                required>
            @error('password') 
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div>
            <label for="update_password_password_confirmation" class="block text-gray-700 font-medium">
                Confirm Password
            </label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring-2 focus:ring-gray-800" 
                autocomplete="new-password"
                required>
            @error('password_confirmation') 
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Tombol Save & Notifikasi --}}
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-green-600">
                    Saved successfully.
                </p>
            @endif
        </div>
    </form>
</section>
