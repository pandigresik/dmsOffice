{!! Form::open(['route' => ['purchase.invoices.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('purchase.invoiceValidates.edit', $id) }}" class='btn btn-ghost-info' data-toggle="tooltip" data-placement="top" title="" data-original-title="Validate">
       <i class="fa fa-check"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
