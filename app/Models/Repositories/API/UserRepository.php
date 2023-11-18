<?php

namespace App\Models\Repositories\API;

use App\Http\Resources\ClientResource;
use App\Models\Admin;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function find_client($id){
        $client = User::findOrfail($id);
        return $client;
    }
    public function search_customer_with_phone($phone){
        $client = User::where('phone',$phone)->first();
        return $client;
    }
    public function update_profile($request){
        $data = $request->except(['_token']);
        $client  = $this->find_client(4);

       DB::beginTransaction();
       try {

                $client = $client->update($data);
                $user_data = new ClientResource($client);
                DB::commit();

                return $user_data;

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }

    }
    public function register($request)
    {

        $data = $request->except(['_token']);
        // $password = bcrypt($request->password);
        // $data['password']=$password;

       DB::beginTransaction();
       try {
                    $data['user_type'] ='customer';
                    $data['email_verified_at'] = date(('Y-m-d H:i:s'));
                    $user_login =  User::create($data);
                    $access_token = $user_login->createToken('TranactionTask')->accessToken;
                    $moredata['access_token']=$access_token->token;
                     $user_login->update($moredata);

                DB::commit();
                $user_data = new ClientResource($user_login);
                return $user_data;

        } catch (\Exception $e) {
        //    dd($e);
            DB::rollback();
           return 'error';
        }
    }
    public function login($request){
        $client = $this->search_customer_with_phone($request->phone);

            if($client === null)
            {
                return 'not_found';
            }else if(Hash::check($request->password, $client->password))
            {
                $access_token = $client->createToken('TranactionTask')->accessToken;
                $moredata['access_token']=$access_token->token;
                $client->update($moredata);
                $user_data = new ClientResource($client);
                return $user_data;
            }else{
                return 'this_password_not_correct';
            }

    }





    public function update($request,$id)
    {

         $client = $this->find_client($id);

        $data = $request->except(['_token']);

       DB::beginTransaction();
       try {


                $client->update($data);
            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
















}
