<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $items = Item::paginate(2);
        $myItems = Item::orderBy('id', 'DESC')->paginate(5);

        return view('frontend.blog',['items'=>$items, 'myItems'=>$myItems]);
    }

    public function getItem($slug)

    {   $item = Item::where('slug',$slug)->first();
        $myItems = Item::orderBy('id', 'DESC')->paginate(5);
        return view('frontend.single-item',['item'=>$item, 'myItems'=>$myItems]);
    }

}
