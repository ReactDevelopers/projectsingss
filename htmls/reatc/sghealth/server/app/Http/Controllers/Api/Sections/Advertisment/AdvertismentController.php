<?php

namespace App\Http\Controllers\Api\Sections\Advertisment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\ModelFilters\Universal\AdvertismentFilter;


class AdvertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $advertisment = Advertisment::filter($request->all(), AdvertismentFilter::class);
        $advertisment = $request->page == "-1"  ? ['data' => $advertisment->get()] : $advertisment->paginate($request->page_size);
       
        return $this->setData($advertisment)->response();  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $this->validation($request);

        $data = [
            'title'                 => $request->title,
            'description'           => $request->description,
        ];
    
        $advertisment   = Advertisment::create($data);

        $advertisment->image()->addMedia($request->image, 'advertisment');
        return $this->setData($advertisment)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news   = Advertisment::with(['image'])->findOrFail($id);
        return $this->setData($news)->response(200);
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
        $this->validation($request,$id);

        $advertisment = Advertisment::with('image')->findOrFail($id);
       

        if($request->hasFile('image.file')) {
            $advertisment->image()->addMedia($request->image, 'advertisment');
        }
        $advertisment->update($request->only(['title','description']));

         return $this->setData([
            'advertisment' => $advertisment
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
        $advertisment = Advertisment::where('id',$id);
        $advertisment->delete();
        
        $message = "Advertisement has been deleted successfully";
        
        return $this->setMessage($message)->response(200);
    }
    protected function validation(Request $request,$id=NULL)
    {   

        $isRequiredImage = $id && ($request->advertisment_image_id || $request->has('image.file') ) ? 'nullable' : 'required';

        $request->validate([
            'title'                 => ['required','max:255'],
            'description'           => ['required','max:255'],
            'image.file'            => [$isRequiredImage]

        ]);

    }
}
