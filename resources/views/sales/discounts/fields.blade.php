<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('type', __('models/discounts.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('type',$typeOptionItems, null, ['class' => 'form-control', 'required' => 'required', 'onchange' => 'resetEntri(this)'])
        !!}
    </div>
</div>

<!-- Jenis Field -->
<div class="form-group row">
    {!! Form::label('jenis', __('models/discounts.fields.jenis').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('jenis',$jenisOptionItems, null, ['class' => 'form-control select2', 'required' => 'required',
        'onchange' => 'setProductGroup(this)'])
        !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/discounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' =>
        'required']) !!}
    </div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('period', __('models/discounts.fields.period').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('period', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate'
        => json_encode( ['singleDatePicker' => false, 'locale' => ['format' => config('local.date_format_javascript')
        ]]),'id'=>'period']) !!}
    </div>
</div>

<!-- Split Field -->
<div class="form-group row">
    {!! Form::label('split', __('models/discounts.fields.split').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::number('split', null, ['class' => 'form-control inputmask', 'data-unmask' =>
        1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
    </div>
</div>

<!-- member discount_member -->
<div class="form-group row">
    {!! Form::label('discount_members.tipe', __('models/discounts.fields.discount_members_tipe').':', ['class' =>
    'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('discount_members[tipe]', $tipeSegmentCustomerItems, null, ['class' => 'form-control select2',
        'required' => 'required', 'data-placeholder' => 'Pilih tipe segment', 'onchange' => 'setOptionSegment(this)'])
        !!}
    </div>
</div>

<!-- member discount_member -->
<div class="form-group row">
    {!! Form::label('discount_members.member_id', __('models/discounts.fields.discount_members_customer_segment').':',
    ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('discount_members[member_id][]', $segmentCustomerItems, null, ['class' => 'form-control select2
        customer_segment', 'multiple' => 'multiple', 'required' => 'required', 'data-placeholder' => 'Pilih segment'])
        !!}
    </div>
</div>

<!-- Bundling Dms Inv Product Id Field -->
<div class="form-group row">
    {!! Form::label('discount_members.member_id', __('models/discounts.fields.discount_members_customer').':',
    ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('discount_members[member_id][]', $customerItems, null, array_merge(['id' => 'discount_members_customer','class' => 'form-control
        select2
        customer','multiple' => 'multiple', 'required' => 'required', 'data-url' => route('selectAjax'), 'data-ajax'
        => 1, 'data-repository' => 'Base\\DmsArCustomerRepository'], config('local.select2.ajax')) ) !!}
    </div>
    <div class="col-md-3 offset-3">        
        {!! Form::file('',['class' => 'form-control-file', 'onchange' => 'updateCustomer(this)','accept' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel']) !!}
        <a href="/vendor/js-xlsx/template-customer.xlsx">Template customer</a>
    </div>
</div>

<div class="product-group">
    <!-- Main Dms Inv Product Id Field -->
    <div class="form-group row">
        {!! Form::label('main_dms_inv_product_id', __('models/discounts.fields.main_dms_inv_product_id').':', ['class'
        => 'col-md-3 col-form-label']) !!}
        <div class="col-md-9">
            {!! Form::select('main_dms_inv_product_id', $mainProductItems, null, array_merge(['class' => 'form-control select2', 'multiple' => 'multiple',
            'required' => 'required', 'data-url' => route('selectAjax'), 'data-ajax' => 1, 'data-repository' =>
            'Inventory\\DmsInvProductRepository'], config('local.select2.ajax')) ) !!}
        </div>
    </div>

    <!-- Main Quota Field -->
    <div class="form-group row">
        {!! Form::label('main_quota', __('models/discounts.fields.main_quota').':', ['class' => 'col-md-3
        col-form-label']) !!}
        <div class="col-md-9">
            {!! Form::number('main_quota', null, ['class' => 'form-control inputmask', 'required' => 'required',
            'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
        </div>
    </div>

    <!-- Conversion Main Product Field -->
    <div class="form-group row">
        {!! Form::label('conversion_main_dms_inv_product_id', __('models/discounts.fields.conversion_main_dms_inv_product_id').':', ['class' => 'col-md-3
        col-form-label']) !!}
        <div class="col-md-9">
            {!! Form::number('conversion_main_dms_inv_product_id', $discounts->conversion_main_dms_inv_product_id ?? null, ['class' => 'form-control inputmask', 'required' => 'required',
            'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
        </div>
    </div>

    <div class="product-bundling">
    <!-- Bundling Dms Inv Product Id Field -->
    <div class="form-group row">
        {!! Form::label('bundling_dms_inv_product_id', __('models/discounts.fields.bundling_dms_inv_product_id').':',
        ['class' => 'col-md-3 col-form-label']) !!}
        <div class="col-md-9">
            {!! Form::select('bundling_dms_inv_product_id', $bundlingProductItems, null, array_merge(['class' =>
            'form-control select2', 'multiple' => 'multiple',
            'data-url' => route('selectAjax'), 'data-ajax' => 1, 'data-repository' =>
            'Inventory\\DmsInvProductRepository'], config('local.select2.ajax')) ) !!}
        </div>
    </div>

    <!-- Bundling Quota Field -->
    <div class="form-group row">
        {!! Form::label('bundling_quota', __('models/discounts.fields.bundling_quota').':', ['class' => 'col-md-3
        col-form-label']) !!}
        <div class="col-md-9">
            {!! Form::number('bundling_quota', null, ['class' => 'form-control inputmask',
            'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
        </div>
    </div>

    <!-- Conversion Budndling Product Field -->
    <div class="form-group row">
        {!! Form::label('conversion_bundling_dms_inv_product_id', __('models/discounts.fields.conversion_bundling_dms_inv_product_id').':', ['class' => 'col-md-3
        col-form-label']) !!}
        <div class="col-md-9">
            {!! Form::number('conversion_bundling_dms_inv_product_id', $discounts->conversion_bundling_dms_inv_product_id ?? null, ['class' => 'form-control inputmask', 'required' => 'required',
            'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
        </div>
    </div>
    </div>

    <!-- Max Quota Field -->
    <div class="form-group row">
        {!! Form::label('max_quota', __('models/discounts.fields.max_quota').':', ['class' => 'col-md-3
        col-form-label']) !!}
        <div class="col-md-9">
            {!! Form::number('max_quota', null, ['class' => 'form-control inputmask', 'required' => 'required',
            'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-md-9 offset-md-3">
            <button type="button" class="btn btn-primary" onclick="addItemList(this)"><i class="fa fa-plus"></i>
                Item</button>
            <button type="button" class="btn btn-danger" onclick="removeItemList(this)"><i class="fa fa-minus"></i>
                Item</button>
        </div>
    </div>
</div>
<div class="product-group-kontrak">
    <div class="form-group row">
        <div class="col-md-3 offset-md-3">
            {!! Form::select('', [], null, array_merge(['class' => 'form-control select2', 'data-placeholder' => 'Pilih
            produk',
            'data-url' => route('selectAjax'), 'data-ajax' => 1, 'data-repository' =>
            'Inventory\\DmsInvProductRepository'], config('local.select2.ajax')) ) !!}
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" onclick="addItemListKontrak(this)"><i class="fa fa-plus"></i>
                Item</button>
            <button type="button" class="btn btn-danger" onclick="removeItemList(this)"><i class="fa fa-minus"></i>
                Item</button>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <div id="detail_discount">
            @isset($detailItems)
            @if ($discounts->jenis == 'kontrak')
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Potongan {{ $discounts->type == 'internal' ? 'Internal' : 'TIV' }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailItems as $item)
                    <tr>
                        <td><input type="hidden" name="discount_details[main_dms_inv_product_id][]"
                                value="{{ $item->main_dms_inv_product_id }}">{{ $item->mainProduct->szName }}
                        </td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->principle_amount }}" name="discount_details[principle_amount][]"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            @if (empty($discounts->bundling_dms_inv_product_id))
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th colspan=3>Produk Utama</th>
                        <th colspan=2>Potongan</th>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>Qty Min</th>
                        <th>Qty Maks</th>
                        <th>{{ $discounts->type == 'internal' ? 'Internal' : 'TIV' }}</th>
                        <th>Distributor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailItems as $item)
                    <tr>
                        <td><input type="hidden" name="discount_details[main_dms_inv_product_id][]"
                                value="{{ $item->main_dms_inv_product_id }}">{!! '<span class="badge badge-primary">'.implode('</span><span class="badge badge-primary ml-2">',$mainProductItems->toArray()).'</span>' !!}</td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->min_main_qty }}" name="discount_details[min_main_qty][]"></td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->max_main_qty }}" name="discount_details[max_main_qty][]"></td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->principle_amount }}" name="discount_details[principle_amount][]"></td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->distributor_amount }}" name="discount_details[distributor_amount][]">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th colspan=3>Produk Utama</th>
                        <th colspan=3>Produk Bundling</th>
                        <th colspan=3>Potongan</th>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>Qty Min</th>
                        <th>Qty Maks</th>
                        <th>Nama</th>
                        <th>Qty Min</th>
                        <th>Qty Maks</th>
                        <th>TIV</th>
                        <th>Distributor</th>
                        <th>Paket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailItems as $item)
                    <tr>
                        <td><input type="hidden" name="discount_details[main_dms_inv_product_id][]"
                                value="{{ $item->main_dms_inv_product_id }}">{!! '<span class="badge badge-primary">'.implode('</span><span class="badge badge-primary ml-2">',$mainProductItems->toArray()).'</span>' !!}</td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->min_main_qty }}" name="discount_details[min_main_qty][]"></td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->max_main_qty }}" name="discount_details[max_main_qty][]"></td>
                        <td><input type="hidden" name="discount_details[bundling_dms_inv_product_id][]"
                                value="{{ $item->bundling_dms_inv_product_id }}">{!! '<span class="badge badge-primary">'.implode('</span><span class="badge badge-primary ml-2">',$bundlingProductItems->toArray()).'</span>' !!}
                        </td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->min_bundling_qty }}" name="discount_details[min_bundling_qty][]"></td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->max_bundling_qty }}" name="discount_details[max_bundling_qty][]"></td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->principle_amount }}" name="discount_details[principle_amount][]"></td>
                        <td><input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->distributor_amount }}" name="discount_details[distributor_amount][]">
                        </td>
                        <td>
                            @if (!empty($item->package))
                                <input type="text" class="form-control inputmask" data-unmask=1
                                data-optionmask='{{ json_encode(config('local.number.integer')) }}'
                                value="{{ $item->package }}" name="discount_details[package][]">
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @endif
            @endisset
        </div>
    </div>
</div>
@push('scripts')
<script src="/vendor/js-xlsx/shim.js"></script>
<script src="/vendor/js-xlsx/xlsx.full.min.js"></script>
<script type="text/javascript">
    let _previousType
    const _labelHeader = { 'principle' : 'TIV', 'internal' : 'Internal' }
    $(function () {
        $('select[name="discount_members[tipe]"]').trigger('change')
        $('select[name=jenis]').trigger('change')
        let _defaultMainProduct = [], _defaultBundlingProduct = []
        $('select[name=main_dms_inv_product_id]').find('option').each(function(){
            _defaultMainProduct.push($(this).val())
        })
        $('select[name=main_dms_inv_product_id]').val(_defaultMainProduct).change()
        
        $('select[name=bundling_dms_inv_product_id]').find('option').each(function(){
            _defaultBundlingProduct.push($(this).val())
        })
        $('select[name=bundling_dms_inv_product_id]').val(_defaultBundlingProduct).change()
    })

    function setOptionSegment(elm) {
        const _form = $(elm).closest('form')
        const _val = $(elm).val()
        _form.find('select[name^="discount_members[member_id]"]').prop('disabled', 1)
        _form.find('select[name^="discount_members[member_id]"]').closest('div.form-group').hide()

        _form.find('select.' + _val + '[name ^= "discount_members[member_id]"]').prop('disabled', 0)
        _form.find('select.' + _val + '[name ^= "discount_members[member_id]"]').closest('div.form-group').show()

    }

    function addItemListKontrak(elm) {
        const _form = $(elm).closest('form')
        const _type = _form.find('select[name=type]').val()
        const _form_group = $(elm).closest('.form-group')
        const _detailDiscount = _form.find('#detail_discount')
        let _table = _detailDiscount.find('table')
        const _optionMaskInteger = JSON.stringify({
            "alias": "numeric",
            "digits": 0,
            "groupSeparator": ".",
            "radixPoint": ",",
            "autoGroup": true
        })
        const _mainProductElm = _form_group.find('select')
        const _mainProduct = _mainProductElm.val()
        if (_.isEmpty(_mainProduct)) {
            main.alertDialog('Warning', 'Pilih produknya dahulu')
            return
        }
        _mainProductName = _mainProductElm.find('option:selected').text()
        if (!_table.length) {
            let _tableTmp = `<table class="table table-bordered text-center">
                <thead>                    
                    <tr>
                        <th>Nama</th>                       
                        <th>Potongan ${_labelHeader[_type]}</th>                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>`

            $(_tableTmp).appendTo(_detailDiscount)
            _table = _detailDiscount.find('table')
        }
        if (_table.find('input[name="discount_details[main_dms_inv_product_id][]"][value=' + _mainProduct + ']')
            .length) {
            main.alertDialog('Warning', 'Produk sudah dipilih sebelumnya')
            return

        }
        const _item = `
            <tr>
                <td><input type="hidden" name="discount_details[main_dms_inv_product_id][]" value="${_mainProduct}">${_mainProductName}</td>
                <td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}'  name="discount_details[principle_amount][]"></td>                
            </tr>
        `
        $(_item).appendTo(_detailDiscount.find('tbody'))
        main.initInputmask(_detailDiscount.find('tbody>tr:last'))
    }

    function removeItemList(elm) {
        const _form = $(elm).closest('form')
        const _detailDiscount = _form.find('#detail_discount')
        let _table = _detailDiscount.find('table')
        if (_table.length) {
            _table.find('tbody>tr:last').remove()
        }
    }

    function addItemList(elm) {
        const _form = $(elm).closest('form')
        const _jenis = _form.find('select[name=jenis]').val()
        const _type = _form.find('select[name=type]').val()
        const _hasPackage = _.includes(['bundling', 'extension'], _jenis) ? 1 : 0
        const _detailDiscount = _form.find('#detail_discount')
        let _table = _detailDiscount.find('table')
        const _mainProductElm = _form.find('select[name="main_dms_inv_product_id"]')
        const _mainProduct = _mainProductElm.val()
        const _bundlingProductElm = _form.find('select[name="bundling_dms_inv_product_id"]')
        const _bundlingProduct = _bundlingProductElm.val()
        const _optionMaskInteger = JSON.stringify({
            "alias": "numeric",
            "digits": 0,
            "groupSeparator": ".",
            "radixPoint": ",",
            "autoGroup": true
        })
        let _adaProductBundling = 0,
            _mainProductName = [],
            _bundlingProductName = [],
            _bundlingItemRow = '',
            _packageItemRow = ''
        if (_.isEmpty(_mainProduct)) {
            main.alertDialog('Warning', 'Produk utama belum dipilih')
            return
        }
        _mainProductElm.find('option:selected').each(function(){
            _mainProductName.push($(this).text())
        })
        if (!_.isEmpty(_bundlingProduct)) {
            _adaProductBundling = 1
        }
        if (!_table.length) {
            let _additionalHeader = ''
            let _additionalHeaderItem = ''
            let _packageHeader = _hasPackage ? '<th>Paket</th>' : ''
            let _colspanPotongan = _hasPackage ? 2 : 3
            if (_adaProductBundling) {
                _additionalHeader = '<th colspan=3>Produk Pelengkap</th>'
                _additionalHeaderItem = `<th>Nama</th>
                                        <th>Qty Min</th>
                                        <th>Qty Maks</th>`
            }
            let _tableTmp = `<table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th colspan=3>Produk Utama</th>
                        ${_additionalHeader}
                        <th colspan='${_colspanPotongan}'>Potongan</th>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>Qty Min</th>
                        <th>Qty Maks</th>
                        ${_additionalHeaderItem}
                        <th>${_labelHeader[_type]}</th>
                        <th>Distributor</th>
                        ${_packageHeader}
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>`

            $(_tableTmp).appendTo(_detailDiscount)
            _table = _detailDiscount.find('table')
        }

        if (_adaProductBundling) {
            _bundlingProductElm.find('option:selected').each(function(){
                _bundlingProductName.push($(this).text())
            })
            _bundlingItemRow =
                `<td><input type="hidden" name="discount_details[bundling_dms_inv_product_id][]" value="${_bundlingProduct}"><span class="badge badge-primary">${_bundlingProductName.join('</span><span class="badge badge-primary ml-2">')}</span></td>
                                <td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}' name="discount_details[min_bundling_qty][]"></td>
                                <td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}'  name="discount_details[max_bundling_qty][]"></td>`
            if(_hasPackage){
                _packageItemRow = `<td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}' name="discount_details[package][]"></td>`
            }
        }else{
            if(_hasPackage){
                _packageItemRow = `<td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}' name="discount_details[package][]"></td>`
            }
        }
        const _item = `
            <tr>
                <td><input type="hidden" name="discount_details[main_dms_inv_product_id][]" value="${_mainProduct}"><span class="badge badge-primary">${_mainProductName.join('</span><span class="badge badge-primary ml-2">')}</span></td>
                <td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}'  name="discount_details[min_main_qty][]"></td>
                <td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}'  name="discount_details[max_main_qty][]"></td>
                ${_bundlingItemRow}
                <td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}'  name="discount_details[principle_amount][]"></td>
                <td><input type="text" class="form-control inputmask" data-unmask=1 data-optionmask='${_optionMaskInteger}' value="0"  name="discount_details[distributor_amount][]"></td>
                ${_packageItemRow}
            </tr>
        `
        $(_item).appendTo(_detailDiscount.find('tbody'))
        main.initInputmask(_detailDiscount.find('tbody>tr:last'))
    }

    function resetEntri(elm){
        const _form = $(elm).closest('form')
        _form.find('#detail_discount').empty()
    }

    function setProductGroup(elm) {
        const _form = $(elm).closest('form')
        const _val = $(elm).val()
        const _hasBundling = _.includes(['combine','bundling'],_val) ? 1 : 0
        if (_previousType !== undefined) {
            _form.find('#detail_discount').empty()
        }

        _form.find('input[name=split]').closest('.form-group').hide()
        _form.find('input[name=split]').prop('required', 0)
        _form.find('div.product-bundling').hide()
        switch (_val) {
            case 'kontrak':
                _form.find('div.product-group').hide()
                _form.find('div.product-group').find('input,select,textarea').prop('disabled', 1)
                _form.find('div.product-group-kontrak').show()
                break;
            case 'combine':
                _form.find('input[name=split]').prop('required', 1)
                _form.find('input[name=split]').closest('.form-group').show()
            default:
                _form.find('div.product-group').show()
                _form.find('div.product-group').find('input,select,textarea').prop('disabled', 0)
                _form.find('div.product-group-kontrak').hide()
                if(_hasBundling) _form.find('div.product-bundling').show()
        }
        _previousType = _val
    }

    function updateCustomer(elm){
        let file = elm.files[0];
        let reader = new FileReader();
        const customerDropdown = $('#discount_members_customer')
        reader.onload = function (e) {
                var data = e.target.result
                var _error = 0, _message = []
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                var dataJson = xls_to_json(workbook)
                let _tmp, _option = []
                for (const _sn in dataJson) {
                    const _x = dataJson[_sn];
                    for (let _baris in _x) {
                        _tmp = _x[_baris];
                        if(_tmp['szId'] == undefined){                            
                            _error++
                            _message.push('kolom szId tidak ditemukan')
                        }
                        if(_tmp['szName'] == undefined){
                            _error++
                            _message.push('kolom szName tidak ditemukan')
                        }

                        if(_error){
                            break;
                            return false
                        }
                        _option.push(`<option selected value='${_tmp['szId']}'>${_tmp['szName']}</option>`)                     
                    }
                }
                
                if (_error) {
                    main.alertDialog('Warning', _message.join('\n'))
                }

                if (!_error) {
                    customerDropdown.find('option').remove()
                    $(_option.join('')).appendTo(customerDropdown) 
                    customerDropdown.trigger('change')
                }

            };

            reader.readAsBinaryString(file)
    }

    function xls_to_json(workbook) {
        var result = {};
        workbook.SheetNames.forEach(function (sheetName) {
            var roa = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName]);
            if (roa.length > 0) {
                result[sheetName] = roa;
            }
        });
        return result;
    }
</script>
@endpush