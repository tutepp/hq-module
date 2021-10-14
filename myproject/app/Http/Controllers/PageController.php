<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{   protected $module ="";

    public function __construct(Request $request)
    {
        $this->module = $request->segment(1);
    }
    public function index()
    {
        $items = DB::table('items')->limit(3)->get();
        $recentPosts = $this->getRecentPost();

        return view('frontend.page', ['items'=>$items,'recentPosts'=>$recentPosts]);
    }
    public function getRecentPost()
    {
        return
            Item::where('position','recent_post-banner')
                ->orderBy('created_at', 'desc')->get(['id','title','image','created_at']);
    }

}
