<!-- Type Account Field -->
<div class="form-group row">
    {!! Form::label('type_account', __('models/transferCashBanks.fields.type_account').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $transferCashBank->type_account }}</p>
    </div>
</div>

<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/transferCashBanks.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $transferCashBank->number }}</p>
    </div>
</div>

<!-- Transaction Date Field -->
<div class="form-group row">
    {!! Form::label('transaction_date', __('models/transferCashBanks.fields.transaction_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $transferCashBank->transaction_date }}</p>
    </div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/transferCashBanks.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $transferCashBank->type }}</p>
    </div>
</div>

