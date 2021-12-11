<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/invoices.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoice->number }}</p>
    </div>
</div>

<!-- Partner Id Field -->
<div class="form-group row">
    {!! Form::label('partner_id', __('models/invoices.fields.partner_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoice->partner->szName ?? $invoice->ekspedisi->szName }}</p>
    </div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/invoices.fields.reference').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoice->external_reference }}</p>
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/invoices.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoice->amount }}</p>
    </div>
</div>

<!-- Date Invoice Field -->
<div class="form-group row">
    {!! Form::label('date_invoice', __('models/invoices.fields.date_invoice').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoice->date_invoice }}</p>
    </div>
</div>

<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('date_due', __('models/invoices.fields.date_due').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoice->date_due }}</p>
    </div>
</div>

<div class="form-group row">       
    @include('purchase.invoices.list')
</div>