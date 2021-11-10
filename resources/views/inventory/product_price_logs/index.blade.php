@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">        
        <li class="breadcrumb-item">
         <a href="{!! route('inventory.productPrices.index') !!}">@lang('models/productPrices.singular')</a>
      </li>
      <li class="breadcrumb-item">@lang('models/productPriceLogs.plural')</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('models/productPriceLogs.plural')                             
                         </div>
                         <div class="card-body">
                             @include('inventory.product_price_logs.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

