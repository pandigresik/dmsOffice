<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/debitCreditNotes.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $debitCreditNote->number }}</p>
    </div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/debitCreditNotes.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $debitCreditNote->type }}</p>
    </div>
</div>

<!-- Partner Type Field -->
<div class="form-group row">
    {!! Form::label('partner_type', __('models/debitCreditNotes.fields.partner_type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $debitCreditNote->partner_type }}</p>
    </div>
</div>

<!-- Partner Id Field -->
<div class="form-group row">
    {!! Form::label('partner_id', __('models/debitCreditNotes.fields.partner_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $debitCreditNote->partner_id }}</p>
    </div>
</div>

<!-- Issue Date Field -->
<div class="form-group row">
    {!! Form::label('issue_date', __('models/debitCreditNotes.fields.issue_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $debitCreditNote->issue_date }}</p>
    </div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/debitCreditNotes.fields.reference').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $debitCreditNote->reference }}</p>
    </div>
</div>

<!-- Invoice Id Field -->
<div class="form-group row">
    {!! Form::label('invoice_id', __('models/debitCreditNotes.fields.invoice_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $debitCreditNote->invoice_id }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/debitCreditNotes.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $debitCreditNote->description }}</p>
    </div>
</div>

