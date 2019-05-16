<?php

namespace App\Http\Controllers\Api\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\ModelFilters\Universal\PostFilter;

class StaticPageController extends Controller
{
    
    public function index(Request $request,$slug){

        $data['page'] = Post::where('name',$slug)->with(['postType'])->whereHas('postType',function($q){
            return $q->where('post_types.name','page');
        })->first();
        
        $content = view('front.staticPages.index')->with($data)->render();

        return $this->setData([
            'content' => $content
        ])->response(200);

    }

    public function staticPageUrl(){
        $urls = Post::get()->pluck('name')->toArray();
     
        return $this->setData([
            'url' => $urls
        ])->response();
    }
}
