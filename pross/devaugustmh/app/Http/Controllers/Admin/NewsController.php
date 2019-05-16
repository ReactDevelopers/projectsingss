<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\News; 

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'News';
        return view('admin.list.blog')->with($data);
    }

    public function getNews(Request $request)
    {
        return \Datatables::of(News::select(array('id','title','description', 'created_at', \DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as created_attb"))))->make(true);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Add News';
        return view('admin.forms.add-blog')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
                'title' => 'required|unique:news|max:100',
                'description' => 'required|max:250',
                'news_url' => 'required|url',
                
                ],
                [
                    'title.required' => 'Please enter Title.',
                    'description.required' => 'Please enter Description.',
                    'news_url.required' => 'Please enter News Link.',
                    
                ]
        );

        $data = $request->only(array('title', 'description', 'news_url'));
        News::create ($data);
        
        //return redirect('category')->with('success','The Category has been added.');
        $request->session()->flash('success', 'News saved successfully.');
        return redirect('news');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Edit News';
        $data['blog'] = News::select(['*'])
                        ->where(['id'=>$id])->first();
        return view('admin.forms.edit-blog')->with($data);
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
        $this->validate($request, [
                'title' => 'required|unique:news,title,'.$id.',id|max:100', 
                'description' => 'required|max:250',
                'news_url' => 'required',
                ],
                [
                    'title.required' => 'Please enter Title.',
                    'description.required' => 'Please enter Description.',
                    'news_url.required' => 'Please enter News Link.',
                    
                ]
        );

        $data = $request->only(array('title', 'description', 'news_url'));
        $news = News::where('id', $id)->update($data);
        
        $request->session()->flash('success', 'News updated successfully.');
        return redirect('news');
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
    /**
     * Delete the record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        News::where('id', $id)->delete();
        $request->session()->flash('success', 'News deleted successfully.');
    }
}
