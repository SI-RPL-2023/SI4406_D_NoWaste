@extends('admin.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <h2>Buat Artikel</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item"><a href="/admin/article">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buat Artikel</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-md-8 mb-5">
            <form action="/admin/article/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="title">Judul</label>
                    <input id="title" class="form-control  @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}" placeholder="Judul Artikel">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="slug">Slug</label>
                    <input id="slug" class="form-control  @error('slug') is-invalid @enderror" type="text" name="slug" value="{{ old('slug') }}" placeholder="Url Artikel" readonly>
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="editor">Artikel</label>
                    <textarea id="editor" class="form-control" name="body" rows="2">{{ old('body') }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Visibilitas</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="formSwitch" name="status">
                        <label class="form-check-label" for="formSwitch" id="formSwichLabel">Draf (Tidak Publik)</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary text-white rounded-0 w-100 py-2">Simpan</button> 
            </form>
        </div>
    </div>

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

<script>
$("#formSwitch").change(function() {
    if(this.checked) {
        $("#formSwichLabel").html('Publik');
    }else{
        $("#formSwichLabel").html('Draf (Tidak Publik)');
    }
});

const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function() {
    fetch('/admin/article/checkSlug?title=' + title.value )
        .then(response => response.json())
        .then(data => slug.value = data.slug)
})

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        ckfinder: {
                uploadUrl: '{{ route('ckeditor.upload').'?_token='.csrf_token() }}',
        }
    })
    .catch( error => {
        console.error( error );
    } );
</script>

@endsection