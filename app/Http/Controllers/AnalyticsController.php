<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Http;
use Spatie\Analytics\AnalyticsFacade as Analytics; //Change here

class AnalyticsController extends Controller

{
    public function __invoke () {
    //retrieve visitors and pageview data for the current day and the last seven days
    // $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    // $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(6));
    $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    return view('analytics', compact('analyticsData'));
    }
}
