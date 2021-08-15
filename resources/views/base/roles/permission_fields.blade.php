        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Permissions</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                @php
                                    $rolePermission = isset($role) ? $role->permissions()->pluck('permission_id','permission_id') : []; 
                                @endphp
                                @forelse ($permissions as $item)                                                     
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="permissions[]" @if(isset($rolePermission[$item->id])) checked @endif value="{{ $item->name }}" class="form-check-input">
                                            {{ $item->name }}
                                            <i class="input-helper"></i>
                                        </label>
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