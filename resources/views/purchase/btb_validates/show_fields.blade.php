<!-- Doc Id Field -->
<div class="form-group row">
    {!! Form::label('doc_id', __('models/btbValidates.fields.doc_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $btbValidate->doc_id }}</p>
    </div>
</div>

<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/btbValidates.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $btbValidate->product_id }}</p>
    </div>
</div>

<!-- Uom Id Field -->
<div class="form-group row">
    {!! Form::label('uom_id', __('models/btbValidates.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $btbValidate->uom_id }}</p>
    </div>
</div>

<!-- Ref Doc Field -->
<div class="form-group row">
    {!! Form::label('ref_doc', __('models/btbValidates.fields.ref_doc').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $btbValidate->ref_doc }}</p>
    </div>
</div>

<!-- Qty Field -->
<div class="form-group row">
    {!! Form::label('qty', __('models/btbValidates.fields.qty').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $btbValidate->qty }}</p>
    </div>
</div>

<!-- Qty Retur Field -->
<div class="form-group row">
    {!! Form::label('qty_retur', __('models/btbValidates.fields.qty_retur').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $btbValidate->qty_retur }}</p>
    </div>
</div>

<!-- Qty Reject Field -->
<div class="form-group row">
    {!! Form::label('qty_reject', __('models/btbValidates.fields.qty_reject').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $btbValidate->qty_reject }}</p>
    </div>
</div>

<!-- Invoiced Field -->
<div class="form-group row">
    {!! Form::label('invoiced', __('models/btbValidates.fields.invoiced').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $btbValidate->invoiced }}</p>
    </div>
</div>

