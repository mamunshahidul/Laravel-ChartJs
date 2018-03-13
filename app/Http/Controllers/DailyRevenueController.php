<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DailyRevenueController extends Controller
{
    //
    public function chart()
    {
        $response = DB::table('daily_revenues')
            ->select(DB::raw('count(*) as row_count, MONTH(created_at)'))
            ->groupBy('MONTH(created_at)')
            ->get();
        return response()->json($response);
    }
}
