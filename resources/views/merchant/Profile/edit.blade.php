@extends('merchant.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <h2>Profil</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Portal</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8">
            <form action="/merchant/profile" method="post" enctype="multipart/form-data" class="mb-3">
                @csrf
                <input type="hidden" name="id" value="{{ auth()->guard('merchant')->user()->id }}">
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Nama Merchant/Usaha</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ $Merchant->name }}" placeholder="Nama Merchant">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Email</label>
                    <input id="name" class="form-control" type="text" name="email" value="{{ $Merchant->email }}" placeholder="Email" disabled>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="file">Foto</label>
                    <input id="file" class="form-control" type="file" name="photo">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="desc">Deskripsi</label>
                    <textarea id="desc" class="form-control" name="bio" rows="3">{{ $Merchant->bio }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="desc">Lokasi</label>
                    <textarea id="desc" class="form-control" name="map" rows="3" placeholder="Sematkan peta dengan menyalin HTMl dari Google Maps">{{ $Merchant->map }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary text-white rounded-0 w-100 py-2">Simpan</button> 
            </form>
            <a href="/merchant/profile/password" class="btn btn-secondary text-white rounded-0 w-100">Ubah Password</a>
        </div>
        <div class="col-lg-4">
            <img class="img-profile-edit rounded-4" src="{{ $Merchant->photo != null ? '/storage/'.$Merchant->photo : '/assets/img/no-image.png' }}" alt="{{ $Merchant->name }}">
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
@elseif(session()->has('error'))
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