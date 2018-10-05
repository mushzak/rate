<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://phisix-api3.appspot.com/stocks.json');
        $response = $response->getBody()->getContents();
        $data = json_decode($response);
        $stocks = $data->stock;

        return view('welcome',compact('stocks'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Throwable
     */
    public function getInfo()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://phisix-api3.appspot.com/stocks.json');
        $response = $response->getBody()->getContents();
        $data = json_decode($response);
        $stocks = $data->stock;

        $returnHTML = view('table')->with('stocks', $stocks)->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }
}
