@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">@lang('models/reportPayable.plural')</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'accounting.reportPayable.index']) !!}
                        <div class="card">
                            <div class="card-header">                                
                                <strong>@lang('models/reportPayable.singular')</strong>
                            </div>
                            <div class="card-body">                   
                                <!-- Range Period Field -->
                                <div class="form-group row">
                                    {!! Form::label('period_range', __('models/reportPayable.fields.period_range').':', ['class' => 'col-md-3 col-form-label']) !!}
                                    <div class="col-md-9"> 
                                        {!! Form::text('period_range', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['singleDatePicker' => false, 'locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'period_range']) !!}
                                    </div>                                    
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('period_range', __('models/reportPayable.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
                                    <div class="col-md-9"> 
                                        {!! Form::select('type', $typeItems, null, ['class' => 'form-control']) !!}
                                    </div>                                    
                                </div>                                
                                <div class="form-group row">                                    
                                    <div class="col-md-6 offset-3">
                                        {!! Form::button(__('crud.process'), ['class' => 'btn btn-success', 'data-target' => '#listcost', 'data-url' => route('accounting.reportPayable.index'), 'data-json' => '{}', 'data-ref' => 'input[name=period_range],select[name=type]' ,'onclick' => 'main.loadDetailPage(this,\'get\')', 'type' => 'button']) !!}
                                        {!! Form::button(__('crud.download'), ['class' => 'btn btn-primary', 'type' => 'button', 'onclick' => 'downloadXls(this)']) !!}
                                    </div>
                                </div>

                                <div class="">
                                    <div class="table-responsive" id="listcost"></div>
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
        const _json = {'download_xls' : 1, 'v': moment.now(), 'period_range': _form.find('input[name=period_range]').val(), 'type': _form.find('input[name=type]').val()}

        $.redirect(
            _url, 
            _json,
            'GET',
            '_blank'
        )    

    }    
</script>
@endpush