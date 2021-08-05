<?php

namespace App\View\Components;

use Carbon\Carbon;
use Spatie\Analytics\Period;
use Illuminate\View\Component;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Spatie\Analytics\AnalyticsFacade as Analytics;

class BrowserChart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $chart;
    public $top_browser_sessions;
    public $top_browser_browser;
    public $endDate;
    public $startDate;
    public $period;

    public function __construct(LarapexChart $chart)
    {
        //
        $startDate2021 = Carbon::createFromDate(2021, 1, 1);
        $endDate2021 = Carbon::now();

        $startDate2020 = Carbon::createFromDate(2020, 1, 1);
        $endDate2020 = Carbon::createFromDate('1 year ago');
        $period2021 = Period::create($startDate2021, $endDate2021);

        // dd($endDate2020);

        $period2020 = Period::create($startDate2020, $endDate2020);

        $top_browser2021 = Analytics::fetchTopBrowsers($period2021);
        $top_browser2020 = Analytics::fetchTopBrowsers($period2020);

        $this->chart = (new LarapexChart)->barChart()
        ->setTitle('Top Browser Session for ' . config('app.name'))
        ->setSubtitle('For Period ' . $startDate2021->diffForHumans() . ' as compared to same period 2020.' )
        ->addBar('2021 Data',$top_browser2021->pluck('sessions')->toArray())
        ->addBar('2020 Data', $top_browser2020->pluck('sessions')->toArray())
        ->setColors(['#664AEE', '#CC0099'])
        ->setXAxis($top_browser2021->pluck('browser')->toArray());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.browser-chart');
    }
}
