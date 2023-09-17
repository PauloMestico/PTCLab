<?php

namespace App\Http\Controllers;

use App\Models\ReferralSet;
use App\Models\User;
use Illuminate\Http\Request;

class ReferController extends Controller
{
    public function index()
    {
        $users = User::with("refLimit")->orderBy('id', 'desc')->paginate(10);

        return view('admin.referral.index', ['pageTitle' => "referral Page", 'users' => $users]);
    }

    public function store(Request $request)
    {
        try {
            ReferralSet::create([
               'user_id' => $request->userId,
               'limit' => $request->limit,
               'year_month' => $request->year_month,
            ]);
        } catch (\Exception $exception) {
            session()->flash('Set Referral Error',$exception->getMessage());
        }
        $notify[] = ['success', 'Referral Set successfully'];
        return back()->withNotify($notify);
    }
}
