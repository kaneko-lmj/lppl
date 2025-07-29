<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talkshow;

class PublicTalkshowController extends Controller
{
    public function index()
    {
        $talkshows = Talkshow::latest()->get();
        return view('public.talkshow', compact('talkshows'));
    }
}
