<?php

namespace App\Http\Controllers\Backend\Settings;

use Analytics;
use App\Http\Controllers\Controller;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    public function index()
    {

        return view('admin_pages.analytics.analytics');
    }

    //retrieve visitors and pageview data for the current day and the last seven days
    public function getPageViewsByDate($days)
    {
        if ($days == '7days') {
            $page_visitors = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
            return $page_visitors;
        }
        if ($days == '1month') {
            $page_visitors = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30));
            return $page_visitors;
        }
        if ($days == '6month') {
            $page_visitors = Analytics::fetchTotalVisitorsAndPageViews(Period::months(6));
            return $page_visitors;
        }
        if ($days == '1year') {
            $page_visitors = Analytics::fetchTotalVisitorsAndPageViews(Period::years(1));
            return $page_visitors;
        }
    }

    // returns users types either regular or new users
    public function getUserTypes()
    {
        $user_types = Analytics::fetchUserTypes(Period::months(6));
        return $user_types;
    }

    // returns top browsers from where user visited this website
    public function getTopBrowsers()
    {
        $top_browsers = Analytics::fetchTopBrowsers(Period::months(6), 10);
        return $top_browsers;
    }

    // return most visited pages of 6 months periods
    public function getMostVisitedPages()
    {
        $most_visited_pages = Analytics::fetchMostVisitedPages(Period::months(6), 200);
        return $most_visited_pages;
    }

    // returns top referres websites
    public function getTopReffers()
    {
        $top_referrers = Analytics::fetchTopReferrers(Period::months(6), 50);
        return $top_referrers;
    }

}