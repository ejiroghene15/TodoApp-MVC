<section for="alert-display">
    @error('activity')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror

    @if (session('message'))
        <div class="alert alert-{{ session('status') }}" role="alert">
            {{ session('message') }}
        </div>
    @endif
</section>
