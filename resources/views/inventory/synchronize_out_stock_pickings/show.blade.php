@extends('layouts.app')

@section('content')
     @push('breadcrumb')
     <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">
                <a href="{{ route('inventory.synchronizeOutStockPickings.index') }}">Synchronize In Stock Picking</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     @endpush
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('inventory.synchronizeOutStockPickings.index') }}" class="btn btn-light">Back</a>
                             </div>
                             <div class="card-body">
                                 @include('inventory.synchronize_in_stock_pickings.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
