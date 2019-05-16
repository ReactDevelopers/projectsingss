<?php

namespace App\Http\Controllers\Api\Sections\Banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\ModelFilters\Universal\BannerFilter;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       $banners = Banner::filter($request->all(), BannerFilter::class)->paginate($request->page_size);
        return $this->setData($banners)
            ->response();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validation($request);
        $banner = Banner::create(['banner_category_id' => $request->banner_category_id]);
        $banner->image()->addMedia($request->image, 'banners');

        return $this->setData([
            'banner' => $banner
        ])->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::with(['image' => function($q){
            $q->select('id','path', 'thumbnails');

        }])->findOrFail($id);

        return $this->setData([
            'banner' => $banner
        ])
        ->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validation($request);

        $banner = Banner::with('image')->findOrFail($id);

        if($request->hasFile('image.file')) {
            $banner->image()->addMedia($request->image, 'banners');
        }
        $banner->update(['banner_category_id' => $request->banner_category_id]);

        return $this->setData([
            'banner' => $banner
        ])->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $banner = Banner::with('image')->findOrFail($id);
        $banner->delete();

        return $this->setData([
            'banner' => $banner
        ])
        ->setMessage('Banner has been deleted.')
        ->response();
    }
    /**
     * To validate the Banner request.
     */
    private function validation(Request $request) {

        $this->validate($request,[
            'banner_category_id' => 'nullable|exists:banner_categories,id',
            'image.file' => 'image'
        ]);
    }

    /**
     * To get the rendom splash screen' banner.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function randomSplashBanner(Request $request) {

        $banner = Banner::join('banner_categories','banner_categories.id', 'banners.banner_category_id')
                    ->with('image')
                    ->where('banner_categories.name','splash_screen')
                    ->select(['banners.id','banners.banner_image_id','banners.banner_category_id', 'banners.options'])
                    ->inRandomOrder()->first();

        return $this->setData([
            'splash_screen' => $banner
        ])
        ->response();
    }
}
