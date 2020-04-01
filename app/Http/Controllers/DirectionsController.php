<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Illuminate\Support\Facades\Http;

class DirectionsController extends Controller
{
    function betweenPostCodes($start, $end){
        if($start == $end){
            return 0;
        }
    
        if(Cache::get($start.'-'.$end) == null){
    
            $route_request = Http::get('https://maps.googleapis.com/maps/api/directions/json?origin=' . $start .'&destination=' . $end . '&key='. config('services.GCP.key'));
        
            $route = json_decode($route_request->getBody(),true);

            if($route['status'] == 'OK'){
                Cache::forever($start.'-'.$end, $route);
            }else{
                abort(500);
            }

        }else{
            $route = Cache::get($start.'-'.$end);
        }
        return $route;
    }

    function timeBetweenPostCodes($start, $end){    
        if(Cache::get($start.'-'.$end) == null){
    
            $route_request = Http::get('https://maps.googleapis.com/maps/api/directions/json?origin=' . $start .'&destination=' . $end . '&key='. config('services.GCP.key'));
        
            $route = json_decode($route_request->getBody(),true);

            if($route['status'] == 'OK'){
                Cache::forever($start.'-'.$end, $route);
            }else{
                abort(500);
            }

        }else{
            $route = Cache::get($start.'-'.$end);
        }
        return $route['routes'][0]['legs'][0]['duration']['value'];
    }
}
