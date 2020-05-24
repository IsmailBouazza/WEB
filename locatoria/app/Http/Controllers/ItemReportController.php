<?php

namespace App\Http\Controllers;

use App\ItemReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class itemReportController extends Controller
{
    public function report($id,Request $request)
    {
        if(Auth::user()) {
            $report = new ItemReport;
            $report->user_id = Auth::user()->id;
            $report->item_id = $id;
            $report->reason = $request->reason;
            $report->save();
            echo "reported";

        }
    }
}
