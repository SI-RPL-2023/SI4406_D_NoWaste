@extends('merchant.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <div class="card bg-primary rounded-3">
        <div class="card-body text-white pt-5">
            <h2 class="font-maisonExtraBold mb-0">{{ auth()->guard('merchant')->user()->name }}</h2>
            <div>Last updated: 12 March 2023</div>
        </div>
    </div>
</div>

@endsection