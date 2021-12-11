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
            let _invoiceLinesTable = _invoiceLines.find('table')
            let _docId = []
            let _json = $(elm).data('json')
            let _period = _form.find('.period').data('daterangepicker')
            let _format = 'YYYY-MM-DD'
            _json.startDate = _period.startDate.format(_format)
            _json.endDate = _period.endDate.format(_format)
            if(_invoiceLinesTable.length){
                _invoiceLinesTable.find('tbody>tr>td>input[name^=invoice_line]').each(function(){
                    _docId.push($(this).data('docid'))
                })
                                
                _json.listdoc = _docId                                
            }
            $(elm).data('json', _json)
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
