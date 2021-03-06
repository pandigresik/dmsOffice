     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['data-submitable' => 0]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang('crud.create')  @lang('models/tripEkspedisis.singular')</strong>
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
                let _idForm = '{{ $idForm }}'
                const _divWrapper = $('.button-caller').closest('div').find('.content-info')
                const _json = _form.serializeJSON()['tripEkspedisis'][_idForm]
                
                const _price = _form.find('input[name=price').val()
                const _originAdditionalPrice = _form.find('input[name=origin_additional_price').val()
                const _destinationAdditionalPrice = _form.find('input[name=destination_additional_price').val()
                const _startDate = _form.find('input[name=start_date').val()                


                const _unmaskedPrice = _form.find('input[name=price').inputmask('unmaskedvalue').replace(',', '.')
                const _unmaskedOriginPrice = _form.find('input[name=origin_additional_price').inputmask('unmaskedvalue').replace(',', '.')
                const _unmaskedDestinationPrice = _form.find('input[name=destination_additional_price').inputmask('unmaskedvalue').replace(',', '.')
                const _startDateOri = main.getValueDateSQL(_form.find('input[name=start_date'))
                let _optionSelected
                //_json['trip'].forEach(element => {
                    _optionSelected = _form.find('option:selected').text().split(' | ')
                    _divWrapper.append(
                    _template.replace('{tripCode}', _optionSelected[0].split('::')[1])
                            .replace('{tripName}', _optionSelected[1].split('::')[1])
                            .replace('{tripPrice}', _price)
                            .replace('{tripStartDate}', _startDate)
                            .replace('{tripOriginPrice}', _originAdditionalPrice)
                            .replace('{tripAdditionalPrice}', _destinationAdditionalPrice)
                            .replace('{tripDistance}', _optionSelected[2].split('::')[1])
                            .replace('{tripQuantity}', _optionSelected[3].split('::')[1])
                            .replace('{tripProductCategories}', _optionSelected[4].split('::')[1])
                            .replace('{tripForm}', main.generateFormField(`tripEkspedisis[${_idForm++}]`
                                , {
                                    'trip_id': _json['trip_id'], 
                                    'stateForm': _json['stateForm'],
                                    'price': _unmaskedPrice,
                                    'origin_additional_price':  _unmaskedOriginPrice,
                                    'destination_additional_price': _unmaskedDestinationPrice,
                                    'start_date': _startDateOri
                                }
                            ).join(''))
                )
                //});
                
                _form.closest('.bootbox').find('button.bootbox-close-button').click()
            }
        }        
    </script>    