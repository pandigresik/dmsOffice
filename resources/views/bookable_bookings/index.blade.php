@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">@lang('models/bookableBookings.plural')</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('models/bookableBookings.plural')
                             <a class="pull-right" href="{{ route('bookableBookings.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                             @include('bookable_bookings.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

