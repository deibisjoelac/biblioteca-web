
@if ($errors->any())
    <div class="alert alert-warning" role="alert">
         @foreach ($errors->all() as $error)
            <p class="text-danger">
                <strong>{{ $error }}</strong>
            </p>
        @endforeach
    </div>
@endif
