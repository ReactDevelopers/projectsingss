<?php

namespace App\Http\Controllers\Api\Sections\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;
use App\ModelFilters\Universal\ConfigFilter;
use Illuminate\Support\Facades\Crypt;
use Singsys\LQ\Lib\Media\MediaUploader;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $config = Config::filter($request->all(), ConfigFilter::class)->paginate($request->page_size);
        return $this->setData($config)
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = Config::findOrfail($id);

        return $this->setData([
            'config' =>  $config
        ])->response();
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
        $config = Config::findOrfail($id);

        if(isset($config->options['type']) && $config->options['type'] =='file') {

            $media = new MediaUploader($request->data, 'config_files');
            $data =  $media->uploadAndPrepareData();

            $data = json_encode($data);
        }
        else {

            $data =  isset($config->options['secure']) && $config->options['secure'] ?  Crypt::encrypt($request->data) : $request->data;
        }

        $config->update(['data'=> $data]);

        \Cache::forget('site_config.'. $config->name);

        return $this->setData([
            'config' =>  $config
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

        $config = Config::findOrfail($id);
        $config->delete();
        \Cache::forget('site_config.'. $config->name);

        return $this->setData([
            'config' =>  $config
        ])->response();
    }
}
