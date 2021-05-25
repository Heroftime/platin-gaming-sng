<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $request) {

        $clientId = "5MYEK3CC2D1C5L5YPF1ET5EK3KANVMKBRRD1S3EIBUKJIECG";
        $clientSecret =  "2EGPHE1CRYTR1GCYSO4CVFITIFFQW3AI5GQIPTKVKM11IJBU";
        $version = "20180323";

        $fourSquareApiUrl = "https://api.foursquare.com/v2/venues/";
        $venueCategoriesEndpoint = $fourSquareApiUrl.'categories';
        $venueExploreEndpoint = $fourSquareApiUrl.'explore';

        $params = "?client_id=$clientId&client_secret=$clientSecret&v=$version";


        // Get Venue Categories
        $json = file_get_contents($venueCategoriesEndpoint.$params);
        $categories = json_decode($json, true);
        $categories = $categories['response']['categories'];

        // Get Venus
        $query = "";
        $venues = [];
        if ($request->has('query')) {
            $query = $request->input('query');
            $query = strtolower(str_replace(' ', '_', $query));
            $url = $venueExploreEndpoint.$params.'&near=valetta&query='.$query;
            $json = file_get_contents($url);
            $venues = json_decode($json, true);
            $venues = $venues['response']['groups'][0]['items'];
        }

        


        return view('index', ['categories' => $categories, 'venues' => $venues]);
    }
}
