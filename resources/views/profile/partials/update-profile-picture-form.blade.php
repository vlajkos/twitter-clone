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

        <!-- Image Preview -->
        <x-profile-photo :user=Auth::user() customClass="w-20 h-20" id="image-preview-default" />
        <div class="mt-4 flex">
            <div id="image-preview" class="hidden self-start rounded-full h-20 w-20 overflow-hidden bg-cover bg-center">
            </div>
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
<script>
    // Function to handle file input change event
    function previewImage(input) {

        const preview = document.getElementById('image-preview');
        const default_preview = document.getElementById('image-preview-default');
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.style.backgroundImage = `url('${e.target.result}')`;
                preview.classList.remove('hidden');
                default_preview.classList.add('hidden');

            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    }

    // Attach an event listener to the file input
    const fileInput = document.getElementById('img');
    fileInput.addEventListener('change', function() {
        previewImage(this);
    });
</script>
