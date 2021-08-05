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
    $pages = Analytics::fetchVisitorsAndPageViews(Period::days(15));
    $top_referrers = Analytics::fetchTopReferrers(Period::days(365))->pluck('pageViews', 'url');
    $top_browser_browser = Analytics::fetchTopBrowsers(Period::days(365))->pluck('browser')->toArray();
    // dd( $top_browser_browser);

    $dates = $analyticsData->pluck('date');
    $visitors = $analyticsData->pluck('visitors');
    $country_sessions = $analyticsData->pluck('country_sessions');
        // return view('analytics')->with(json_encode($analyticsData));
    return view('analytics', compact('analyticsData','dates','visitors','country_sessions', 'top_browser_browser', 'top_referrers'));
    }
}
