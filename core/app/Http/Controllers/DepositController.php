<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->template = GeneralSetting::first()->theme == 1 ? 'frontend.' : 'theme2.';
    }
    public function deposit()
    {
        $gateways = Gateway::where('status', 1)->latest()->get();

        $pageTitle = "Payment Methods";

        $type = 'deposit';

        return view($this->template."user.gateway.gateways", compact('gateways', 'pageTitle', 'type'));
    }

    public function depositLog(Request $request)
    {
        $pageTitle = "Transactions";

        $transactions = Deposit::when($request->trx , function($item)use($request){ $item->where('transaction_id', $request->trx);})->
        when($request->date, function($item) use($request) {$item->whereDate('created_at', $request->date);})->where('user_id', auth()->id())->latest()->with('user')->where('payment_status',1)->paginate();

        return view($this->template.'user.deposit_log', compact('pageTitle', 'transactions'));
    }
}
