<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/accountBalances.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountBalance->code }}</p>
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/accountBalances.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountBalance->amount }}</p>
    </div>
</div>

<!-- Balance Date Field -->
<div class="form-group row">
    {!! Form::label('balance_date', __('models/accountBalances.fields.balance_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountBalance->balance_date }}</p>
    </div>
</div>

