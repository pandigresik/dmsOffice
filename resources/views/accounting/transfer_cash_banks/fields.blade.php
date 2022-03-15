<!-- Type Account Field -->
<div class="form-group row">
    {!! Form::label('type_account', __('models/transferCashBanks.fields.type_account').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('type_account', $typeAccountItems, null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! Form::hidden('type', $type ) !!}
</div>
</div>

<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/transferCashBanks.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('number', null, ['class' => 'form-control','maxlength' => 15, 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Transaction Date Field -->
<div class="form-group row">
    {!! Form::label('transaction_date', __('models/transferCashBanks.fields.transaction_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('transaction_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'transaction_date']) !!}
</div>
</div>
