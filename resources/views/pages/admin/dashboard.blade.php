@extends('layout.admin.master')

@push('plugin-styles')

@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h5 class="mb-3 mb-md-0 text-uppercase font-weight-normal">Dashboard</h5>
    </div>
</div>

<div class="card-columns">
    
    <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-3 mb-md-0 text-uppercase font-weight-normal">
                        <small>Total<br></small> Users - {{$user_count}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-secondary text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-3 mb-md-0 text-uppercase font-weight-normal">
                        <small>Total<br></small> Orders - {{$order_count}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-truck fa-2x text-secondary text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-3 mb-md-0 text-uppercase font-weight-normal">
                        <small>Total<br></small> Customer Support - {{$support_count}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-question fa-2x text-secondary text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush