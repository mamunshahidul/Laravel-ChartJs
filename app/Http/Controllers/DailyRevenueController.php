<?php

namespace App\Http\Controllers;

use App\DailyRevenue;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\DB;

class DailyRevenueController extends Controller
{
    //
    public function chart()
    {
//        $response = DB::table('daily_revenues')
//            ->select(DB::raw('count(*) as row_count'))
//            ->select(DB::raw("MONTH('created_at') AS month"))
//            ->groupby('created_at')
//            ->get();

//        $response = DB::table('daily_revenues')
//
////            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
////            ->groupBy('created_at')
//            ->get();

//        $response= DailyRevenue::OrderBy('created_at')
//            -> select(DB::raw('total_revenue as total'), DB::raw('operator_name as operator'))
//            ->get();

        $data = DB::table('daily_revenues')
            ->select(DB::raw('count(id) as `total`'),DB::raw("CONCAT_WS('-',MONTH(created_at),YEAR(created_at)) as month"))
            ->groupby('month')
            ->get();
        return response()->json($data);
    }
}
