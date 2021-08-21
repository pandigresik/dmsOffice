<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountInvoices.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/accountInvoices.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('number', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Amount Total Field -->
<div class="form-group row">
    {!! Form::label('amount_total', __('models/accountInvoices.fields.amount_total').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('amount_total', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/accountInvoices.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('company_id', $companyItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Vendor Id Field -->
<div class="form-group row">
    {!! Form::label('vendor_id', __('models/accountInvoices.fields.vendor_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('vendor_id', $vendorItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Account Journal Id Field -->
<div class="form-group row">
    {!! Form::label('account_journal_id', __('models/accountInvoices.fields.account_journal_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('account_journal_id', $accountJournalItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/accountInvoices.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- References Field -->
<div class="form-group row">
    {!! Form::label('references', __('models/accountInvoices.fields.references').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('references', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', __('models/accountInvoices.fields.comment').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/accountInvoices.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Date Invoice Field -->
<div class="form-group row">
    {!! Form::label('date_invoice', __('models/accountInvoices.fields.date_invoice').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('date_invoice', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'date_invoice']) !!}
</div>
</div>

<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('date_due', __('models/accountInvoices.fields.date_due').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('date_due', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'date_due']) !!}
</div>
</div>
