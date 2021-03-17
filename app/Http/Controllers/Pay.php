<?php

namespace App\Http\Controllers;

use App;
use App\model\paymenttoken;
use App\model\userMoney;
use Auth;
use Illuminate\Http\Request;
use Log;

class Pay extends Controller
{
    public function index()
    {
        return view('payment.buycoins');
    }

    public function payconfirm(Request $request)
    {
        $this->validate($request, [
            'totalcoins' => 'required|integer',
        ]);

        $coins = (int) $request->input('totalcoins');

        if ($coins >= 100) {
            $amount = $coins - floor($coins * 5 / 100);
        }

        if ($coins >= 200) {
            $amount = $coins - floor($coins * 10 / 100);
        }

        if ($coins >= 400) {
            $amount = $coins - floor($coins * 15 / 100);
        }

        if ($coins >= 800) {
            $amount = $coins - floor($coins * 20 / 100);
        }

        if ($coins >= 1600) {
            $amount = $coins - floor($coins * 25 / 100);
        }

        if ($coins >= 4000) {
            $amount = $coins - floor($coins * 30 / 100);
        }

        if ($coins < 100) {
            $amount = $coins;
        }

        if ($coins < 10) {
            $amount = 10;
            $coins = 10;
        }
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999).mt_rand(1000000, 9999999).$characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);
        $paymenttoken = new paymenttoken;
        $paymenttoken->token = $string;
        $paymenttoken->user_id = Auth::id();
        $paymenttoken->coins = $coins;
        $paymenttoken->amount = $amount;
        $paymenttoken->save();

        return view('payment.buyconfirm')->with('token', $paymenttoken);
    }

    public function payResponse(Request $reqeust)
    {
        Log::info($reqeust->all());
        if ($reqeust->input('payment_status') != 'Completed') {
            return;
        }

        $record = paymenttoken::where('token', '=', $reqeust->input('item_number'))->where('verify', '=', null)->first();

        if ($record->count()) {
            if ($reqeust->input('mc_gross') >= $record->mc_gross) {
                $usermoney = userMoney::where('user_id', '=', $record->user_id)->increment('amount', $record->coins);
                $record->verify = true;
                $record->save();

                return 1;
            }
        }
    }
}
