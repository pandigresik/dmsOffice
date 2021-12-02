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

<!-- Date Due Field -->
<div class="form-group row">
    {!! Form::label('date_due', __('models/invoices.fields.date_due').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('date_due', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'date_due']) !!}
</div>
</div>

@push('scripts')
<script type="text/javascript">
    $(function(){
        $('select[name=reference]').change(function(){
            const _form = $(this).closest('form');
            const _option = $(this).find('option:selected');                        
            const _qtysum = _form.find('input[name=qtysum]');
            const _partner_id = _form.find('input[name=partner_id]');            
            
            _partner_id.val('');
            _qtysum.val('');
            
            if(!_.isEmpty($(this).val())){
                _partner_id.val(_option.attr('partner_id'));                
                _qtysum.val(parseInt(_option.attr('qtysum')));                
            }            
        });

        $('input[name=qty]').blur(function(){
            const _form = $(this).closest('form');
            const _qtysum = _form.find('input[name=qtysum]');
            const _elm = $(this);
            if($(this).val() != _qtysum.val()){
                main.alertDialog('Warning', 'Nilai quantity harus sama dengan total quantity CO', function(){
                    _elm.val('');
                });
            }
        })
    })
</script>
@endpush