@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
      <li class="breadcrumb-item">
         <a href="{!! route('menus.index') !!}">@lang('models/menus.singular')</a>
      </li>
      <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>
    @endpush
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create @lang('models/menus.singular')</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'menus.store']) !!}

                                   @include('menus.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
