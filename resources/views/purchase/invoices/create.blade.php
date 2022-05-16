@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
      <li class="breadcrumb-item">
         <a href="{!! route('purchase.invoices.index') !!}">@lang('models/invoices.singular')</a>
      </li>
      <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>
    @endpush        
     <div class="container-fluid">
        <x-tabs :data="$dataTabs"/>          
    </div>
@endsection
@push('scripts')
<script src="/vendor/js-xlsx/shim.js"></script>
<script src="/vendor/js-xlsx/xlsx.full.min.js"></script>
<script type="text/javascript">
    function updateAmount(elm){
        const _form = $(elm).closest('form')        
        const _table = $(elm).find('table')
        if(_table.length){
            const _items = _table.find('tbody input[name^=invoice_line]')
            let _amount = 0, _item
            if(_items.length){
                _items.each(function(){
                    _item = JSON.parse($(this).val())
                    _amount += parseInt(_item.price * _item.qty)
                })
            }
            _form.find('.amount').val(_amount)
            _form.find('.amount').trigger('change')
        }
    }

    function addListDoc(elm){
            const _form = $(elm).closest('form')
            const _invoiceLines = _form.find('.invoice-lines')
            const _branchId = _form.find('select.branch_id').val()
            let _invoiceLinesTable = _invoiceLines.find('table')
            let _docId = []
            let _json = $(elm).data('json')
            let _period = _form.find('.period').data('daterangepicker')
            let _format = 'YYYY-MM-DD'
            _json.startDate = _period.startDate.format(_format)
            _json.endDate = _period.endDate.format(_format)
            _json.branchId = _branchId
            if(_invoiceLinesTable.length){
                _invoiceLinesTable.find('tbody>tr>td>input[name^=invoice_line]').each(function(){
                    _docId.push($(this).data('docid'))
                })
                                
                _json.listdoc = _docId                                
            }
            $(elm).data('json', _json)
        }

    function updateListBkb(elm){
        let file = elm.files[0];
        const _tableContainer = $(elm).closest('#bkb-itemlist').find('.bkb-lines')
        let reader = new FileReader();        
        _tableContainer.html('please  wait, processing data .....')
        reader.onload = function (e) {
                var data = e.target.result
                var _error = 0, _message = []
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                var dataJson = xls_to_json(workbook)
                let _tmp, _option = [], _table = [
                    `<table class="table table-bordered">`,
                    `<thead>
                        <tr>
                            <th>szDocId</th><th>szProductId</th><th>szProductName</th><th>szBranchId</th><th>branchName</th><th>decQty</th><th>decPrice</th><th>decDiscPrinciple</th><th>decDiscDistributor</th><th>decDiscInternal</th><th></th>
                        </tr>
                    </thead>`,
                    `<tbody>`
                ]                
                for (const _sn in dataJson) {
                    const _x = dataJson[_sn];
                    for (let _baris in _x) {                        
                        _tmp = _x[_baris]
                        _table.push(`
                            <tr>
                                <td>${_tmp['szDocId']}</td><td>${_tmp['szProductId']}</td><td>${_tmp['szProductName']}</td><td>${_tmp['szBranchId']}</td><td>${_tmp['branchName']}</td><td>${_tmp['decQty']}</td><td>${_tmp['decPrice']}</td><td>${_tmp['decDiscPrinciple']}</td><td>${_tmp['decDiscDistributor']}</td><td>${_tmp['decDiscInternal']}</td><td><i class="fa fa-trash" onclick="$(this).closest('tr').remove()"></i></td>
                            </tr>
                        `)
                    }
                }
                _table.push('</tbody>');    
                _table.push('</table>');
                _tableContainer.html(_table.join(''))
                if (_error) {
                    main.alertDialog('Warning', _message.join('\n'))
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

    $(function(){        
        $('select[name=partner_id]').change(function(){        
            const _form = $(this).closest('form')
            _form.find('.invoice-lines').empty()
            _form.find('.btn-add-items').data('json',{type : 'supplier', partner_id : $(this).val()})
        })
        $('select[name=ekspedisi_id]').change(function(){   
            const _form = $(this).closest('form')
            _form.find('.invoice-lines').empty()
            _form.find('.btn-add-items').data('json',{type : 'ekspedisi', partner_id : $(this).val()})
        })
    })
</script>
@endpush
