@extends('layouts.app')

@section('content')
@push('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="{!! route('inventory.productStocks.index') !!}">@lang('models/productStocks.singular')</a>
    </li>
    <li class="breadcrumb-item active">@lang('crud.add_new')</li>
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
                                <div class="input-group">
                                    <div class="col-md-4 ml-2">
                                    {!! Form::text('period', null, ['class' => 'form-control inputmask','maxlength' =>
                                    7, 'required' => 'required', 'placeholder' => 'YYYY-MM', 'data-optionmask' =>
                                    json_encode(config('local.textmask.period_month'))]) !!}
                                    </div>
                                    <div class="col-md-6 ml-2">
                                    {!! Form::select('branch_id', $branchItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                    </div>
                                    <div class="input-addon-append ml-2">
                                        {!! Form::button(__('crud.process'), ['class' => 'btn btn-success',
                                        'data-target' => '#listproductmutation', 'data-url' =>
                                        route('inventory.productStocks.store'), 'data-json' => '{}', 'data-ref' =>
                                        'input[name=period],select[name=branch_id]' ,'onclick' => 'main.loadDetailPage(this,\'post\')', 'type'
                                        => 'button']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="table-responsive" id="listproductmutation"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('inventory.productStocks.index') }}"
                                class="btn btn-default">@lang('crud.cancel')</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
