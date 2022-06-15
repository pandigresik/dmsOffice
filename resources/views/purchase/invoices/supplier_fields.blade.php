<!-- CO Number Field -->
<div class="form-group row">
    {!! Form::label('partner_id', __('models/invoices.fields.partner_id').':', ['class' => 'col-md-3 col-form-label'])
    !!}
    <div class="col-md-6">
        {!! Form::select('partner_id', $partnerItem,null, ['class' => 'form-control select2', 'required' => 'required',
        'data-placeholder' => 'Pilih Supplier']) !!}
    </div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('external_reference', __('models/invoices.fields.external_reference').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('external_reference', null, ['class' => 'form-control','maxlength' => 255, 'required' =>
        'required']) !!}
    </div>
</div>

<!-- Date Invoice Field -->
<div class="form-group row">
    {!! Form::label('date_invoice', __('models/invoices.fields.date_invoice').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('date_invoice', null, ['class' => 'form-control datetime', 'required' => 'required'
        ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript')
        ]]),'id'=>'date_invoice']) !!}
    </div>
</div>

<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('date_due', __('models/invoices.fields.date_due').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('date_due', null, ['class' => 'form-control datetime', 'required' => 'required'
        ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript')
        ]]),'id'=>'date_due']) !!}
    </div>
</div>

<!-- Date Invoice Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/invoices.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('amount', null, ['class' => 'form-control inputmask amount', 'readonly' => 'readonly','required'
        => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
    </div>
</div>
<hr>
<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('period', __('models/invoices.fields.period').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('period', null, ['class' => 'form-control datetime period', 'required' => 'required'
        ,'data-optiondate' => json_encode( ['singleDatePicker' => false, 'locale' => ['format' =>
        config('local.date_format_javascript') ]])]) !!}
    </div>
</div>

<!-- Branch Field -->
<div class="form-group row">
    {!! Form::label('branch_id', __('models/invoices.fields.branch_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::select('supplier_branch_id', $branchItem, null, ['class' => 'form-control select2 branch_id',
        'multiple' => 'multiple', 'data-placeholder' => 'Pilih Depo']) !!}
    </div>
</div>


<div class="form-group">
    <div class="nav-tabs-boxed">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" data-href="#bkb-itemlist"><a class="nav-link active" data-toggle="tab" href="#bkb-itemlist"
                    role="tab" aria-controls="bkb-itemlist" aria-selected="false">List BKB</a>
            </li>
            <li class="nav-item" data-href="#btb-itemlist"><a class="nav-link" data-toggle="tab"
                    href="#btb-itemlist" role="tab" aria-controls="btb-itemlist" aria-selected="true">List BTB</a>
            </li>            
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="bkb-itemlist" role="tabpanel">
                <div class="row">
                    <div class="col-md-3">        
                        <input class="form-control-file" onchange="updateListBkb(this)" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="" type="file">
                        <a href="/vendor/js-xlsx/template-listbkb-dms.xlsx">Template BKB</a>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive bkb-lines">

                    </div>
                </div>
                
            </div>
            <div class="tab-pane" id="btb-itemlist" role="tabpanel">
                <div class="col-md-6 col-offset-md-3 mb-2">
                    <button type='button' class='btn btn-primary btn-add-items'
                        data-url='{{ route('purchase.invoiceLines.create') }}'
                        onclick='showListBtb(this)'>Add
                        BTB</button>
                </div>
                <div class="col-md-12 table-responsive invoice-lines" onchange="updateAmount(this)">

                </div>
            </div>            

        </div>
    </div>

</div>