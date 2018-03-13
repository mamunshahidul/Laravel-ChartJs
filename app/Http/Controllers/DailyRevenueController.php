<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Support\Facades\DB;

class DailyRevenueController extends Controller
{
    //
    public function chart()
    {
        $response = DB::table('daily_revenues')
            ->select(DB::raw('count(*) as row_count'))
            ->select(DB::raw("DATE_FORMAT('created_at', '%m-%d-%Y') AS month"))
            ->get();
        return response()->json($response);
    }
}
