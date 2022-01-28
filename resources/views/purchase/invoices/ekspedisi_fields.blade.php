<!-- CO Number Field -->
<div class="form-group row">
    {!! Form::label('partner_id', __('models/invoices.fields.partner_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::select('ekspedisi_id', $ekspedisiItem,null, ['class' => 'form-control select2', 'required' => 'required', 'data-placeholder' => 'Pilih Ekspedisi']) !!}
</div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('external_reference', __('models/invoices.fields.external_reference').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('external_reference', null, ['class' => 'form-control','maxlength' => 255, 'required' => 'required']) !!}    
</div>
</div>

<!-- Date Invoice Field -->
<div class="form-group row">
    {!! Form::label('date_invoice', __('models/invoices.fields.date_invoice').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('date_invoice', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'date_invoice']) !!}
</div>
</div>

<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('date_due', __('models/invoices.fields.date_due').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('date_due', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'date_due']) !!}
</div>
</div>

<!-- Date Invoice Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/invoices.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('amount', null, ['class' => 'form-control inputmask amount', 'readonly' => 'readonly','required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
</div>
</div>
<hr>
<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('period', __('models/invoices.fields.period').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('period', null, ['class' => 'form-control datetime period', 'required' => 'required' ,'data-optiondate' => json_encode( ['singleDatePicker' => false, 'locale' => ['format' => config('local.date_format_javascript') ]])]) !!}
</div>
</div>

<!-- Date Due Field -->
<div class="form-group row">    
    <div class="col-md-6 col-offset-md-3 mb-2"> 
        <button type='button' class='btn btn-primary btn-add-items' data-url='{{ route('purchase.invoiceLines.create') }}' onclick='addListDoc(this);main.setButtonCaller(this);main.popupModal(this,"get")'>Add Item</button>
    </div>
    <div class="col-md-12 table-responsive invoice-lines" onchange="updateAmount(this)">
    
    </div>
</div>