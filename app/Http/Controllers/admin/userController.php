<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ThirdParty;
use App\Models\FirmBackground;
use App\Models\License;
use App\Models\FirstDirectorsFirm;
use App\Models\SecondDirectorsFirm;
use App\Models\ThirdDirectorsFirm;
use App\Models\OnGroundVerification;
use App\Models\CourtCheck;
use App\Models\Financial;
use App\Models\FinancialsFindingsFyFive;
use App\Models\FinancialsFindingsFyFour;
use App\Models\FinancialsFindingsFyThree;
use App\Models\FinancialsFindingsFyOne;
use App\Models\FinancialsFindingsFyTwo;
use App\Models\FinancialsRatioAnalysisFyFive;
use App\Models\FinancialsRatioAnalysisFyFour;
use App\Models\FinancialsRatioAnalysisFyThree;
use App\Models\FinancialsRatioAnalysisFyOne;
use App\Models\FinancialsRatioAnalysisFyTwo;
use App\Models\BusinessIntelligence;
use App\Models\TaxReurnCredit;
use App\Models\MarketReputation;
use App\Models\KeyObservation;
use App\Models\team\TeamUser;
use App\Models\Document;

use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;


class userController extends Controller
{
    //
    function usersAll(){
        $data['users'] = User::where('status', '1')->latest()->get();

        return view('admin.users.all_users')->with($data);
    }


    public function addTeamMember(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|unique:team_users',
            'team_email' => 'required|email|unique:team_users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ];

            return response()->json($response);
        }

        TeamUser::create([

            'user_name' => $request->user_name,
            'team_email' => $request->team_email,
            'password' => Hash::make($request->password),
            'status' => $request->clientStatusCheck == true ? 1 : 0,
            'created_at' => now()
        ]);

        $response = [
            'success' => true,
            'message' => 'Team Member created successfully.',
        ];

        return response()->json($response);
    }




}
