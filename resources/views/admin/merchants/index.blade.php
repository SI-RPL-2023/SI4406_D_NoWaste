@extends('admin.layout.app')

@section('content')
<!-- Content -->
<div class="container-fluid">
    <div class="card bg-primary rounded-3 mb-3">
        <div class="card-body text-white pt-5">
            <h2 class="font-maisonExtraBold mb-0">Merchants</h2>
        </div>
    </div>
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="one-tab" data-bs-toggle="tab" data-bs-target="#one-tab-pane" type="button" role="tab" 
            aria-controls="one-tab-pane" aria-selected="true">List Merchant</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two-tab-pane" type="button" role="tab" 
            aria-controls="two-tab-pane" aria-selected="false">Permintaan Verifikasi @if($verifyMerchantPendingRequests)<span class="badge rounded-circle text-bg-danger">{{ $verifyMerchantPendingRequests }}</span>@endif</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane py-3 py-lg-3 fade show active" id="one-tab-pane" role="tabpanel" aria-labelledby="one-tab" tabindex="0">
            <div class="row">
                @if(count($Merchants) != 0)
                    @foreach ($Merchants as $Merchant)
                    <div class="col-lg-4">
                        <div class="card mb-3 p-2">
                            <img class="img-product mb-3" 
                                src="{{ $Merchant->photo != null ? '/storage/'.$Merchant->photo : '/assets/img/no-image.png' }}">
                            <a href="/admin/merchant/{{ $Merchant->id }}" class="font-maisonExtraBold h5 text-dark text-decoration-none text-center mb-1">
                                {{ $Merchant->name }}
                            </a>
                            <div class="text-center text-secondary">{{ count($Merchant->products) }} Produk</div>
                        </div>
                    </div>
                    @endforeach
                @else
                <h3 class="py-5 text-center text-secondary font-maisonExtraBold">Belum ada merchant yang terdaftar</h3>
                @endif
            </div>
        </div>

        <div class="tab-pane py-3 py-lg-3 fade" id="two-tab-pane" role="tabpanel" aria-labelledby="two-tab" tabindex="0">
            <table class="table table-striped">
                <thead class="font-maisonExtraBold">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Merchant</th>
                        <th scope="col">Status</th>
                        <th scope="col">Permintaan Dikirim</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($verifyMerchantRequests as $verifyRequest)
                    <tr>
                        <th>{{ $i++ }}</th>
                        <td>{{ $verifyRequest->merchant->name }}</td>
                        <td>
                            @if($verifyRequest->status == 0) <span class="text-danger">Pending</span> 
                            @elseif($verifyRequest->status == 1) <span class="text-success">Approved</span> 
                            @else <span class="text-danger">Rejected</span>
                            @endif
                        </td>
                        <td>{{ date('d M Y H:i:s', strtotime($verifyRequest->created_at)) }}</td>
                        <td><a href="/admin/merchants/verifies/{{ $verifyRequest->id }}/detail">[Detail]</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

<script>
$(document).ready(function(){
    $('.toast').toast('show');
});
</script>

@endsection