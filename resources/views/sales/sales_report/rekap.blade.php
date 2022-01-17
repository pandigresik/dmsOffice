@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">@lang('models/salesReport.plural')</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'sales.salesReport.rekap']) !!}
                        <div class="card">
                            <div class="card-header">                                
                                <strong>Rekap @lang('models/salesReport.singular')</strong>
                            </div>
                            <div class="card-body">                   
                                <!-- Range Period Field -->
                                <div class="form-group row">
                                    {!! Form::label('period_range', __('models/salesReport.fields.period_range').':', ['class' => 'col-md-2 col-form-label']) !!}
                                    <div class="col-md-3"> 
                                        {!! Form::text('period_range', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['singleDatePicker' => false, 'locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'period_range']) !!}
                                    </div>
                                    <div class="clo-md-3 mr-2">
                                        {!! Form::select('branch_id', $branchItems, null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="clo-md-2 mr-2">
                                        {!! Form::select('cash', $cashItems, null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="clo-md-2">
                                        {!! Form::button(__('crud.process'), ['class' => 'btn btn-success', 'data-target' => '#listbkb', 'data-url' => route('sales.salesReport.rekap'), 'data-json' => '{}', 'data-ref' => 'input[name=period_range],select[name=branch_id],select[name=cash]' ,'onclick' => 'main.loadDetailPage(this,\'get\')', 'type' => 'button']) !!}
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
        const _json = {'download_xls' : 1,'branch_id' : _form.find('select[name=branch_id]').val(), 'cash' : _form.find('select[name=cash]').val(), 'period_range': _form.find('input[name=period_range]').val()}

        $.redirect(
            _url, 
            _json,
            'GET',
            '_blank'
        )    

    }    
</script>
@endpush