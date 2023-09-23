<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add or update profile picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Make a wise choice.') }}
        </p>
    </header>



    <form method="post" action="{{ route('picture.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <input type="file" id="img" name="img" accept="image/*">
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
