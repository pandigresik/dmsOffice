<!-- CO Number Field -->
<div class="form-group row">
    {!! Form::label('partner_id', __('models/invoices.fields.partner_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::select('partner_id', $partnerItem,null, ['class' => 'form-control select2', 'required' => 'required', 'data-placeholder' => 'Pilih Supplier']) !!}
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

<!-- Date Invoice Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/invoices.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('amount', null, ['class' => 'form-control inputmask', 'readonly' => 'readonly','required' => 'required', 'id' => 'amount', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
</div>
</div>

<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('date_due', __('models/invoices.fields.date_due').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('date_due', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'date_due']) !!}
</div>
</div>

<!-- Date Due Field -->
<div class="form-group row">    
    <div class="col-md-6 col-offset-md-3"> 
        <button type='button' id="btn-add-items" class='btn btn-primary' data-url='{{ route('purchase.invoiceLines.create') }}' onclick='addListDoc(this);main.setButtonCaller(this);main.popupModal(this,"get")'>Add Item</button>
    </div>
    <div class="col-md-12 table-responsive" id="invoice-lines">
    
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    function addListDoc(elm){
            const _invoiceLines = $('#invoice-lines')
            let _invoiceLinesTable = _invoiceLines.find('table')
            let _docId = []
            if(_invoiceLinesTable.length){
                _invoiceLinesTable.find('tbody>tr>td>input[name^=invoice_line]').each(function(){
                    _docId.push($(this).data('docid'))
                })
                let _json = $(elm).data('json')
                _json.listdoc = _docId
                
                $(elm).data('json', _json)
            }
        }
    $(function(){        
        $('select[name=partner_id]').change(function(){        
            $('#invoice-lines').empty();
            $('#btn-add-items').data('json',{type : 'supplier', partner_id : $(this).val()});
        })
    })
</script>
@endpush