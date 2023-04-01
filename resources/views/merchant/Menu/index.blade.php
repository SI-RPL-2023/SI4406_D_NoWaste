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
                        <a href="/merchant/menu/edit/{{ $item->id }}">
                            <img class="img-product" src="/storage/{{ $item->photo }}">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <a href="/merchant/menu/edit/{{ $item->id }}" class="font-maisonExtraBold fs-5 text-uppercase text-truncate text-decoration-none">{{ $item->name }}</a>
                        <div>IDR {{ number_format($item->price) }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection