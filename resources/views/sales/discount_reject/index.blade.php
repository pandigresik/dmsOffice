@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">@lang('models/bkbDiscounts.plural')</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['onsubmit' => 'return false']) !!}
                        <div class="card">
                            <div class="card-header">                                
                                <strong>Sales Discount Reject</strong>
                            </div>
                            <div class="card-body">                   
                                <!-- Range Period Field -->
                                <div class="form-group row">
                                    {!! Form::label('period_range', __('models/bkbDiscounts.fields.period_range').':', ['class' => 'col-md-3 col-form-label']) !!}
                                    <div class="col-md-9"> 
                                        {!! Form::text('period_range', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['singleDatePicker' => false, 'locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'period_range']) !!}
                                    </div>                                                                        
                                </div>                                
                                <div class="form-group row">
                                    {!! Form::label('sales', 'Sales :',['class' => 'col-md-3 col-form-label']) !!}
                                    <div class="col-md-9">
                                        {!! Form::select('sales[]', [], null, array_merge(['class' => 'form-control
                                        select2','multiple' => 'multiple', 'required' => 'required', 'data-url' => route('selectAjax'), 'data-ajax'
                                        => 1, 'data-repository' => 'Base\\DmsPiSalesRepository'], config('local.select2.ajax')) ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-9 offset-3">
                                        {!! Form::button(__('crud.process'), ['class' => 'btn btn-success', 'data-target' => '#listbkb', 'data-url' => route('sales.discountReject.index'), 'data-json' => '{}', 'data-ref' => 'input[name=period_range],select[name="sales[]"]' ,'onclick' => 'main.loadDetailPage(this,\'get\')', 'type' => 'button']) !!}
                                        {!! Form::button(__('crud.download'), ['class' => 'btn btn-primary', 'type' => 'button', 'onclick' => 'downloadXls(this)']) !!}
                                    </div>
                                </div>
                                <div class="">
                                    <div id="listbkb"></div>
                                </div>

                            </div>
                            <div class="card-footer">
                                
                            </div>
                        </div>
                        {!! Form::close() !!}                        
                    </div>
                </div>
         </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">        
    function downloadXls(elm) {
        const _form = $(elm).closest('form')
        const _url = _form.attr('action')
        const _json = {'download_xls' : 1, 'v': moment.now(), 'sales' : $('select[name="sales[]"]').val(), 'period_range': _form.find('input[name=period_range]').val()}

        $.redirect(
            _url, 
            _json,
            'GET',
            '_blank'
        )    

    }    
</script>
@endpush