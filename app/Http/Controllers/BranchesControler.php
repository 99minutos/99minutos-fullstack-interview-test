<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class BranchesControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::withBasicAuth(env('GITHUB_USER'), env('GITHUB_TOKEN'))-> get('https://api.github.com/repos/juan149609/99minutos-fullstack-interview-test/branches');
        return view('branches', ['data' => $response->json()]);
    }
    

    public function show($sha){
        $response = Http::withBasicAuth(env('GITHUB_USER'), env('GITHUB_TOKEN'))->get('https://api.github.com/repos/juan149609/loginApp/commits?sha=' . $sha);
        
        return view('branch', ['data' => $response->json()]);
    }

}
