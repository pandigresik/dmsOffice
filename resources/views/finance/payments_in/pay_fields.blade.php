<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/payments.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('number', null, ['class' => 'form-control','maxlength' => 30, 'required' => 'required', 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/payments.fields.reference').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('reference', null, ['class' => 'form-control','maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Pay Date Field -->
<div class="form-group row">
    {!! Form::label('pay_date', __('models/payments.fields.pay_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('pay_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'pay_date']) !!}
</div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/payments.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('amount', null, ['class' => 'form-control inputmask', 'required' => 'required', 'readonly' => 'readonly', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}
</div>
</div>
