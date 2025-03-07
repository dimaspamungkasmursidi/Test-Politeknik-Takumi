@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-6 space-y-8">
            
            {{-- Update Profile Information --}}
            <div>
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- Update Password --}}
            <div>
                @include('profile.partials.update-password-form')
            </div>

            {{-- Delete Account --}}
            <div>
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
@endsection
