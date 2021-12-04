<!-- Invoice Id Field -->
<div class="form-group row">
    {!! Form::label('invoice_id', __('models/invoiceLines.fields.invoice_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoiceLine->invoice_id }}</p>
    </div>
</div>

<!-- Doc Id Field -->
<div class="form-group row">
    {!! Form::label('doc_id', __('models/invoiceLines.fields.doc_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoiceLine->doc_id }}</p>
    </div>
</div>

<!-- Reference Id Field -->
<div class="form-group row">
    {!! Form::label('reference_id', __('models/invoiceLines.fields.reference_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoiceLine->reference_id }}</p>
    </div>
</div>

<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/invoiceLines.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoiceLine->product_id }}</p>
    </div>
</div>

<!-- Product Name Field -->
<div class="form-group row">
    {!! Form::label('product_name', __('models/invoiceLines.fields.product_name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoiceLine->product_name }}</p>
    </div>
</div>

<!-- Uom Id Field -->
<div class="form-group row">
    {!! Form::label('uom_id', __('models/invoiceLines.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoiceLine->uom_id }}</p>
    </div>
</div>

<!-- Qty Field -->
<div class="form-group row">
    {!! Form::label('qty', __('models/invoiceLines.fields.qty').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoiceLine->qty }}</p>
    </div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/invoiceLines.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $invoiceLine->price }}</p>
    </div>
</div>

