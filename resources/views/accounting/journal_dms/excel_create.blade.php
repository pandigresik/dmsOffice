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
                    <div class="form-group row">
                        {!! Form::label('branch_id', __('models/journalDms.fields.branch_id').':', ['class' => 'col-md-3
                        col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('branch_id_excel', $branchItems, null, ['class' => 'form-control select2',
                            'required' => 'required', 'data-placeholder' => 'Pilih depo']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('branch_id', __('models/journalDms.fields.file').':', ['class' => 'col-md-3 col-form-label']) !!}
                        <div class="col-md-3">        
                            <input class="form-control-file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="" type="file">
                            <a href="/vendor/js-xlsx/template-journal-excel.xlsx">Template Excel</a>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive bkb-lines">

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