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
                let _idForm = '{{ $idForm }}'
                const _divWrapper = $('.button-caller').closest('div').find('.content-info')
                const _json = _form.serializeJSON()['vehicleEkspedisis'][_idForm]
                let _optionSelected
                _json['vehicle'].forEach(element => {
                    _optionSelected = _form.find('option[value='+element+']').text().split(' | ')
                    _divWrapper.append(
                    _template.replace('{vehicleId}', _optionSelected[0])
                            .replace('{vehiclePoliceNo}', _optionSelected[1])
                            .replace('{vehicleForm}', main.generateFormField(`vehicleEkspedisis[${_idForm++}]`, {'dms_inv_vehicle_id' : element, 'stateForm' : _json['stateForm']}).join(''))
                )
                });
                
                _form.closest('.bootbox').find('button.bootbox-close-button').click()
            }
        }        
    </script>
