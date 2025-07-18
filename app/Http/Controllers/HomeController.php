<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CategoryCampaign;
use App\Models\Donatur;
use App\Models\Slider;
use App\Models\VideoInspiration;

class HomeController extends Controller
{
    public function index(){
        $campaigns = Campaign::with('category','donaturs')->latest()->get();
        $categories = CategoryCampaign::with('campaigns')->get();
        $donaturs = Donatur::all();
        $sliders = Slider::all();
        $videos = VideoInspiration::all();
        return view('pages.home',compact('campaigns','categories','donaturs','sliders','videos'));
    }

    public function about(){
        $sliders = Slider::all();
        return view('pages.about',compact('sliders'));
    }
}
