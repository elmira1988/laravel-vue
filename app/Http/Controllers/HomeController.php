<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $url_data = [
            array(
                'title' => 'DKA-DEVELOP',
                'url' => 'https://dka-develop.ru'
            ),
            array(
                'title' => 'YOUTUBE',
                'url' => 'http://youtube.com'
            )
        ];
        //dd($url_data);
        return view('home', ['url_data' => $url_data]);
    }


    public function getJSON()
    {
        return [
            array(
                'title' => 'DKA-DEVELOP',
                'url' => 'https://dka-develop.ru'
            ),
            array(
                'title' => 'YOUTUBE',
                'url' => 'http://youtube.com'
            )
        ];
    }

    public function chartData(){
        return [
            'labels' => ['март','апрель','май','июнь'],
            'datasets' => array(
                [
                    'label' => 'Продажи',
                    'backgroundColor' => ['#F26202', '#FA6202', '#AA6202', '#F21002', '#D26202'],//для line chart только одно значение должно быть
                    'data' => [15000,5000,10000,30000]
                ]
            )
        ];
    }

    public function chartRandom(){
        return [
            'labels' => ['март','апрель','май','июнь'],
            'datasets' => array(
                [
                    'label' => 'Золото',
                    'backgroundColor' => '#16AB39',//для line chart только одно значение должно быть
                    'data' => [rand(0,4000), rand(0,4000), rand(0,4000), rand(0,4000), rand(0,4000)]
                ],
                [
                    'label' => 'Серебро',
                    'backgroundColor' => '#B5СС18',//для line chart только одно значение должно быть
                    'data' => [rand(0,4000), rand(0,4000), rand(0,4000), rand(0,4000), rand(0,4000)]
                ]
            )
        ];
    }

    public function newEvent(Request $request)
    {
        $result = [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => array(
                [
                    'label' => 'Продажи',
                    'backgroundColor' => ['#F26202', '#FA6202', '#AA6202', '#F21002', '#D26202'],//для line chart только одно значение должно быть
                    'data' => [15000, 5000, 10000, 30000]
                ]
            )
        ];

        if ($request->has('label')) {
            $result['labels'][] = $request->label;
            $result['datasets'][0]['data'][] = (integer)$request->sale;

            if ($request->has('realtime')) {
                if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) {
                    event(new NewEvent($result));
                }
            }
        }

        return $result;
    }
}
