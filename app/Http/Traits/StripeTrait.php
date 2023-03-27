<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Stripe;
use Auth;

trait StripeTrait {

    public function getStripeClient(){
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        return $stripe;
    }

    public function createToken(Request $request)
    {
        $stripe = $this->getStripeClient();
        $token = $stripe->tokens->create([
            'card' => [
              'number' => $request->credit_card_number,
              'exp_month' => $request->expiry_month,
              'exp_year' => $request->expiry_year,
              'cvc' => $request->cvv,
            ]
        ]);
        return $token->id;
    }

    public function createProduct($name, $description)
    {
        $stripe = $this->getStripeClient();
        $product = $stripe->products->create([
            'name' => $name,
            'description' => $description
        ]);
        $product_id = $product->id;
        return $product_id;
    }

    public function createPrice($product_id, $price)
    {        
        $stripe = $this->getStripeClient();
        $price = $stripe->prices->create([
            'unit_amount' => $price,
            'currency' => 'usd',
            'recurring' => ['interval' => 'month'],
            'product' => $product_id,
        ]);

        $price_id = $price->id;
        return $price_id;
    }

    public function createCustomer($token)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        //create customer
        $customer = \Stripe\Customer::create([
            'name' => Auth::guard('customer')->user()->name,
            'email' => Auth::guard('customer')->user()->email,
            'source' => $token
        ]);
        $customer_id = $customer->id;
        return $customer_id;
    }

    public function createSubscription($customer_id, Request $request)
    {
        $start_date = Carbon::now()->format('d-m-Y');
        $end_date = Carbon::now()->addMonths(12)->format('d-m-Y');
        
        $stripe = $this->getStripeClient();
        //CREATE SUBSCRIPTION
        $subscription = $stripe->subscriptions->create([
            'customer' => $customer_id,
            'items' => [
                ['price' => $request->price_id],
            ],
            'metadata' => [
                'start_date' =>  $start_date,
                'total_months' => '12',
                'end_date' => $end_date
            ]
        ]);
        if($subscription->status == 'active'){
            return true;
        }
        return false;
    }

    public function getProducts()
    {
        $stripe = $this->getStripeClient();
        $products = $stripe->products->all();
        return $products;
    }

    public function getPrice($product_id)
    {
        $stripe = $this->getStripeClient();
        $price = $stripe->prices->all(['product' => $product_id]);
        return $price;
    }
}