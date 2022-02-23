<div class="row">
    <div class="col-md-6">
        <!-- Number Field -->
        <div class="form-group row">
            {!! Form::label('number', __('models/shippingCostManuals.fields.number').':', ['class' => 'col-md-3
            col-form-label']) !!}
            <div class="col-md-9">
                {!! Form::text('number', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20,
                'readonly' => 'readonly']) !!}
            </div>
        </div>

        <!-- Carrier Id Field -->
        <div class="form-group row">
            {!! Form::label('carrier_id', __('models/shippingCostManuals.fields.carrier_id').':', ['class' => 'col-md-3
            col-form-label']) !!}
            <div class="col-md-9">
                {!! Form::select('carrier_id', $carrierItems, null, ['class' => 'form-control select2', 'required' =>
                'required']) !!}
            </div>
        </div>


        <!-- Origin Branch Id Field -->
        <div class="form-group row">
            {!! Form::label('origin_branch_id', __('models/shippingCostManuals.fields.origin_branch_id').':', ['class'
            => 'col-md-3 col-form-label']) !!}
            <div class="col-md-9">
                {!! Form::select('origin_branch_id', $originBranchItems, null, ['class' => 'form-control select2',
                'required' => 'required']) !!}
            </div>
        </div>


        <!-- Do References Field -->
        <div class="form-group row">
            {!! Form::label('do_references', __('models/shippingCostManuals.fields.do_references').':', ['class' =>
            'col-md-3 col-form-label']) !!}
            <div class="col-md-9">
                {!! Form::text('do_references', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20,
                'required' => 'required']) !!}
            </div>
        </div>

        <!-- Amount Field -->
        <div class="form-group row">
            {!! Form::label('amount', __('models/shippingCostManuals.fields.amount').':', ['class' => 'col-md-3
            col-form-label']) !!}
            <div class="col-md-9">
                {!! Form::number('amount', null, ['class' => 'form-control inputmask', 'required' => 'required',
                'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))] ) !!}
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <!-- Date Field -->
        <div class="form-group row">
            {!! Form::label('date', __('models/shippingCostManuals.fields.date').':', ['class' => 'col-md-3
            col-form-label']) !!}
            <div class="col-md-9">
                {!! Form::text('date', null, ['class' => 'form-control datetime', 'required' => 'required'
                ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript')
                ]]),'id'=>'date']) !!}
            </div>
        </div>

        <!-- Date Field -->
        <div class="form-group row">
            &nbsp;
        </div>

        <!-- Destination Branch Id Field -->
        <div class="form-group row">
            {!! Form::label('destination_branch_id', __('models/shippingCostManuals.fields.destination_branch_id').':',
            ['class' => 'col-md-3 col-form-label']) !!}
            <div class="col-md-9">
                {!! Form::select('destination_branch_id', $destinationBranchItems, null, ['class' => 'form-control
                select2', 'required' => 'required']) !!}
            </div>
        </div>

        <!-- Sj References Field -->
        <div class="form-group row">
            {!! Form::label('sj_references', __('models/shippingCostManuals.fields.sj_references').':', ['class' =>
            'col-md-3 col-form-label']) !!}
            <div class="col-md-9">
                {!! Form::text('sj_references', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20,
                'required' => 'required']) !!}
            </div>
        </div>
    </div>
</div>
<hr>
<div class="product-detail" id="product-detail">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $item)            
                <tr>
                    <td><input type="hidden" name="details[{{ $item->product_id }}][product_id]" value="{{ $item->product_id }}">{{ $item->product_id }}</td>
                    <td>{{ $item->product->szName }}</td>
                    <td>{!! Form::number('details[{{ $item->product_id }}][quantity]', intval($item->quantity), ['class' => 'form-control inputmask', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))] ) !!}</td>
                    <td><button type="button" class="btn btn-primary" onclick="removeItemList(this)"><i class="fa fa-minus"></i></td>                
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <td></td>
            <td>
                {!! Form::select('', [], null, array_merge(['class' => 'form-control select2', 'data-placeholder' =>
                'Pilih
                produk',
                'data-url' => route('selectAjax'), 'data-ajax' => 1, 'data-repository' =>
                'Inventory\\DmsInvProductRepository'], config('local.select2.ajax')) ) !!}
            </td>
            <td>
            {!! Form::number('quantity', null, ['class' => 'form-control inputmask', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))] ) !!}
            </td>
            <td>
                <button type="button" class="btn btn-primary" onclick="addItemList(this)"><i class="fa fa-plus"></i>
            </td>
        </tfoot>
    </table>
</div>

@push('scripts')
<script type="text/javascript">
    const _optionMaskInteger = JSON.stringify({
            "alias": "numeric",
            "digits": 0,
            "groupSeparator": ".",
            "radixPoint": ",",
            "autoGroup": true
        })
    function addItemList(elm) {        
        const _table = $(elm).closest('table')
        const _dropdown = $(elm).closest('tr').find('select')
        const _optionMaskInteger = JSON.stringify({
            "alias": "numeric",
            "digits": 0,
            "groupSeparator": ".",
            "radixPoint": ",",
            "autoGroup": true
        })
                
        const _productName = _dropdown.find('option:selected').text()
        const _product = _dropdown.val()
        const _quantity = $(elm).closest('tr').find('input[name=quantity]').val()

        if(_.isEmpty(_product)) return
        // if (_table.find('input[name="discount_details[main_dms_inv_product_id][]"][value=' + _mainProduct + ']')
        //     .length) {
        //     main.alertDialog('Warning', 'Produk sudah dipilih sebelumnya')
        //     return

        // }
        const _item = `
            <tr>
                <td><input type="hidden" name="details[${_product}][product_id]" value="${_product}">${_product}</td>
                <td>${_productName}</td>
                <td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}' value="${_quantity}" name="details[${_product}][quantity]"></td>
                <td><button type="button" class="btn btn-primary" onclick="removeItemList(this)"><i class="fa fa-minus"></i></td>
            </tr>
        `
        $(_item).appendTo(_table.find('tbody'))
        main.initInputmask(_table.find('tbody>tr:last'))
    }

    function removeItemList(elm) {
        $(elm).closest('tr').remove()
    }    
</script>
@endpush