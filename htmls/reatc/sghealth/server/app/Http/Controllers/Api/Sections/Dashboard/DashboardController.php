<?php

namespace App\Http\Controllers\Api\Sections\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\Profession;
use App\Models\User;
use App\Models\Event;
use App\Models\Assignment;

class DashboardController extends Controller
{

    public function index(){
        
        $data['institutes'] = Institute::count();
        $data['profession'] = User::with(['profession'])->whereHas('profession')->count();
        $data['users'] = User::whereIn('role_id',[2,3,4,5])->count();
        $data['events'] = Event::count();
        $data['jobs'] = Assignment::count();
        
        
        return $this->setData($data)->response();   
    }
}
