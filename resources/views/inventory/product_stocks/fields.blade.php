<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/productStocks.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- First Stock Field -->
<div class="form-group row">
    {!! Form::label('first_stock', __('models/productStocks.fields.first_stock').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('first_stock', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Supplier In Field -->
<div class="form-group row">
    {!! Form::label('supplier_in', __('models/productStocks.fields.supplier_in').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('supplier_in', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Mutation In Field -->
<div class="form-group row">
    {!! Form::label('mutation_in', __('models/productStocks.fields.mutation_in').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('mutation_in', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Distribution In Field -->
<div class="form-group row">
    {!! Form::label('distribution_in', __('models/productStocks.fields.distribution_in').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('distribution_in', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Supplier Out Field -->
<div class="form-group row">
    {!! Form::label('supplier_out', __('models/productStocks.fields.supplier_out').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('supplier_out', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Mutation Out Field -->
<div class="form-group row">
    {!! Form::label('mutation_out', __('models/productStocks.fields.mutation_out').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('mutation_out', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Distribution Out Field -->
<div class="form-group row">
    {!! Form::label('distribution_out', __('models/productStocks.fields.distribution_out').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('distribution_out', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Morphing Field -->
<div class="form-group row">
    {!! Form::label('morphing', __('models/productStocks.fields.morphing').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('morphing', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Last Stock Field -->
<div class="form-group row">
    {!! Form::label('last_stock', __('models/productStocks.fields.last_stock').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('last_stock', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Period Field -->
<div class="form-group row">
    {!! Form::label('period', __('models/productStocks.fields.period').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('period', null, ['class' => 'form-control','maxlength' => 7,'maxlength' => 7, 'required' => 'required']) !!}
</div>
</div>

<!-- Additional Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('additional_info', __('models/productStocks.fields.additional_info').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::textarea('additional_info', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>
