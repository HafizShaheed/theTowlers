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

    public function addThirdParty(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'third_party_name' => 'required',
            'user_id' => 'required|exists:users,id',
            'third_party_email' => 'required',
            'zone_id' => 'required',
            'department_id' => 'required',
            'state_id' => 'required',


        ],[
            'user_id.required' => 'Please select client'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ];

            return response()->json($response);
        }

        $thirdParty =  ThirdParty::create([

            'third_party_name'=> $request->third_party_name,
            'user_id'=> $request->user_id,
            'third_party_address'=> $request->third_party_address,
           'department_id'=> $request->department_id,
            'third_party_pos'=> $request->third_party_pos,
            'zone_id'=> $request->zone_id,
            'state_id'=> $request->state_id,
            'third_party_email' => $request->third_party_email,
            'third_party_phone'=> $request->third_party_phone,
            'created_at' => now(),

        ]);
        // dd($thirdParty->id);
        if ($thirdParty) {
            $thirdPartyID = $thirdParty->id;
            if(isset($thirdPartyID) && !is_null($thirdPartyID)){
                $firmbackgound =FirmBackground::create([
                        'user_id' =>$request->user_id,
                        'third_party_id' => $thirdPartyID,
                        'created_at' => now(),
                    ]);
                Document::create([
                        'user_id' =>$request->user_id,
                        'third_party_id' => $thirdPartyID,
                        'created_at' => now(),
                    ]);
                OnGroundVerification::create([
                    'user_id' =>$request->user_id,
                    'third_party_id' => $thirdPartyID,
                    'created_at' => now(),
                ]);
                CourtCheck::create([
                    'user_id' =>$request->user_id,
                    'third_party_id' => $thirdPartyID,
                    'created_at' => now(),
                ]);
                BusinessIntelligence::create([
                    'user_id' =>$request->user_id,
                    'third_party_id' => $thirdPartyID,
                    'created_at' => now(),
                ]);
                TaxReurnCredit::create([
                    'user_id' =>$request->user_id,
                    'third_party_id' => $thirdPartyID,
                    'created_at' => now(),
                ]);
                MarketReputation::create([
                    'user_id' =>$request->user_id,
                    'third_party_id' => $thirdPartyID,
                    'created_at' => now(),
                ]);
                KeyObservation::create([
                    'user_id' =>$request->user_id,
                    'third_party_id' => $thirdPartyID,
                    'created_at' => now(),
                ]);
               $financial = Financial::create([
                    'user_id' =>$request->user_id,
                    'third_party_id' => $thirdPartyID,
                    'created_at' => now(),
                ]);
                $firmbackgoundID = $firmbackgound->id;
                $financialID = $financial->id;
                if(isset($firmbackgoundID) && !is_null($firmbackgoundID)){
                    License::create([
                        'firm_background_id' =>$firmbackgoundID,
                        'created_at' => now(),
                    ]);

                    FirstDirectorsFirm::create([
                        'firm_background_id' =>$firmbackgoundID,
                        'created_at' => now(),
                    ]);
                    SecondDirectorsFirm::create([
                        'firm_background_id' =>$firmbackgoundID,
                        'created_at' => now(),
                    ]);
                    ThirdDirectorsFirm::create([
                        'firm_background_id' =>$firmbackgoundID,
                        'created_at' => now(),
                    ]);
                }
                if(isset($financialID) && !is_null($financialID)){
                    FinancialsFindingsFyFive::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsFindingsFyFour::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsFindingsFyThree::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsFindingsFyOne::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsFindingsFyTwo::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsRatioAnalysisFyFive::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsRatioAnalysisFyFour::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsRatioAnalysisFyThree::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsRatioAnalysisFyOne::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                    FinancialsRatioAnalysisFyTwo::create([
                        'financial_id' =>$financialID,
                        'created_at' => now(),
                    ]);
                }
            }

            $response = [
                'success' => true,
                'message' => 'Add Third Party successfully! ',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed! ',
            ];
        }





        return response()->json($response);
    }

    function usersBlocked(){
        $data['users'] = User::where('status', '2')->latest()->get();

        return view('admin.users.blocked_users')->with($data);
    }

    public function addClient(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'user_name' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'industry' => 'required|string',
            'poc' => 'required|string',
            'zone_id' => 'required|string',
            'role_id' => 'required|string',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ], [
            'first_name.required' => 'Company Name is required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ];

            return response()->json($response);
        }

        User::create([
            'first_name' => $request->first_name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'industry' => $request->industry,
            'poc' => $request->poc,
            'zone_id' => $request->zone_id,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
            'status' => $request->clientStatusCheck == true ? 1 : 0,
            'created_at' => now()
        ]);

        $response = [
            'success' => true,
            'message' => 'Client created successfully.',
        ];

        return response()->json($response);
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







    function changeStatus($id, $status){

      $user= User::find(base64_decode($id));
      $user->status = $status;
      $user->save();

      return redirect()->back()->with('success', 'User Status Updated.');
    }


}
