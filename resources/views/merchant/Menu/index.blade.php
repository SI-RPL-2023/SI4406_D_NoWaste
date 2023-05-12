@extends('merchant.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <div class="card bg-primary rounded-3 mb-3">
        <div class="card-body text-white pt-5">
            <h2 class="font-maisonExtraBold mb-0">{{ auth()->guard('merchant')->user()->name }}</h2>
            <div>Last updated: 12 March 2023</div>
        </div>
    </div>
    <div class="mb-3">
        <a class="btn btn-custom py-2" href="/merchant/menu/add">Tambah baru</a>
    </div>
    <div class="row">
        <div class="col-lg-8">
            @foreach ($Products->where('merchant_id', auth()->guard('merchant')->user()->id) as $item)
            <div class="card mb-5 mb-lg-3 p-2">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="/merchant/menu/{{ $item->id }}/edit">
                            <img class="img-product" src="/storage/{{ $item->photo }}">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <a href="/merchant/menu/{{ $item->id }}/edit" class="font-maisonExtraBold fs-5 text-uppercase text-truncate text-decoration-none">{{ $item->name }}</a>
                        <div>@if($item->price == 0) Gratis @else IDR {{ number_format($item->price) }} @endif</div>
                        <div class="text-secondary font-maisonDemi">Stok: {{ $item->stock }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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