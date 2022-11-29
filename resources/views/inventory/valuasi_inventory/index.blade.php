@extends('layouts.app')

@section('content')
@push('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="{!! route('inventory.productStocks.index') !!}">@lang('models/productStocks.singular')</a>
    </li>
</ol>
@endpush
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['route' => 'inventory.productStocks.store']) !!}
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Create @lang('models/productStocks.singular')</strong>
                    </div>
                    <div class="card-body">

                        <!-- Period Field -->
                        <div class="form-group row">
                            {!! Form::label('period', __('models/productStocks.fields.period').':', ['class' =>
                            'col-md-3 col-form-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('period', null, ['class' => 'form-control datetime', 'data-optiondate' =>
                                json_encode(config('local.daterange'))]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('product', 'Product:', ['class' =>
                            'col-md-3 col-form-label']) !!}
                            <div class="col-md-9">
                                {!! Form::select('product[]', [], null, array_merge(['class' => 'form-control select2', 'multiple' => 'multiple', 
                                'data-placeholder' => 'Pilih produk','data-url' => route('selectAjax'), 'data-ajax' =>
                                1, 'data-repository' => 'Inventory\\DmsInvProductRepository'],
                                config('local.select2.ajax')) ) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('branch_id', __('models/productStocks.fields.branch_id').':', ['class' =>
                            'col-md-3 col-form-label']) !!}
                            <div class="col-md-9">
                                {!! Form::select('branch_id', $branchItems, null, ['class' => 'form-control select2',
                                'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-3">
                                {!! Form::button(__('crud.show'), ['class' => 'btn btn-success',
                                'data-target' => '#listproductmutation', 'data-url' =>
                                route('inventory.valuasiInventory.index'), 'data-json' => '{}', 'data-ref' =>
                                'input[name=period],select[name="product[]"],select[name=branch_id]' ,'onclick' =>
                                'main.loadDetailPage(this,\'get\')', 'type' => 'button']) !!}
                            </div>
                        </div>
                    </div>


                    <div class="">
                        <div class="table-responsive" id="listproductmutation"></div>
                    </div>
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush