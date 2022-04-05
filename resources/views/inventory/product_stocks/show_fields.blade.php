<!-- Product Id Field -->
<div class="form-group row">
    {!! Form::label('product_id', __('models/productStocks.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->product_id }}</p>
    </div>
</div>

<!-- First Stock Field -->
<div class="form-group row">
    {!! Form::label('first_stock', __('models/productStocks.fields.first_stock').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->first_stock }}</p>
    </div>
</div>

<!-- Supplier In Field -->
<div class="form-group row">
    {!! Form::label('supplier_in', __('models/productStocks.fields.supplier_in').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->supplier_in }}</p>
    </div>
</div>

<!-- Mutation In Field -->
<div class="form-group row">
    {!! Form::label('mutation_in', __('models/productStocks.fields.mutation_in').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->mutation_in }}</p>
    </div>
</div>

<!-- Distribution In Field -->
<div class="form-group row">
    {!! Form::label('distribution_in', __('models/productStocks.fields.distribution_in').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->distribution_in }}</p>
    </div>
</div>

<!-- Supplier Out Field -->
<div class="form-group row">
    {!! Form::label('supplier_out', __('models/productStocks.fields.supplier_out').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->supplier_out }}</p>
    </div>
</div>

<!-- Mutation Out Field -->
<div class="form-group row">
    {!! Form::label('mutation_out', __('models/productStocks.fields.mutation_out').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->mutation_out }}</p>
    </div>
</div>

<!-- Distribution Out Field -->
<div class="form-group row">
    {!! Form::label('distribution_out', __('models/productStocks.fields.distribution_out').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->distribution_out }}</p>
    </div>
</div>

<!-- Morphing Field -->
<div class="form-group row">
    {!! Form::label('morphing', __('models/productStocks.fields.morphing').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->morphing }}</p>
    </div>
</div>

<!-- Last Stock Field -->
<div class="form-group row">
    {!! Form::label('last_stock', __('models/productStocks.fields.last_stock').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->last_stock }}</p>
    </div>
</div>

<!-- Period Field -->
<div class="form-group row">
    {!! Form::label('period', __('models/productStocks.fields.period').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->period }}</p>
    </div>
</div>

<!-- Additional Info Field -->
<div class="form-group row">
    {!! Form::label('additional_info', __('models/productStocks.fields.additional_info').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $productStock->additional_info }}</p>
    </div>
</div>

