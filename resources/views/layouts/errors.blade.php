@if ($errors->any())
    <div class="example">
        <div class="alert alert-icon alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> {{ $error }}
            @endforeach
        </div>
    </div>
@endif