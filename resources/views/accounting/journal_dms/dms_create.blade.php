<div class="animated fadeIn">
    @include('flash::message')
    @include('coreui-templates::common.errors')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => 'accounting.journalDms.store']) !!}
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus-square-o fa-lg"></i>
                    <strong>@lang('models/journalDms.singular')</strong>
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
                            {!! Form::select('branch_id[]', $branchItems, null, ['class' => 'form-control select2','multiple' => 'multiple',
                            'required' => 'required', 'id' => 'branch_id' ,'data-placeholder' => 'Pilih depo']) !!}
                            <label class="checkbox-inline">                                            
                                {!! Form::checkbox('', '1', null,['onchange' => 'selectAllOption(this,\'#branch_id\')']) !!}
                                pilih semua
                            </label>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        {!! Form::label('type', __('models/journalDms.fields.type').':', ['class' => 'col-md-3
                        col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('type[]', $typeItems, null, ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => 'required', 'id' => 'type', 'data-placeholder' => 'Pilih tipe']) !!}
                            <label class="checkbox-inline">                                            
                                {!! Form::checkbox('', '1', null,['onchange' => 'selectAllOption(this,\'#type\')']) !!}
                                pilih semua
                            </label>
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