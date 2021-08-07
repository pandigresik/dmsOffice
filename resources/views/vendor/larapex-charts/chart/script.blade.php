<script>
    $(function(){    
        var options = {!! json_encode($chart->getOptions()) !!}
        
        var chart = new ApexCharts(document.querySelector("#{!! $chart->id() !!}"), options);
        chart.render();
    });
</script>
