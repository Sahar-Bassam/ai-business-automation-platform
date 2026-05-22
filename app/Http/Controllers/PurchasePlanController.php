<?php

namespace App\Http\Controllers;
use App\Models\AiPlan;
use Illuminate\Http\Request;
use App\Notifications\PlanPurchased;
use App\Models\User;

class PurchasePlanController extends Controller
{
public function store(Request $request)
{
    $user = User::first();

    $plan = AiPlan::findOrFail($request->plan_id);

    $user = auth()->user();

    $user->aiPlans()->attach($plan->id);

    $user->notify(new PlanPurchased($plan->title));

    return response()->json(['success' => true]);
}
}
