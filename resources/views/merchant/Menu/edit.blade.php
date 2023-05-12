@extends('merchant.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <h2>Edit Menu</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Portal</a></li>
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-6">
            <form action="/merchant/menu/{{ $Product->id }}/edit" method="post" enctype="multipart/form-data" class="mb-3">
                @csrf
                <input type="hidden" name="merchant_id" value="{{ auth()->guard('merchant')->user()->id }}">
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Nama Menu</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ $Product->name }}" placeholder="Nama menu">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="price">Harga</label>
                    <input id="price" class="form-control mb-1" type="number" min="0" name="price" value="{{ $Product->price }}" placeholder="Harga menu" @if($Product->price == 0) readonly @endif>
                    <input id="free" class="form-check-input" type="checkbox" @if($Product->price == 0) checked @endif>
                    <label class="form-check-label" for="free">Gratis</label>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Stok</label>
                    <input id="stock" class="form-control" type="number" min="0" name="stock" value="{{ $Product->stock }}" placeholder="Stok menu">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="file">Foto</label>
                    <input id="file" class="form-control" type="file" name="photo">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="desc">Deskripsi</label>
                    <textarea id="desc" class="form-control" name="description" rows="2">{{ $Product->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary text-white rounded-0 w-100 py-2">Simpan</button> 
            </form>
            <a id="deleteProduct" class="btn btn-danger text-white rounded-0 w-100 py-2" data-id="{{ $Product->id }}">Hapus</a>
        </div>
        <div class="col-lg-6">
            <img src="/storage/{{ $Product->photo }}" class="img-product-edit rounded-4">
        </div>
    </div>

</div>

<!-- Delete Product Modal-->
<div class="modal" id="deleteProductModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Hapus Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Apakah kamu yakin menghapus menu ini?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="del" action="" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$("#free").change(function() {
    if(this.checked) {
        $("#price").attr('readonly','readonly');
        $("#price").val(0);
    }else{
        $("#price").removeAttr('readonly');
        $("#price").val('');
    }
});

$('#deleteProduct').on('click',function(){
    const id = $(this).data('id');
    $("form#del").attr("action", "/merchant/menu/"+id);
    $("#deleteProductModal").modal('show');
});
</script>

@endsection