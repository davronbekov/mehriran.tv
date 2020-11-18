<?php


namespace App\Http\Controllers\Web;

use Exception;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex(Request $request){
        $user = $request->user();

        return view('pages.profile.index', [
            'user' => $user,
        ]);
    }

    public function actionChangePassword(Request $request){
        return view('pages.profile.change_password');
    }

    public function actionUpdatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password_1' => 'required',
            'new_password_2' => 'required_with:new_password_1|same:new_password_1',
        ]);

        if($validator->fails()){
            return redirect(route('profile.changePassword', ['lang' => app()->getLocale()]))->with('error', $validator->getMessageBag()->first());
        }

        $user = $request->user();
        $old_password = $request->input('old_password');
        if(Hash::check($old_password, $user->password)){
            try{
                $user->password = Hash::make($request->input('new_password_1'));
                $user->save();

                return redirect(route('profile.changePassword', ['lang' => app()->getLocale()]))->with('success', 'Changed!');

            }catch (Exception $exception){
                return redirect(route('profile.changePassword', ['lang' => app()->getLocale()]))->with('error', $exception->getMessage());
            }
        }else{
            return redirect(route('profile.changePassword', ['lang' => app()->getLocale()]))->with('error', 'Incorrect password!');
        }
    }
}
