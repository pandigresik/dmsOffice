<!-- CO Number Field -->
<div class="form-group row">
    {!! Form::label('co_reference', __('models/invoices.fields.co_reference').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::select('co_reference', $coItems,null, ['class' => 'form-control select2', 'required' => 'required', 'data-placeholder' => 'Pilih CO'], $coItemOptions) !!}
</div>
</div>

<!-- Qty Field -->
<div class="form-group row">
    {!! Form::label('qtysum', __('models/invoices.fields.qtysum').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('qtysum', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer')), 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/invoices.fields.reference').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('reference', null, ['class' => 'form-control','maxlength' => 255, 'required' => 'required']) !!}
    {!! Form::hidden('partner_id') !!}
</div>
</div>

<!-- Qty Field -->
<div class="form-group row">
    {!! Form::label('qty', __('models/invoices.fields.qty').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('qty', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
</div>
</div>


<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/invoices.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('amount', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
</div>
</div>

<!-- Amount Discount Field -->
<div class="form-group row">
    {!! Form::label('amount_discount', __('models/invoices.fields.amount_discount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('amount_discount', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
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
        $('select[name=co_reference]').change(function(){
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