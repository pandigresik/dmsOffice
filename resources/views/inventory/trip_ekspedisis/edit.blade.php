     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($tripEkspedisi,['data-submitable' => 0]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create @lang('models/tripEkspedisis.singular')</strong>
                            </div>
                            <div class="card-body">                                
                                   @include('inventory.trip_ekspedisis.fields')                                
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
            const _template = `@include('inventory.trip_ekspedisis.card')`
            const _form = $(elm).closest('form');
            if(_form.valid()){                                
                const _idForm = '{{ $idForm }}'
                const _divWrapper = $('.button-caller').closest('div').find('.content-info')
                const _json = _form.serializeJSON()['tripEkspedisis'][_idForm]
                let _optionSelected
                _json['trip'].forEach(element => {
                    _optionSelected = _form.find('option[value='+element+']').text().split(' | ')
                    _divWrapper.append(
                    _template.replace('{tripCode}', _optionSelected[0])
                            .replace('{tripName}', _optionSelected[1])
                            .replace('{tripPrice}', _optionSelected[2])
                            .replace('{tripDistance}', _optionSelected[3])
                            .replace('{tripProductCategories}', _optionSelected[4])
                            .replace('{tripForm}', main.generateFormField(`tripEkspedisis[${_idForm++}]`, {'trip_id' : element, 'stateForm' : _json['stateForm']}).join(''))
                )
                });
                _form.closest('.bootbox').find('button.bootbox-close-button').click()
            }
        }        
    </script>
