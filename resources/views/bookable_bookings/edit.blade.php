@extends('layouts.app')

@section('content')
    @push('breadcrumb')
        <ol class="breadcrumb border-0 m-0">
          <li class="breadcrumb-item">
             <a href="{!! route('bookableBookings.index') !!}">@lang('models/bookableBookings.singular')</a>
          </li>
          <li class="breadcrumb-item active">@lang('crud.edit')</li>
        </ol>
    @endpush
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit @lang('models/bookableBookings.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($bookableBookings, ['route' => ['bookableBookings.update', $bookableBookings->id], 'method' => 'patch']) !!}

                              @include('bookable_bookings.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection