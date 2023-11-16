<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Repositories\ProfileRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Validators\ProfileValidators;
class ProfileController extends Controller
{
    private ProfileValidators $profileValidator;
    private ProfileRepository $profileRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProfileValidators $profileValidator ,ProfileRepository $profileRepository){
        $this->profileRepository = $profileRepository;
        $this->profileValidator = $profileValidator;
    }
    public function index(){
          $class = 'profile';

        return view('admin.pages.profile.account_setting',compact('class'));
    }
    public function lang(){
        $class="lang";
        return view('admin.pages.profile.lang',compact('class'));
    }
    public function check_lang(){
      
        return redirect($this->profileRepository->check_lang());
     }
     public function update_lang(Request $request){

         $url =$this->profileRepository->update_lang($request);
         return redirect($url)->with('success','Language Updated Success');

       }
    public function update_profile(Request $request){

        $validator = $this->profileValidator->validate($request);
        if ($validator) {
            return $validator;
        }
        $data = $this->profileRepository->update_profile($request);
        if($data === 'error'){
            return redirect()->back()->with('fail',translate('Something is wrong! Try later'));
        }else{
            return redirect()->back()->with('success',translate('Data Updated Success'));

        }
    }
     public function security()
    {
            $class = 'change_pssword';

            return view('admin.pages.profile.change_password',compact('class'));
    }
      public function update_password(Request $request){

        $validator = $this->profileValidator->update_password($request);
        if ($validator) {
            return $validator;
        }
        $data = $this->profileRepository->update_password($request);
        if($data === 'error'){
            return redirect()->back()->with('fail',translate('Something is wrong! Try later'));
        }else{
            return redirect()->back()->with('success',translate('Password Changed Success'));

        }

    }


}
