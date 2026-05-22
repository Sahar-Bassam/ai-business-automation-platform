<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AiPlansController extends Controller
{
    public function getPlans(Request $request)
    {
        $companySize = $request->query('companySize');
        $plans = DB::table('ai_plans')
                    ->where('company_size', $companySize)
                    ->get();

        return response()->json($plans);
    }
}
