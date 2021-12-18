<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/locations.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 80,'maxlength' => 80, 'required' => 'required']) !!}
</div>
</div>

<!-- District Field -->
<div class="form-group row">
    {!! Form::label('district', __('models/locations.fields.district').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('district', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/locations.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::select('city', $cityItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/locations.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::select('type', $typeItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference_id', __('models/locations.fields.reference_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::select('reference_id', $referenceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

@push('scripts')
<script>
    $(function(){
        $('select[name=type]').change(function(){            
            const _val = $(this).val()
            $('select[name=reference_id] optgroup').prop('disabled',1)
            if(!_.isEmpty(_val)){
                $('select[name=reference_id] optgroup[label='+_val+']').prop('disabled',0)
            }
            $('select[name=reference_id]').val('')   
            $('select[name=reference_id]').trigger('change')
        });

        if(_.isEmpty($('select[name=type]').val())){
            $('select[name=type]').trigger('change');
        }        
    })
</script>
@endpush