<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GithubController extends Controller
{
    //
    function index()
    {
        return view('listGit');
    }

    function showSearchGit(Request $request)
    {

        $keyword = $request->keyword;
        $result = Http::get(config('app.github_api_url') . '/search/users', [
            'q' =>$keyword
        ]);
        $users = json_decode($result->body())->items;

        return view('listGit',compact('users'));
    }

    function showProfileId($username){

        $result = Http::get(config('app.github_api_url') . '/users/'.$username);
        $result1 = Http::get(config('app.github_api_url').'/users/'.$username.'/repos');

        $repos = json_decode($result1->body());

        $user = json_decode($result->body());

        return view('showProfile',compact('user','repos'));

    }

    function test(){

    }

}
