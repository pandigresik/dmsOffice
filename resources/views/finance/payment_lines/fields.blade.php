<!-- Payment Id Field -->
<div class="form-group row">
    {!! Form::label('payment_id', __('models/paymentLines.fields.payment_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('payment_id', $paymentItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Invoice Id Field -->
<div class="form-group row">
    {!! Form::label('invoice_id', __('models/paymentLines.fields.invoice_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('invoice_id', $invoiceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/paymentLines.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Amount Cn Field -->
<div class="form-group row">
    {!! Form::label('amount_cn', __('models/paymentLines.fields.amount_cn').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('amount_cn', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Amount Dn Field -->
<div class="form-group row">
    {!! Form::label('amount_dn', __('models/paymentLines.fields.amount_dn').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('amount_dn', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Amount Total Field -->
<div class="form-group row">
    {!! Form::label('amount_total', __('models/paymentLines.fields.amount_total').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('amount_total', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>
