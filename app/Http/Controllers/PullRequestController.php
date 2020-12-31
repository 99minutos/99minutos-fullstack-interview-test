<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PullRequestController extends Controller
{
    
    public function index()
    {
        $response = Http::withBasicAuth(env('GITHUB_USER'), env('GITHUB_TOKEN'))->get('https://api.github.com/repos/juan149609/99minutos-fullstack-interview-test/pulls?state=all');
        return view('pull-request', ['data' => $response->json()]);
    }

    public function show($number)
    {
        return Http::withBasicAuth(env('GITHUB_USER'), env('GITHUB_TOKEN'))->get('https://api.github.com/repos/juan149609/99minutos-fullstack-interview-test/pulls/' . $number);
    }

    public function closePullReq($number)
    {
        HTTP::withBasicAuth(env('GITHUB_USER'), env('GITHUB_TOKEN'))->patch('https://api.github.com/repos/juan149609/99minutos-fullstack-interview-test/pulls/' . $number,[
            'state' => 'closed'
        ]);
        return redirect('/pull-request');
    }

    public function create(){
        $response = Http::withBasicAuth(env('GITHUB_USER'), env('GITHUB_TOKEN'))->get('https://api.github.com/repos/juan149609/99minutos-fullstack-interview-test/branches');
        return view('create-pull-req', ['data' => $response->json()]);
    }

    public function store(Request $request)
    {
        $response = Http::withBasicAuth(env('GITHUB_USER'), env('GITHUB_TOKEN'))->post('https://api.github.com/repos/juan149609/99minutos-fullstack-interview-test/pulls', [
            'title' => $request->input('title') ?? '',
            'body' => $request->input('comment') ?? '',
            'head' => $request->input('head') ?? '',
            'base' => $request->input('base') ?? '',
        ]);

        if ($response->failed()) {
            return redirect('/error')->with('code', $response->status())->with('message', $response->json()['errors'][0]['message']);
        }

        
        if($request->input('merge')){
            $response = Http::withBasicAuth(env('GITHUB_USER'), env('GITHUB_TOKEN'))->put('https://api.github.com/repos/juan149609/99minutos-fullstack-interview-test/pulls/' . 
            $response->json()['number'] . '/merge', [
                'commit_title' => $request->input('title') ?? '',
                'commit_message' => $request->input('comment') ?? ''
            ]);
        }

        if ($response->failed()) {
            return redirect('/error')->with('code', $response->status())->with('message', $response->body());
        }
        return redirect('/pull-request');
    }
}
