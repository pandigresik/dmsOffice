<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/accountBalances.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'required' => 'required']) !!}
</div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/accountBalances.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Balance Date Field -->
<div class="form-group row">
    {!! Form::label('balance_date', __('models/accountBalances.fields.balance_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('balance_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'balance_date']) !!}
</div>
</div>
