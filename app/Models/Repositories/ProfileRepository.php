<?php

namespace App\Models\Repositories;
use App\Interfaces\ImageVideoUpload;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Mail\SignatureEmailVisitor;
use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Session;

class ProfileRepository
{
    private ImageVideoUpload $ImageUpload;
    public function __construct(ImageVideoUpload $ImageUpload)
    {
        $this->ImageUpload = $ImageUpload;
    }

    public function check_lang(){
        LaravelLocalization::setLocale(user()->lang);
        Session::forget('first_visit','first visit');
        Session::put('first_visit','first visit');
        $prev = url()->previous();
        $lng = explode('/', $prev);
        $url = str_replace($lng[3], user()->lang, $prev);
      return $url;
    }
    public function lang(){
        $class="lang";
        return view('admin.pages.profile.lang',compact('class'));
    }
    public function update_lang($request){
        $user = User::findOrfail(user()->id);
        $user->lang = $request->lang;
        $user->save();
        LaravelLocalization::setLocale(user()->lang);
        Session::forget('first_visit','first visit');
        Session::put('first_visit','first visit');

        $prev = url()->previous();
        $lng = explode('/', $prev);

        $url = str_replace($lng[3], $user->lang, $prev);
        return $url;

    }
    public function update_profile($request)
    {

        $request_image = $request->file('image');
       $model = 'User';
       DB::beginTransaction();
       try {
           $admin = User::find(user()->id);
                $admin->name  = $request->name;
                $admin->user_name  = $request->user_name;
                $admin->phone = $request->phone;
                $admin->email = $request->email;
             if($request->hasFile('image')){

                 $admin->image = $this->ImageUpload->StoreImageSingle($request_image,$model);
                }

            $admin->save();
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            //  dd($e);
           return 'error';
        }


    }
    public function update_password($request)
    {

       DB::beginTransaction();
       try {
           $admin = User::find(user()->id);
            if(!Hash::check($request->current_password, $admin->password))
            {
                return redirect()->back()->withInput()->withErrors(['current_password'=>translate('Current Password Not Correct')]);
            }
            else
            {
                $admin->password = bcrypt($request->password);
            }

            $admin->save();

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            //  dd($e);
           return 'error';
        }


    }














}
