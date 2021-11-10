<div class="">    
    {!! $buttonView !!}
    <hr>
    <div class='content-info row'>
    @each('inventory.product_categories_products.card', $products, 'dataCard', 'empty')    
    </div>
</div>