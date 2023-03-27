<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\StripeTrait;

class SubscriptionController extends Controller
{
    use StripeTrait;

    public function buyPlan(Request $request)
    {
        $token = $this->createToken($request);       
        $customer_id = $this->createCustomer($token);
        $is_active = 1;
        $values = array(
            'customer_id' => $customer_id, 'plan_id' => $request->plan_id,
            'is_active' => $is_active,
        );
        $query = DB::table('customer_plan')->where($values)->count();
        if ($query > 0) {
            $message = 'Customer already owns this subscription';
            $status = 0;
        } else {
            if ($this->createSubscription($customer_id, $request)) {
                DB::table('customer_plan')->insert($values);
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

    public function getPlans()
    {
        $products = $this->getProducts();
        foreach($products as $product){
            $price = $this->getPrice($product->id);
            $product->price = $price->data ? $price->data[0]->unit_amount : 0;
            $product->price_id = $price->data ? $price->data[0]->id : 0;
        }
        return view('select-plan', [
            'plans' => $products,
        ]);
    }
}
