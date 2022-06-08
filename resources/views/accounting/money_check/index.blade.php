@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">@lang('models/moneyCheck.plural')</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'accounting.moneyCheck.index']) !!}
                        <div class="card">
                            <div class="card-header">                                
                                <strong>Rekap @lang('models/moneyCheck.singular')</strong>
                            </div>
                            <div class="card-body">                   
                                <!-- Range Period Field -->
                                <div class="form-group row">
                                    {!! Form::label('period_range', __('models/moneyCheck.fields.period_range').':', ['class' => 'col-md-3 col-form-label']) !!}
                                    <div class="col-md-9"> 
                                        {!! Form::text('period_range', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['singleDatePicker' => false, 'locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'period_range']) !!}
                                    </div>                                    
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('branch_id', __('models/moneyCheck.fields.branch_id').':', ['class' => 'col-md-3 col-form-label']) !!}
                                    <div class="col-md-9"> 
                                        {!! Form::select('branch_id', $branchItem, null, ['class' => 'form-control select2']) !!}
                                    </div>                                    
                                </div>                                
                                <div class="form-group row">                                    
                                    <div class="col-md-6 offset-3">
                                        {!! Form::button(__('crud.process'), ['class' => 'btn btn-success', 'data-target' => '#listmoneycheck', 'data-url' => route('accounting.moneyCheck.index'), 'data-json' => '{}', 'data-ref' => 'input[name=period_range],select[name=branch_id]' ,'onclick' => 'main.loadDetailPage(this,\'get\', function(){ main.initInputmask($(\'#listmoneycheck\')) })', 'type' => 'button']) !!}
                                        {!! Form::button(__('crud.download'), ['class' => 'btn btn-primary', 'type' => 'button', 'onclick' => 'downloadXls(this)']) !!}
                                    </div>
                                </div>

                                <div class="">
                                    <div class="table-responsive" id="listmoneycheck"></div>
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
        const _json = {'download_xls' : 1, 'v': moment.now(),'period_range': _form.find('input[name=period_range]').val(), 'branch_id': _form.find('select[name=branch_id]').val()}

        $.redirect(
            _url, 
            _json,
            'GET',
            '_blank'
        )    

    }
    function updateTotalSetoran(elm){
        const _tr = $(elm).closest('tr')
        const _totalSetoran = _tr.find('td.total_setoran').data('item')
        let _total = 0, _unmaskedvalue = 0, _selisih
        _tr.find('td.bank_manual input').each(function(){
            _unmaskedvalue = parseInt($(this).inputmask('unmaskedvalue')) || 0
            _total += _unmaskedvalue            
        })
        _selisih = _totalSetoran - _total
        _tr.find('td.total').text(Inputmask.format(_total,{alias:'numeric', 'digit': 0, 'autoGroup': true, 'groupSeparator': '.', 'radixPoint' : ','}))
        _tr.find('td.selisih').text(Inputmask.format(_selisih,{alias:'numeric', 'digit': 0, 'autoGroup': true, 'groupSeparator': '.', 'radixPoint' : ','}))
        saveBankDeposit(elm)
    }

    function saveBankDeposit(elm){
        const _url = '{{ route('accounting.moneyCheck.update', 1) }}'
        const _unmaskedvalue = parseInt($(elm).inputmask('unmaskedvalue')) || 0
        const _data = {account_id: $(elm).data('account_id'), transaction_date: $(elm).data('transaction_date'), branch_id: $(elm).data('branch_id') , amount: _unmaskedvalue }
        $.ajax({
            url: _url,
            data: _data,
            dataType: 'json',
            type: 'PUT',
            beforeSend: function() {
                $(elm).next('div.input-group-append').find('i').removeClass('fa-save')
                $(elm).next('div.input-group-append').find('i').addClass('fa-spin fa-spinner')                
            },
            success: function(data) {
                $(elm).next('div.input-group-append').find('i').removeClass('fa-spin fa-spinner')
                $(elm).next('div.input-group-append').find('i').addClass('fa-save')
            }
        })        
    }
</script>
@endpush