<?php

namespace App\Http\Controllers\Api\Sections\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Singsys\LQ\Lib\Media\MediaUploader;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $uploader = new MediaUploader($request->media, 'uploads');
        $media = $uploader->storeInDB();
        return $this->setData([
            'media' => $media,
            // 'storage_url' =>  \Storage::url('/')
            'storage_url' =>  asset('storage/').'/'
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
        //
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
        //
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
    }
}
