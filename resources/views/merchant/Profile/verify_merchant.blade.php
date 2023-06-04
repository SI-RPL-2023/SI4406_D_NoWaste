@extends('merchant.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <h2>Verifikasi Merchant</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Portal</a></li>
            <li class="breadcrumb-item active" aria-current="page">Verifikasi Merchant</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8">
            @if(isset($verifies->status) and $verifies->status == 0)
            <div class="card bg-secondary text-white mb-4 mb-sm-3">
                <div class="card-body">
                    <h5>Permintaan verifikasi sedang diproses</h5>
                    <p class="mb-0">Mohon tunggu proses verifikasi yang membutuhkan waktu 2 x 24 jam.</p>
                </div>
            </div>
            @elseif(isset($verifies->status) and $verifies->status == 1)
            <div class="card bg-primary text-white mb-4 mb-sm-3">
                <div class="card-body">
                    <h5 class="mb-0">Merchant telah terverifikasi</h5>
                </div>
            </div>
            @elseif(isset($verifies->status) and $verifies->status == 2)
            <div class="card bg-danger text-white mb-4 mb-sm-3">
                <div class="card-body">
                    <h5 class="{{ $verifies->note ? '' : 'mb-0' }}">Permintaan verifikasi ditolak</h5>
                    <p class="mb-0">{{ $verifies->note }}</p>
                </div>
            </div>
            @endif
            <div class="mb-4 mb-sm-3 text-justify">
                <h5>Syarat dan Ketentuan Pendaftaran Merchant</h5>
                <p>Verifikasi merchant merupakan proses verifikasi merchant oleh pihak NoWaste dimana merchant perlu menyatakan bahwa mereka
                    adalah badan usaha yang resmi dan terdaftar di pemerintah. Adapun syarat dan ketentuan yang perlu diperhatikan oleh merchant
                    dalam proses verifikasi adalah sebagai berikut:
                </p>
                <ol>
                    <li>
                        Merchant harus terdaftar sebagai badan usaha resmi:
                        <p>Merchant harus berupa badan usaha resmi yang diakui oleh hukum.</p>
                    </li>
                    <li>
                        Merchant harus terdaftar di pemerintah:
                        <p>Merchant harus terdaftar dan memiliki izin usaha yang sah sesuai dengan peraturan yang berlaku di Indonesia.</p>
                    </li>
                    <li>
                        Bukti legalitas badan usaha:
                        <p>Merchant wajib menyertakan bukti legalitas badan usaha dalam proses pendaftaran.</p>
                    </li>
                    <li>
                        Informasi lengkap mengenai badan usaha:
                        <p>Merchant harus menyediakan informasi lengkap mengenai badan usaha, termasuk alamat, nomor telepon, dan alamat email yang valid.</p>
                    </li>
                    <li>
                        Salinan dokumen pendukung:
                        <p>Merchant wajib menyediakan salinan dokumen pendukung yang menunjukkan bahwa mereka terdaftar secara resmi di pemerintah.</p>
                    </li>
                    <li>
                        Pembayaran pajak yang diperlukan:
                        <p>Merchant harus memberikan bukti bahwa mereka telah membayar semua pajak yang diperlukan dan memiliki status pajak yang sah.</p>
                    </li>
                    <li>
                        Kepastian keakuratan informasi:
                        <p>Merchant harus menjamin bahwa informasi yang mereka berikan selama proses verifikasi adalah akurat dan dapat diverifikasi.</p>
                    </li>
                    <li>
                        Kepatuhan terhadap peraturan pemerintah:
                        <p>Merchant harus mematuhi semua peraturan dan persyaratan yang ditetapkan oleh pemerintah terkait kegiatan bisnis mereka.</p>
                    </li>
                    <li>
                        Tidak terlibat dalam praktik ilegal:
                        <p>Merchant harus menyatakan dengan jelas bahwa mereka tidak terlibat dalam praktik ilegal atau kegiatan yang melanggar hukum.</p>
                    </li>
                </ol>
                <p>Beberapa syarat dan ketentuan di atas dapat berubah seiring berjalannya waktu. Dengan ini juga harus merchant menjamin dan bertanggung jawab atas 
                    kebenaran informasi yang diberikan. NoWaste menjamin kerahasiaan informasi yang dikirimkan oleh merchant.
                </p>
            </div>
            <form id="verifyForm" action="/merchant/verify" method="post" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="type">Jenis Badan Usaha</label>
                    <select id="type" class="form-select" name="co_type">
                        <option value="cv">CV</option>
                        <option value="pt">PT</option>
                    </select>
                    @error('co_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Nama Badan Usaha</label>
                    <input id="name" class="form-control" type="text" name="co_name" placeholder="Nama Perusahaan" required>
                    @error('co_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="file">Dokumen Usaha (SIUP/NIB/TDUP/TDY atau Akta Pendirian Usaha)</label>
                    <input id="file" class="form-control" type="file" name="co_document">
                    @error('co_document')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="npwp">NPWP Perusahaan</label>
                    <input id="npwp" class="form-control" type="text" name="co_npwp" placeholder="NPWP Perusahaan" required>
                    @error('co_npwp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary text-white rounded-0 w-100 py-2">Kirim Permintaan Verifikasi</button> 
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

@if($verifies and $verifies->status != 2)
<script>
    $("#verifyForm input").prop("disabled", true);
    $("#verifyForm select").prop("disabled", true);
</script>
@endif

@endsection