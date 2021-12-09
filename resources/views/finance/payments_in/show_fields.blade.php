<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/payments.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $payment->number }}</p>
    </div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/payments.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $payment->type }}</p>
    </div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/payments.fields.reference').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $payment->reference }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/payments.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $payment->state }}</p>
    </div>
</div>

<!-- Estimate Date Field -->
<div class="form-group row">
    {!! Form::label('estimate_date', __('models/payments.fields.estimate_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $payment->estimate_date }}</p>
    </div>
</div>

<!-- Pay Date Field -->
<div class="form-group row">
    {!! Form::label('pay_date', __('models/payments.fields.pay_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $payment->pay_date }}</p>
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/payments.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $payment->amount }}</p>
    </div>
</div>

