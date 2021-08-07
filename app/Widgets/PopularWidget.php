<?php

namespace App\Widgets;

use App\Charts\PopularChart;
use Arrilot\Widgets\AbstractWidget;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PopularWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $chart = new PopularChart(new LarapexChart()); 
        return view('widgets.popular_widget', [
            'config' => $this->config,
            'chart' => $chart->build(),
        ]);
    }
}
