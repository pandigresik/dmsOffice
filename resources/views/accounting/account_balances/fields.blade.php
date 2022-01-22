<!-- Balance Date Field -->
<div class="form-group row">
    {!! Form::label('balance_date', __('models/accountBalances.fields.balance_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('balance_date', null, ['class' => 'form-control', 'required' => 'required' ,'id'=>'balance_date']) !!}
</div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(function(){
            const minYear = parseInt(moment().format('YYYY')) - 2
            $('#balance_date').daterangepicker({                
                locale: {
                    format: 'DD MMM YYYY'
                },
                singleDatePicker: true,
                timePicker: false,
                showDropdowns: true,
                minYear: minYear,
                autoApply: true,
                isInvalidDate: function(date) {                    
                    //if (date.day() == 0 || date.day() == 6)
                    if (date.date() == 1) return false;
                    return true;
                }
            });
        }) 
    </script>
   
@endpush