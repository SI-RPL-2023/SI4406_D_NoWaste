@extends('merchant.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <h2>Edit Password</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/merchant/">Portal</a></li>
            <li class="breadcrumb-item"><a href="/merchant/profile">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Password</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8">
            @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}</div>
            @endif
            <form action="/merchant/profile/password" method="post" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="oldPassword">Password Lama</label>
                    <input id="oldPassword" class="form-control" type="password" name="old_password" placeholder="Password Lama" required>
                </div>
                @error('old_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group mb-3">
                    <label class="form-label" for="password">Password Baru</label>
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password Baru" required>
                </div>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Konfirmasi Password Baru</label>
                    <input id="name" class="form-control" type="password" name="confirm_password" onkeyup="check();" placeholder="Konfirmasi Password Baru" required>
                </div>
                <div id="message" class="mt-1"></div>
                <button id="ButtonSubmit" type="submit" class="btn btn-primary text-white rounded-0 w-100 py-2">Simpan</button> 
            </form>
        </div>
        <div class="col-lg-4">
            <img class="img-profile-edit rounded-4" src="/storage/{{ $Merchant->photo }}" alt="{{ $Merchant->name }}">
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

<script>
    $(document).ready(function(){
      $('.toast').toast('show');
    });

    var check = function() {
        if ($("input[name=password]").val() != $("input[name=confirm_password]").val()) {
            $("#ButtonSubmit").attr("disabled", true);
            $("#message").css({
                'display': 'block',
                'margin-top': '0.25rem',
                'font-size': '0.875em',
                'color': '#dc3545'
            });
            $("#message").html("Password harus sesuai");
        }else if ($("#InputRepeatPassword").val() == $("#InputPassword").val()) {
            $("#ButtonSubmit").removeAttr("disabled");
            $("#message").css('display', 'none');
        }
    }
</script>

@endsection