<?php

namespace App\Http\Controllers\Api\Sections\Roster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RosterPlan;
use App\ModelFilters\Universal\RosterPlanFilter;

class RosterPlanController extends Controller
{

    public function index(Request $request){
        
        $roster_plan = RosterPlan::filter($request->all(), RosterPlanFilter::class);
        $roster_plan = $request->page == "-1"  ? ['data' => $roster_plan->get()] : $roster_plan->paginate($request->page_size);
        return $this->setData($roster_plan)
            ->response();
    }

    public function store(Request $request){

        $this->validate($request,[
            'title'             => ['required','max:255'],
            'document.file'     => ['required','mimes:jpeg,png,jpg,pdf'],
        ]);

        $roster_plan = RosterPlan::create([
            'title'       => $request->title,
            'user_id'       => \Auth::id(),
        ]);

        $roster_plan->document()->addMedia($request->document, 'roster_plan');
        return $this->setData($roster_plan)->response(200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $roster_plan = RosterPlan::findOrFail($id);
        $roster_plan->delete();

        $message = 'Roster plan has been deleted permanently';
        return $this->setMessage($message)->response(200);
    }

}
