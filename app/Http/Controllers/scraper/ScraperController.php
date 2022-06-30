<?php

namespace App\Http\Controllers\scraper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;

class ScraperController extends Controller
{

    private $results = array();

    public function scraper()
    {
        $client = new Client();
        $url = "https://suchen.mobile.de/fahrzeuge/search.html?dam=0&isSearchRequest=true&ref=quickSearch&sb=rel&vc=Car";
        $page = $client->request("GET",$url);
        // dd($page->filter(".result-item"));
        
        
        dd($page);
        return $page;
        return view("scraper.scraper");
    }
}
