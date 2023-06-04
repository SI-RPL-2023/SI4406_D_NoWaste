@extends('admin.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <div class="card bg-primary rounded-3 mb-3">
        <div class="card-body text-white pt-5">
            <h2 class="font-maisonExtraBold mb-0">Merchants</h2>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item"><a href="/admin/merchants">Merchant</a></li>
            <li class="breadcrumb-item active" aria-current="page">Verifikasi Merchant</li>
        </ol>
    </nav>
    <form id="verifyForm" class="mb-3">
        @csrf
        <div class="form-group mb-3">
            <label class="form-label" for="name">Nama Merchant</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ $verifyMerchantRequest->merchant->name }}" disabled>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="type">Jenis Badan Usaha</label>
            <select id="type" class="form-select" name="co_type" disabled>
                <option>{{ strtoupper($verifyMerchantRequest->co_type) }}</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="name">Nama Badan Usaha</label>
            <input id="name" class="form-control" type="text" name="co_name" value="{{ $verifyMerchantRequest->co_name }}" disabled>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="file">Dokumen Usaha (SIUP/NIB/TDUP/TDY atau Akta Pendirian Usaha)</label>
            <div class="d-flex">
                <input id="file" class="form-control" type="text" name="co_document" value="{{ $verifyMerchantRequest->co_document }}" disabled>
                <a href="{{ Storage::url($verifyMerchantRequest->co_document) }}" class="btn btn-primary text-white ms-2">Download</a>
            </div>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="npwp">NPWP Perusahaan</label>
            <input id="npwp" class="form-control" type="text" name="co_npwp" value="{{ $verifyMerchantRequest->co_npwp }}" disabled>
        </div>
    </form>
    @if($verifyMerchantRequest->status == 0)
    <form action="/admin/merchants/verifies/{{ $verifyMerchantRequest->id }}/confirm" method="POST" enctype="multipart/form-data" class="mb-3">
        @csrf
        <button type="submit" id="confirm-btn" class="btn btn-primary text-white w-100 py-2">Terima Verifikasi</button>
    </form>
    <form action="/admin/merchants/verifies/{{ $verifyMerchantRequest->id }}/reject" method="POST" enctype="multipart/form-data" class="mb-3">
        @csrf
        <div id="reject-note" class="mb-3">
            <label class="form-label" for="note">Catatan</label>
            <textarea id="note" class="form-control" type="text" name="note" placeholder="Catatan (opsional)" required></textarea>
        </div>
        <button type="submit" id="reject-btn" class="btn btn-danger w-100 py-2">Tolak Verifikasi</button>
    </form>
    @elseif($verifyMerchantRequest->status == 1)
    <div class="card bg-primary">
        <div class="card-body text-white">
            <h5 class="mb-0 font-maisonExtraBold">Verifikasi disetujui</h5>
        </div>
    </div>
    @elseif($verifyMerchantRequest->status == 2)
    <div class="card bg-danger">
        <div class="card-body text-white">
            <h5 class="font-maisonExtraBold">Verifikasi ditolak</h5>
            <p class="mb-0">{{ $verifyMerchantRequest->note }}</p>
        </div>
    </div>
    @endif
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
    $('#reject-note').hide();
});

$('#reject-btn').click(function(){
    $('#reject-note').show();
});
</script>

@endsection