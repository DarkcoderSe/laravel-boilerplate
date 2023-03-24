<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    public function buySubscriptionPackages(Request $request)
    {
        $is_active = 1;

        $values = array(
            'customer_id' => Auth::user()->id, 'plan_id' => $request->plan_id,
            'is_active' => $is_active,
        );
        $query = DB::table('customer_plan')->where($values)->count();
        if ($query > 0) {
            $message = 'Customer already owns this subscription';
            $status = 0;
        } else {
            $query = DB::table('customer_plan')->insert($values);
            if ($query) {
                $message = 'Subscription created successfully';
                $status = 1;
            } else {
                $message = 'Failed! Try again';
                $status = 0;
            }
        }

        return view('/payment-completed')
            ->with([
                'message' => $message,
                'status' => $status,
            ]);
    }
}
