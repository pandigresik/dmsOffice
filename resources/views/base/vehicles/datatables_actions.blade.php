{!! Form::open(['route' => ['base.Vendors.vehicles.destroy', [$vendor_expedition_id, $id]], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('base.Vendors.vehicles.show', [$vendor_expedition_id, $id]) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('base.Vendors.vehicles.edit', [$vendor_expedition_id,$id]) }}" class='btn btn-ghost-info'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
