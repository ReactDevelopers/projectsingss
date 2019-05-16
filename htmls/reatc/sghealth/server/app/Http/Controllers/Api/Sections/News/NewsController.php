<?php

namespace App\Http\Controllers\Api\Sections\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\ModelFilters\Universal\NewsFilter;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
      $news = News::filter($request->all(), NewsFilter::class);
        
      $news = $request->page == "-1"  ? ['data' => $news->get()] : $news->paginate($request->page_size);
       
        return $this->setData($news)->response();  
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
        /**
         * undocumented constant
         **/
          
        $news   = News::create($data);
        $news->image()->addMedia($request->image, 'news');
        return $this->setData($news)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news   = News::with(['image'])->findOrFail($id);
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
        
        $news = News::findOrfail($id);

        if($request->hasFile('image.file')) {
            $news->image()->addMedia($request->image, 'news');
        }

        $news->update($request->only(['title','description']));

         return $this->setData([
            'news' => $news
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
        $news = News::where('id',$id);
        $news->delete();
        $message = "News has been deleted successfully";
        return $this->setMessage($message)->response(200);
    }


    protected function validation(Request $request,$id=NULL)
    {   
        $isRequiredImage = $id && ($request->news_image_id || $request->has('image.file')) ? 'nullable' : 'required';

        $request->validate([
            'title'                 => ['required','max:255'],
            'description'           => ['required','max:255'],
            'image.file'            => [$isRequiredImage]
        ]);
    }
}




