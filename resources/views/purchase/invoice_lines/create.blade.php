
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row mt-3">
                    <div class="col-lg-12">
                        {!! Form::open(['data-submitable' => 0]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang('crud.create')  @lang('models/invoiceLines.singular')</strong>
                            </div>
                            <div class="card-body">
                                @if ($type == 'supplier')
                                   @include('purchase.invoice_lines.list_supplier') 
                                @else
                                   @include('purchase.invoice_lines.list_ekspedisi') 
                                @endif                                
                                   
                            </div>
                            <div class="card-footer">
                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary', 'onclick' => 'generateListItem(this)']) !!}
                                    <button type="button" onclick="bootbox.hideAll()" class="btn btn-default">@lang('crud.cancel')</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
           </div>
    </div>
    <script type="text/javascript">
        function generateListItem(elm){            
            const _form = $(elm).closest('form');
            const _btb = _form.find('input[name^=btb]:checked')                                               
            const _divWrapper = $('.button-caller').closest('div')
            const _formCaller = _divWrapper.closest('form')
            const _invoiceLines = _formCaller.find('.invoice-lines')
            let _invoiceLinesTable = _invoiceLines.find('table')
            if(_btb.length){
                if(!_invoiceLinesTable.length){
                    $(
                        `<table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th>No. CO</th>
                                    <th>No. Dokumen</th>
                                    <th>Nama Produk</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>`                    
                    ).appendTo(_invoiceLines)
                    _invoiceLinesTable = _invoiceLines.find('table')
                }   

                let _tbody = _invoiceLinesTable.find('tbody')
                let _btbItem, _btbItemJson
                _btb.each(function(){
                    _btbItem = $(this).val()
                    _btbItemJson = JSON.parse(_btbItem)
                    _btbItemJson.price = $(this).data('price')
                    _btbItemJson.qty = $(this).data('qty')
                    $(`<tr>
                        <td><input type=hidden name=invoice_line[] data-docid=${_btbItemJson.doc_id} value='${_btbItem}' />${_btbItemJson.co_reference }</td>
                        <td>${_btbItemJson.doc_id }</td>
                        <td>${_btbItemJson.product_name }</td>                        
                        <td>${_btbItemJson.uom_id }</td>
                        <td class="text-right">${_btbItemJson.qty }</td>
                        <td class="text-right">${_btbItemJson.price }</td>
                        <td><i class="btn text-danger fa fa-trash" onclick="removeLine(this)"></i></td>
                    </tr>`).appendTo(_tbody)
                })          
                _invoiceLines.trigger('change')
            }
                
            _form.closest('.bootbox').find('button.bootbox-close-button').click()
            
        }

        function expandRow(elm){
            const _tbody = $(elm).closest('tbody')
            if($(elm).hasClass('fa-plus')){
                _tbody.find('tr.detail_group').fadeIn()
            }else{
                _tbody.find('tr.detail_group').fadeOut()
            }
            $(elm).toggleClass('fa-plus fa-minus')

        }        
    </script>

