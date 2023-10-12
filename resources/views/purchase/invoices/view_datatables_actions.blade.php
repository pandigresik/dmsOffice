{!! Form::open(['route' => ['purchase.invoices.destroy', $item->id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('purchase.invoiceValidates.show', $item->id) }}" class='btn btn-ghost-info' data-toggle="tooltip" data-placement="top" title="" data-original-title="Validate">
        <i class="fa fa-eye"></i>
    </a>
    @if($item->state != 'pay')
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endif
</div>
{!! Form::close() !!}
