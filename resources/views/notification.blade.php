@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if( session()->has('success') )
<div class="alert alert-success" role="alert">
  	{{ session('success') }}
</div>
@endif

@if( session()->has('danger') )
<div class="alert alert-danger" role="alert">
  	{{ session('danger') }}
</div>
@endif