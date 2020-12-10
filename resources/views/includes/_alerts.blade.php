@if (session('info'))
    <div class="alert alert-info mb-3">
        {{ session('info') }}
    </div>
@endif