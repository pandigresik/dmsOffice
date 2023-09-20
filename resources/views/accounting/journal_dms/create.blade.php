@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">      
        <li class="breadcrumb-item">Jurnal DMS</li>
      <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>
    @endpush
     <div class="container-fluid">
        <x-tabs :data="$dataTabs"/>          
    </div>
@endsection
@push('scripts')
<script type="text/javascript">        
    function selectAllOption(elm, ref){        
        if($(elm).is(':checked')){
            $(`${ref} > option`).prop("selected", "selected");
            $(ref).trigger("change");
        }else{
            let _formgroup = $(ref).closest('.form-group');
            _formgroup.find('button.select2-selection__clear').click();
            $(ref).trigger("change");
        }
    }     
</script>
@endpush