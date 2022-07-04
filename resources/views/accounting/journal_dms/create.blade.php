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