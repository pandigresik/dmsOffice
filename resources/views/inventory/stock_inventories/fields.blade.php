<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/stockInventories.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
    </div>
</div>

<!-- Warehouse Id Field -->
<div class="form-group row">
    {!! Form::label('warehouse_id', __('models/stockInventories.fields.warehouse_id').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('warehouse_id', $warehouseItems, null, ['class' => 'form-control select2','data-url'=>  route('inventory.stockInventories.stockWarehouse'), 'data-target' => '#form_table_detail','onchange' => 'main.loadDetailPage(this,\'get\', function(){main.initInputmask($(\'#form_table_detail\'))})']) !!}
    </div>
</div>

<div class="row">
    <div id="form_table_detail" class="col-lg"></div>
</div>
