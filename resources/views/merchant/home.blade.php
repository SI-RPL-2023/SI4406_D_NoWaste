@extends('merchant.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <div class="card bg-primary rounded-3">
        <div class="card-body text-white pt-5">
            <div class="d-md-flex flex-row">
                <div class="img-profile">
                    <img src="/storage/{{ auth()->guard('merchant')->user()->photo }}" class="rounded-3">
                </div>
                <div class="align-self-end mx-md-3">
                    <h2 class="font-maisonExtraBold mt-3 mt-md-5 mb-0">{{ auth()->guard('merchant')->user()->name }}</h2>
                    <div class="d-inline-flex">
                        <a href="/merchant/profile" class="text-white">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection