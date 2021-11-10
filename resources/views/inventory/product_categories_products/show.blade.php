@extends('layouts.app')

@section('content')
     @push('breadcrumb')
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">
                <a href="{{ route('inventory.productCategoriesProducts.index') }}">@lang('models/productCategoriesProducts.singular')</a>
            </li>
            <li class="breadcrumb-item active">@lang('crud.detail')</li>
        </ol>
     @endpush
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('crud.detail')</strong>
                                  <a href="{{ route('inventory.productCategoriesProducts.index') }}" class="btn btn-ghost-light">Back</a>
                             </div>
                             <div class="card-body">
                                 @include('inventory.product_categories_products.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
