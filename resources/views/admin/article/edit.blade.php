@extends('admin.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <h2>Edit Artikel</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item"><a href="/admin/article">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Artikel</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8 mb-5">
            <form action="/admin/article/{{ $Article->id }}/edit" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input id="title" class="form-control  @error('title') is-invalid @enderror" type="text" name="title" value="{{ $Article->title }}" placeholder="Judul Artikel">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="slug">Url</label>
                    <input id="slug" class="form-control  @error('slug') is-invalid @enderror" type="text" name="slug" value="{{ $Article->slug }}" placeholder="Url Artikel" readonly>
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="editor">Content</label>
                    <textarea id="editor" class="form-control" name="body" rows="2">{{ $Article->body }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Visibility</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="formSwitch" name="status" 
                        @if($Article->status == 1) checked @endif>
                        <label class="form-check-label" for="formSwitch" id="formSwichLabel">
                            @if($Article->status == 1) Public
                            @else Draft 
                            @endif
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary text-white rounded-0 w-100 py-2">Simpan</button> 
            </form>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <div class="text-primary">Status</div>
                        <div class="">{{ $Article->status == 0 ? 'Draft' : 'Published' }}</div>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <div class="text-primary">Published on</div>
                        <div>{{ $Article->status == 0 ? 'Not yet published' : date('d M Y', strtotime($Article->published_at)) }}</div>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <div class="text-primary">Author</div>
                        <div>{{ $Article->admin->name }}</div>
                        <hr>
                    </div>
                </div>
            </div>
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

<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

<script>
$(document).ready(function(){
    $('.toast').toast('show');
});

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