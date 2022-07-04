<div class="animated fadeIn">
    @include('flash::message')
    @include('coreui-templates::common.errors')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => 'accounting.journalDms.store']) !!}
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus-square-o fa-lg"></i>
                    <strong>Upload Excel</strong>
                </div>
                <div class="card-body">
                    <!-- Range Period Field -->
                    <div class="form-group row">
                        {!! Form::label('period_range', __('models/journalDms.fields.period_range').':', ['class' =>
                        'col-md-3 col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('period_range', null, ['class' => 'form-control datetime', 'data-optiondate'
                            => json_encode( ['singleDatePicker' => false, 'locale' => ['format' =>
                            config('local.date_format_javascript') ]]),'id'=>'period_range']) !!}
                        </div>
                    </div>                                        
                    <div class="form-group row">
                        {!! Form::label('branch_id', __('models/journalDms.fields.branch_id').':', ['class' => 'col-md-3
                        col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('branch_id_excel', $branchItems, null, ['class' => 'form-control select2',
                            'required' => 'required', 'data-placeholder' => 'Pilih depo']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('type', __('models/journalDms.fields.type').':', ['class' => 'col-md-3
                        col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('type', $typeUploadItems, null, ['class' => 'form-control select2', 'required' =>
                            'required', 'data-placeholder' => 'Pilih tipe']) !!}
                        </div>
                    </div>
                    <div class="form-group row" id="journal-itemlist">
                        {!! Form::label('branch_id', __('models/journalDms.fields.file').':', ['class' => 'col-md-3 col-form-label']) !!}
                        <div class="col-md-3">        
                            <input class="form-control-file" onchange="showListJournal(this)" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="" type="file">
                            <a href="/vendor/js-xlsx/template-journal-excel.xlsx">Template Excel</a>
                        </div>                        
                        <div class="row container" style="margin-top:30px">                            
                            <div class="col-md-12 table-responsive journal-lines">

                            </div>
                        </div>
                    </div>
                                        
                </div>
                <div class="card-footer">
                    <!-- Submit Field -->
                    <div class="form-group col-md-9 offset-3">
                        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@push('scripts')
<script src="/vendor/js-xlsx/shim.js"></script>
<script src="/vendor/js-xlsx/xlsx.full.min.js"></script>
<script type="text/javascript">    
    function showListJournal(elm){
        let file = elm.files[0];
        const _tableContainer = $(elm).closest('#journal-itemlist').find('.journal-lines')
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
                            <th>No.</th><th>AKUN DEBET (L/R)</th><th>AKUN KREDIT (NRC)</th><th>KODE DEPO</th><th>REFERENSI</th><th>DESKRIPSI</th><th>TANGGAL</th><th>JUMLAH</th>
                        </tr>
                    </thead>`,
                    `<tbody>`
                ]                
                for (const _sn in dataJson) {                    
                    const _x = dataJson[_sn];
                    let _btbVal
                    for (let _baris in _x) {                        
                        _tmp = _x[_baris]
                        _tmp['JUMLAH'] = parseInt($.trim(_tmp['JUMLAH']).replaceAll(',',''))
                        _table.push(`
                            <tr>
                                <td>${_tmp['NO'] ?? ''}</td>
                                <td><input type="hidden" name="journal_line[]" value='${JSON.stringify(_tmp)}'>${_tmp['AKUN DEBET (L/R)']}</td>
                                <td>${_tmp['AKUN KREDIT (NRC)'] ?? ''}</td> 
                                <td>${_tmp['KODE DEPO'] ?? ''}</td>
                                <td>${_tmp['REFERENSI'] ?? ''}</td>
                                <td>${_tmp['DESKRIPSI'] ?? ''}</td>                                
                                <td>${_tmp['TANGGAL'] ?? ''}</td>
                                <td class="text-right">${Inputmask.format(_tmp['JUMLAH'] ?? 0,{alias:'numeric', 'digits': 0, 'autoGroup': true, 'groupSeparator': '.', 'radixPoint' : ','})}</td>                                
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
            var roa = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {raw: false});
            if (roa.length > 0) {
                result[sheetName] = roa;
            }
        });        
        return result;
    }
</script>
@endpush