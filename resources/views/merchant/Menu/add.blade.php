@extends('merchant.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <h2>Tambah Menu</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Portal</a></li>
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Menu</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-6">
            <form action="/merchant/menu/add" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="merchant_id" value="{{ auth()->guard('merchant')->user()->id }}">
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Nama Menu</label>
                    <input id="name" class="form-control" type="text" name="name" placeholder="Nama menu">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="price">Harga</label>
                    <input id="price" class="form-control mb-1" type="number" min="0" name="price" placeholder="Harga menu">
                    <input id="free" class="form-check-input" type="checkbox">
                    <label class="form-check-label" for="free">Gratis</label>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Stok</label>
                    <input id="stock" class="form-control" type="number" min="0" name="stock" placeholder="Stok menu">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="file">Foto</label>
                    <input id="file" class="form-control" type="file" name="photo">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="desc">Deskripsi</label>
                    <textarea id="desc" class="form-control" name="description" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary text-white rounded-0 w-100 py-2">Simpan</button> 
            </form>
        </div>
    </div>

</div>

<script>
$("#free").change(function() {
    if(this.checked) {
        $("#price").attr('disabled','disabled');
        $("#price").val(0);
    }else{
        $("#price").removeAttr('disabled');
        $("#price").val('');
    }
});
</script>

@endsection