<?php

namespace App\Http\Controllers;

use App\Models\ReferralSet;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ReferController extends Controller
{
    public function index()
    {
        $users = ReferralSet::with("user")->orderBy('id', 'desc')->paginate(10);

        return view('admin.referral.index', ['pageTitle' => "referral Page", 'users' => $users]);
    }

    public function update(Request $request)
    {
        try {
            $userRef = ReferralSet::whereUser_id($request->userId)->first();
            $userRef->update([
                'limit' => $request->limit,
                'year_month' => $request->year_month,
            ]);

            $notify[] = ['success', 'Referral Set successfully'];
            return back()->withNotify($notify);
        } catch (\Exception $exception) {
            session()->flash('Set Referral Error', $exception->getMessage());
            $notify[] = ['error', 'Referral Set Unsuccessfully'];
            return back()->withNotify($notify);
        }
    }

    public function getUserData(Request $request)
    {
        $userId = $request->input('userId');
        $userData = ReferralSet::where('user_id', $userId)->first();

        if (!$userData) {

            return response()->json(['error' => 'User not found'], 404);
        }

        $responseData = [
            'limit' => $userData->limit,
            'year_month' => date('Y-m-d', strtotime($userData->year_month)),
        ];

        return response()->json($responseData);
    }

}
