     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['data-submitable' => 0]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create @lang('models/vehicleEkspedisis.singular')</strong>
                            </div>
                            <div class="card-body">                                
                                   @include('inventory.vehicle_ekspedisis.fields')                                
                            </div>
                            <div class="card-footer">
                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary', 'onclick' => 'generateCard(this)']) !!}
                                    <button type="button" onclick="$('button.bootbox-close-button').click()" class="btn btn-default">@lang('crud.cancel')</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
           </div>           
    </div>
    <script type="text/javascript">
        function generateCard(elm){
            const _template = `@include('inventory.vehicle_ekspedisis.card')`
            const _form = $(elm).closest('form');
            if(_form.valid()){                                
                const _idForm = '{{ $idForm }}'
                const _divWrapper = $('.button-caller').closest('div').find('.content-info')
                const _json = _form.serializeJSON()['vehicleEkspedisis'][_idForm]
                _divWrapper.append(
                    _template.replace('{vehicleName}', _json['name'])
                            .replace('{vehiclePosition}', _json['position'])
                            .replace('{vehicleMobile}', _json['mobile'])                            
                            .replace('{vehicleForm}', main.generateFormField(`vehicleEkspedisis[${_idForm}]`, _json).join(''))
                )
                _form.closest('.bootbox').find('button.bootbox-close-button').click()
            }
        }        
    </script>
