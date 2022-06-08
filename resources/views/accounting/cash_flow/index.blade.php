@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">@lang('models/cashFlow.plural')</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'accounting.cashFlow.index']) !!}
                        <div class="card">
                            <div class="card-header">                                
                                <strong>Rekap @lang('models/cashFlow.singular')</strong>
                            </div>
                            <div class="card-body">                   
                                <!-- Range Period Field -->
                                <div class="form-group row">
                                    {!! Form::label('period_range', __('models/cashFlow.fields.period_range').':', ['class' => 'col-md-3 col-form-label']) !!}
                                    <div class="col-md-9"> 
                                        @php
                                            $ranges = [
                                                    '3 Bulan Terakhir' => [\Jenssegers\Date\Date::now()->subMonths(3)->format(config('local.date_format')), \Jenssegers\Date\Date::now()->format(config('local.date_format'))],
                                                    '6 Bulan Terakhir' => [\Jenssegers\Date\Date::now()->subMonths(6)->format(config('local.date_format')), \Jenssegers\Date\Date::now()->format(config('local.date_format'))],
                                                    '9 Bulan Terakhir' => [\Jenssegers\Date\Date::now()->subMonths(9)->format(config('local.date_format')), \Jenssegers\Date\Date::now()->format(config('local.date_format'))],
                                                    '12 Bulan Terakhir' => [\Jenssegers\Date\Date::now()->subMonths(12)->format(config('local.date_format')), \Jenssegers\Date\Date::now()->format(config('local.date_format'))]
                                                ];
                                        @endphp
                                        {!! Form::text('period_range', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['singleDatePicker' => false, 'ranges' => $ranges, 'locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'period_range']) !!}
                                    </div>                                    
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('branch_id', 'Depo:', ['class' => 'col-md-3 col-form-label']) !!}                                   
                                    <div class="col-md-9">
                                        {!! Form::select('branch_id', $branchItems, null, ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => 'required']) !!}
                                    </div>                                                                        
                                </div>
                                <div class="form-group row">                                    
                                    <div class="col-md-6 offset-3">
                                        {!! Form::button(__('crud.process'), ['class' => 'btn btn-success', 'data-target' => '#listcashFlow', 'data-url' => route('accounting.cashFlow.index'), 'data-json' => '{}', 'data-ref' => 'input[name=period_range],select[name=branch_id]' ,'onclick' => 'main.loadDetailPage(this,\'get\')', 'type' => 'button']) !!}
                                        {!! Form::button(__('crud.download'), ['class' => 'btn btn-primary', 'type' => 'button', 'onclick' => 'downloadXls(this)']) !!}
                                    </div>
                                </div>

                                <div class="">
                                    <div class="table-responsive" id="listcashFlow"></div>
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
        const _json = {'download_xls' : 1, 'v': moment.now(), 'period_range': _form.find('input[name=period_range]').val(), 'branch_id' : _form.find('select[name=branch_id]').val()}

        $.redirect(
            _url, 
            _json,
            'GET',
            '_blank'
        )    

    }    
</script>
@endpush