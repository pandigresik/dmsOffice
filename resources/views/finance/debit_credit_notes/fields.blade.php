<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/debitCreditNotes.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('type', $typeItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
    </div>
</div>

<!-- Partner Type Field -->
<div class="form-group row">
    {!! Form::label('partner_type', __('models/debitCreditNotes.fields.partner_type').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('partner_type', $partnerTypeItems, null, ['class' => 'form-control select2', 'required' =>
        'required']) !!}
    </div>
</div>

<!-- Issue Date Field -->
<div class="form-group row">
    {!! Form::label('issue_date', __('models/debitCreditNotes.fields.issue_date').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('issue_date', null, ['class' => 'form-control datetime', 'required' => 'required'
        ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript')
        ]]),'id'=>'issue_date']) !!}
    </div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/debitCreditNotes.fields.reference').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('reference', null, ['class' => 'form-control','maxlength' => 30, 'required' => 'required']) !!}
    </div>
</div>

<!-- Invoice Id Field -->
<div class="form-group row">
    {!! Form::label('invoice_id', __('models/debitCreditNotes.fields.invoice_id').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('invoice_id', $invoiceItems, null, ['class' => 'form-control select2', 'required' =>
        'required'], $invoiceItemOptions) !!}
        {!! Form::hidden('partner_id', null) !!}
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/debitCreditNotes.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('amount', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' =>
        1, 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/debitCreditNotes.fields.description').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'rows' => 3]) !!}
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(function () {
        $('select[name=invoice_id]').change(function () {
            const _val = $(this).val();
            $('input[name=partner_id]').val('');
            if (!_.isEmpty(_val)) {
                $('input[name=partner_id]').val($(this).find('option:selected').attr('partner_id'));
            }

        })
    })
</script>
@endpush