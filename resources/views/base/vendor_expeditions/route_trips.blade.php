        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Trip</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                @php
                                    $vendorTrip = isset($Vendor) ? $Vendor->trips()->pluck('route_trip_id','route_trip_id') : [];                                     
                                @endphp
                                <div class="row">
                                    @forelse ($trips as $key => $groupVehicle)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="card card-accent-secondary">
                                            <div class="card-header">{{ $key }}</div>
                                            <div class="card-body">                                        
                                            @foreach ($groupVehicle as $item)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="trips[]" @if(isset($vendorTrip[$item->id])) checked @endif value="{{ $item->id }}" class="form-check-input">
                                                        {{ $item->name }}
                                                        <i class="input-helper"></i>
                                                    </label>
                                                </div>                                
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        ----   
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>