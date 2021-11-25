<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('reference_id', __('models/btbValidates.fields.reference_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::select('reference_id', $btbItems, null, ['class' => 'form-control select2', 'required' => 'required', 'data-placeholder' => 'Pilih BTB', 'data-ascard' => 1, 'data-selectascard' => 0], $btbDataOptions) !!}
    {!! Form::hidden('product_id', null) !!}
    {!! Form::hidden('uom_id', null) !!}    
</div>
</div>

<!-- Ref Doc Field -->
<div class="form-group row">
    {!! Form::label('co_reference', __('models/btbValidates.fields.co_reference').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('co_reference', null, ['class' => 'form-control','maxlength' => 50, 'required' => 'required', 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Ref Doc Field -->
<div class="form-group row">
    {!! Form::label('product_name', __('models/btbValidates.fields.product_name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('product_name', null, ['class' => 'form-control','maxlength' => 70, 'required' => 'required', 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Ref Doc Field -->
<div class="form-group row">
    {!! Form::label('doc_id', __('models/btbValidates.fields.doc_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('doc_id', null, ['class' => 'form-control','maxlength' => 50, 'required' => 'required', 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Ref Doc Field -->
<div class="form-group row">
    {!! Form::label('ref_doc', __('models/btbValidates.fields.ref_doc').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('ref_doc', null, ['class' => 'form-control','maxlength' => 50, 'required' => 'required', 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Qty Field -->
<div class="form-group row">
    {!! Form::label('qty', __('models/btbValidates.fields.qty').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('qty', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer')), 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Qty Retur Field -->
<div class="form-group row">
    {!! Form::label('qty_retur', __('models/btbValidates.fields.qty_retur').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('qty_retur', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
</div>
</div>

<!-- Qty Reject Field -->
<div class="form-group row">
    {!! Form::label('qty_reject', __('models/btbValidates.fields.qty_reject').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6">     
    {!! Form::text('qty_reject', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
</div>
</div>
@push('scripts')
<script type="text/javascript">
    $(function(){
        $('select[name=reference_id]').change(function(){
            const _form = $(this).closest('form');
            const _option = $(this).find('option:selected');
            const _co_reference = _form.find('input[name=co_reference]');
            const _product_name = _form.find('input[name=product_name]');
            const _ref_doc = _form.find('input[name=ref_doc]');
            const _doc_id = _form.find('input[name=doc_id]');
            const _uom_id = _form.find('input[name=uom_id]');
            const _product_id = _form.find('input[name=product_id]');
            const _qty = _form.find('input[name=qty]');
            const _qty_retur = _form.find('input[name=qty_retur]');
            _co_reference.val('');
            _product_name.val('');
            _ref_doc.val('');
            _doc_id.val('');
            _co_reference.val('');
            _product_id.val('');
            _uom_id.val('');
            if(!_.isEmpty($(this).val())){
                _co_reference.val(_option.attr('co_reference'));
                _product_name.val(_option.attr('product_name'));
                _ref_doc.val(_option.attr('sj_pabrik'));
                _doc_id.val(_option.attr('no_btb'));                
                _product_id.val(_option.attr('product_id'));
                _uom_id.val(_option.attr('uom_id'));
                _qty.val(parseInt(_option.attr('decqty')));
                _qty_retur.val(parseInt(_option.attr('decqty')));
            }
            
        });
    })
</script>
@endpush