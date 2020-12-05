<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Questionnaires;
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

    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $questionnaires = auth()->user()->questionnaires;
        $repositories = $this->getMyGithubData();
        
        return view('home', compact('questionnaires', 'repositories'));
    }

    public function getMyGithubData()
    {
        $client = new Client(); // -> GuzzleHttp\Client
        $baseURL = \Config::get('values.baseURL');

        $response = $client->request('GET', $baseURL, ['verify' => false]);
        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }
}
