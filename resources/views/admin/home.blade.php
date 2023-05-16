@extends('admin.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <div class="card bg-primary rounded-3 mb-3">
        <div class="card-body text-white pt-5">
            <div class="d-md-flex flex-row">
                <div class="align-self-end mx-md-3">
                    <h2 class="font-maisonExtraBold mt-3 mt-md-5 mb-0">{{ auth()->guard('admin')->user()->name }}</h2>
                    <div class="d-inline-flex">
                        <a href="/merchant/profile" class="text-white">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gx-2">
        <h4>Pintasan</h4>
        <div class="col-md-4 mb-3">
            <div class="card rounded-0 shadow-sm">
                <div class="card-body">
                    <div>Tulis Artikel</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card rounded-0 shadow-sm">
                <div class="card-body">
                    <div>Verifikasi Merchant</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card rounded-0 shadow-sm">
                <div class="card-body">
                    <div>Tambah Kategori</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection