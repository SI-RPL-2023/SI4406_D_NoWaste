@extends('admin.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <div class="card bg-primary rounded-3 mb-3">
        <div class="card-body text-white pt-5">
            <h2 class="font-maisonExtraBold mb-0">Artikel</h2>
        </div>
    </div>
    <div class="mb-3">
        <a class="btn btn-custom py-2" href="/admin/article/create">Tulis artikel</a>
    </div>
    <div class="row">
        @foreach ($Articles as $Article)
        <div class="col-lg-8">
            <div class="card mb-3 p-3">
                <div class="row gx-3">
                    <div class="col-lg-6">
                        <img class="img-product" src="{{ $Article->image != null ? $Article->image : '/assets/img/no-image.png' }}">
                    </div>
                    <div class="col-lg-6">
                        <a class="font-maisonExtraBold h5 text-dark text-decoration-none">
                            @if($Article->status == 0) <span class="text-primary">[ Draf ]</span>@endif
                            {{ $Article->title }}
                        </a>
                        <div class="text-primary mb-3">{{ date('d M Y', strtotime($Article->created_at)) }}</div>
                        <p class="font-maisonBook" style="text-align: justify">{{ Str::limit(strip_tags($Article->body), 250) }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if(session()->has('success'))
<div class="toast align-items-center bg-primary text-white border-0" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; bottom: 10px; right: 10px;">
    <div class="d-flex">
      <div class="toast-body">
        {{ session('success') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
@endif

@if(session()->has('error'))
<div class="toast align-items-center bg-danger text-white border-0" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; bottom: 10px; right: 10px;">
    <div class="d-flex">
      <div class="toast-body">
        {{ session('error') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
@endif

<script>
    $(document).ready(function(){
      $('.toast').toast('show');
    });
</script>

@endsection