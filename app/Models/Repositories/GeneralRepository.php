<?php

namespace App\Models\Repositories;
use App\Models\User;


class GeneralRepository {
    public function users(){
        $users = User::where('user_type','customer')->orderBy('id', 'DESC')->get();
        return $users;
    }

}
