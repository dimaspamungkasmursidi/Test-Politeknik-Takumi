<section class="space-y-6">
    {{-- Header --}}
    <header>
        <h2 class="text-lg font-semibold text-gray-800">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Once your account is deleted, all data will be permanently removed. 
            Please download any important data before proceeding.
        </p>
    </header>

    {{-- Tombol Delete --}}
    <button 
        onclick="document.getElementById('delete-modal').classList.remove('hidden')" 
        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
        Delete Account
    </button>

    {{-- Modal Konfirmasi --}}
    <div id="delete-modal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                This action is irreversible. Please enter your password to confirm.
            </p>

            {{-- Form Delete --}}
            <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
                @csrf
                @method('delete')

                <input 
                    type="password" 
                    name="password" 
                    placeholder="Enter your password" 
                    class="w-full p-2 border rounded mt-2 focus:ring-2 focus:ring-gray-500" 
                    required>

                {{-- Tombol Aksi --}}
                <div class="mt-4 flex justify-end gap-2">
                    <button type="button" 
                        onclick="document.getElementById('delete-modal').classList.add('hidden')" 
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                        Cancel
                    </button>

                    <button type="submit" 
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                        Confirm Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
