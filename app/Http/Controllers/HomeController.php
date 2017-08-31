<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;
class HomeController extends Controller {

    public function index() {
        if(null !=session('username')){
            return view('home.dashboard');
        }else{
            return redirect()->to('/'); 
        }
        
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->to('/');
    }

    public function checkout(Request $request) {
        $this->validate($request, [
            'stripeToken' => 'required',
            'stripeEmail' => 'required',
            'donationAmt' => 'required',
        ]);
        $stripe = Stripe::make('sk_test_RWCq9Wopj90cA7JYtmzZmGpb');
        $customer = $stripe->customers()->create([
            'email' => $request->email,
            "source" => $request->stripeToken,
        ]);

        try {
            $charge = $stripe->charges()->create([
                'customer' => $customer['id'],
                'currency' => 'USD',
                'amount' => $request->donationAmt,
            ]);
            
            echo $charge['id'];
            return redirect()->back()->with('message','your amount charged successfully');
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with('error','your amount charged successfully');
        }
    }

}
