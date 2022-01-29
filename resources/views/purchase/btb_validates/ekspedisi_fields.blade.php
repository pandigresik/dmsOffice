<!-- Ref Doc Field -->
<div class="form-group row">
    {!! Form::label('co_reference', __('models/btbValidates.fields.co_reference').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('co_reference', null, ['class' => 'form-control','maxlength' => 50, 'required' => 'required', 'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Ref Doc Field -->
<div class="form-group row">
    {!! Form::label('doc_id', __('models/btbValidates.fields.doc_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('doc_id', null, ['class' => 'form-control','maxlength' => 50, 'required' => 'required', 'readonly' => 'readonly']) !!}
</div>
</div>


<!-- Ekspedisi Reject Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_carrier_id', __('models/btbValidates.fields.dms_inv_carrier_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6">     
    {!! Form::select('dms_inv_carrier_id',$carrierItems , null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>
@push('scripts')
<script type="text/javascript">
    $(function(){
        
    })
</script>
@endpush