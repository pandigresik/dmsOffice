<div class="col-sm-12 col-lg-12">
    <div class="card card-accent-danger {{ $config['bgcolor'] ?? '' }}">
        <div class="card-header">Hutang TIV</div>
        <div class="card-body card-body pb-0">
            @foreach ($data as $item)
                <div class="d-flex justify-content-between align-items-start">
                    <div><a href="{{ $item['url'] }}?partner_type=supplier"> {{ $item['text'] }} </a></div>
                    <div>{{ $item['amount'] }}</div>
                </div>
            @endforeach
        </div>        
    </div>
</div>