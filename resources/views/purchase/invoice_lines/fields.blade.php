<!-- Invoice Id Field -->
<div class="form-group row">
    {!! Form::label('invoice_id', __('models/invoiceLines.fields.invoice_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('invoice_id', $invoiceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Doc Id Field -->
<div class="form-group row">
    {!! Form::label('doc_id', __('models/invoiceLines.fields.doc_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('doc_id', $docItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Reference Id Field -->
<div class="form-group row">
    {!! Form::label('reference_id', __('models/invoiceLines.fields.reference_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('reference_id', $referenceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/invoiceLines.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Product Name Field -->
<div class="form-group row">
    {!! Form::label('product_name', __('models/invoiceLines.fields.product_name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('product_name', null, ['class' => 'form-control','maxlength' => 70,'maxlength' => 70, 'required' => 'required']) !!}
</div>
</div>

<!-- Uom Id Field -->
<div class="form-group row">
    {!! Form::label('uom_id', __('models/invoiceLines.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('uom_id', $uomItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Qty Field -->
<div class="form-group row">
    {!! Form::label('qty', __('models/invoiceLines.fields.qty').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('qty', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/invoiceLines.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>
