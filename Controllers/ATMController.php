<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ATMController extends Controller
{
    public function index()
    {
        return view('pages.atm');
    }

    public function withdraw(Request $request)
    {    
        $amount = (int) $request->input('amount');

        if($amount % 100 !== 0)
        {
            return response()->json([
                'status' => 'error',  
                'message'=> 'Please enter a valid amount.'
            ]);
        }

        $bills = [1000, 500, 200, 100];
        $resultS = [];
    
        foreach ($bills as $bill) {
            $count = intdiv($amount, $bill);
            if ($count > 0) 
            {
                $result[] = "<p>$count bill(s) of P $bill</p>";
                $amount -= $count * $bill;
            }
        }
        
        return response()->json([
            'status' => 'success',
            'bills' => $result
        ]);
    }
}
