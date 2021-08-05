<?php

namespace App\View\Components;

use Carbon\Carbon;
// use Illuminate\Support\Carbon as Carbon;
use Spatie\Analytics\Period;
use Illuminate\View\Component;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Spatie\Analytics\AnalyticsFacade as Analytics;

class RefererChart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $chart;
    public $top_referer;
    public $endDate;
    public $startDate;
    public $period;


    public function __construct(LarapexChart $chart)
    {
        //
        $endDate = Carbon::now();
        // $startDate = Carbon::createFromFormat('d/m/Y', '01/06/2020');
        $startDate = Carbon::createFromDate(2021, 1, 1);
        $period = Period::create($startDate, $endDate);

        $top_referer_page = Analytics::fetchTopReferrers($period)->pluck('pageViews');
        $top_referer_url = Analytics::fetchTopReferrers($period)->pluck('url')->toArray();
        // $top_browser_browser = Analytics::fetchTopBrowsers(Period::days(365))->pluck('browser')->toArray();
        // dd($top_referer_page->count());

        $this->chart = (new LarapexChart)->areaChart()
        // ->setTitle('Top Referers Of ' . $top_referer_page->count() . ' Referers')
        ->setTitle('Top Referers for ' . config('app.name'))
        ->setSubtitle('Period since ' . $startDate->diffForHumans() )
        ->addData('Referer',$top_referer_page->toArray())
        // ->addData('Sessions', [700, 326, 826, 226, 626, 426, 1726, 96, 626, 90])
        ->setColors(['#cc0099', '#ff6384'])
        ->setXAxis($top_referer_url)
        ->setGrid(true, '#3F51B5', 0.1)
        ->setColors(['#6045E2', '#303F9F'])
        ->setMarkers(['tomato', '#E040FB'], 7, 10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.referer-chart');
    }

}
