     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($tripEkspedisiPrice,['data-submitable' => 0]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang('crud.edit') Tarif  @lang('models/tripEkspedisis.singular')</strong>
                            </div>
                            <div class="card-body">                                
                                   @include('inventory.trip_ekspedisis.price_fields')                                
                            </div>
                            <div class="card-footer">
                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary', 'onclick' => 'updatePriceCard(this)']) !!}
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
        function updatePriceCard(elm){            
            const _form = $(elm).closest('form');
            if(_form.valid()){                                
                let _idForm = '{{ $idForm }}'
                const _divWrapper = $('.button-caller').closest('div.card-content').find('.block-price')                
                const _formHidden = _divWrapper.closest('.card-body').find('.form-hidden')
                const _price = _form.find('input[name=price').val()
                const _originAdditionalPrice = _form.find('input[name=origin_additional_price').val()
                const _destinationAdditionalPrice = _form.find('input[name=destination_additional_price').val()
                const _startDate = _form.find('input[name=start_date').val()                

                const _unmaskedPrice = _form.find('input[name=price').inputmask('unmaskedvalue').replace(',', '.')
                const _unmaskedOriginPrice = _form.find('input[name=origin_additional_price').inputmask('unmaskedvalue').replace(',', '.')
                const _unmaskedDestinationPrice = _form.find('input[name=destination_additional_price').inputmask('unmaskedvalue').replace(',', '.')
                const _startDateOri = main.getValueDateSQL(_form.find('input[name=start_date'))
                
                    _divWrapper.empty()
                    _divWrapper.append(
                        `<div>Tarif - ${_price}</div>
                        <div>Biaya Tambahan - ${_originAdditionalPrice}</div>
                        <div>Biaya Tambahan Bongkar - ${_destinationAdditionalPrice}</div>
                        <div>Mulai Berlaku - ${_startDate}</div>`
                    )
                    _formHidden.empty()
                    _formHidden.html(main.generateFormField(`tripEkspedisis[${_idForm}]`
                                , {                                    
                                    'stateForm': 'update',
                                    'price': _unmaskedPrice,
                                    'origin_additional_price':  _unmaskedOriginPrice,
                                    'destination_additional_price': _unmaskedDestinationPrice,
                                    'start_date': _startDateOri
                                }
                            )                    
                )
                //});
                
                _form.closest('.bootbox').find('button.bootbox-close-button').click()
            }
        }        
    </script>