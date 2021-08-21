<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountInvoices.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->name }}</p>
    </div>
</div>

<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/accountInvoices.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->number }}</p>
    </div>
</div>

<!-- Amount Total Field -->
<div class="form-group row">
    {!! Form::label('amount_total', __('models/accountInvoices.fields.amount_total').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->amount_total }}</p>
    </div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/accountInvoices.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->company_id }}</p>
    </div>
</div>

<!-- Vendor Id Field -->
<div class="form-group row">
    {!! Form::label('vendor_id', __('models/accountInvoices.fields.vendor_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->vendor_id }}</p>
    </div>
</div>

<!-- Account Journal Id Field -->
<div class="form-group row">
    {!! Form::label('account_journal_id', __('models/accountInvoices.fields.account_journal_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->account_journal_id }}</p>
    </div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/accountInvoices.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->type }}</p>
    </div>
</div>

<!-- References Field -->
<div class="form-group row">
    {!! Form::label('references', __('models/accountInvoices.fields.references').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->references }}</p>
    </div>
</div>

<!-- Comment Field -->
<div class="form-group row">
    {!! Form::label('comment', __('models/accountInvoices.fields.comment').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->comment }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/accountInvoices.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->state }}</p>
    </div>
</div>

<!-- Date Invoice Field -->
<div class="form-group row">
    {!! Form::label('date_invoice', __('models/accountInvoices.fields.date_invoice').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->date_invoice }}</p>
    </div>
</div>

<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('date_due', __('models/accountInvoices.fields.date_due').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountInvoice->date_due }}</p>
    </div>
</div>

