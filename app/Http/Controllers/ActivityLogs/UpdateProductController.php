<?php

namespace App\Http\Controllers\ActivityLogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Audit;

class UpdateProductController extends Controller
{
    public function update_productss_logs(){
        return view('activiy_logs.index');
    }
    
    public function logs(){
        $logs = Audit::all();
        return json_encode(array('data'=>$logs ));
    }
}
