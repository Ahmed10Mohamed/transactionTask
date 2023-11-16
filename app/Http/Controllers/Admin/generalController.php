<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Repositories\GeneralRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;



class generalController extends Controller
{
    private GeneralRepository $generalRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(GeneralRepository $generalRepository){
        $this->generalRepository = $generalRepository;
    }
    public function users(){
         $users = $this->generalRepository->users();
        $class = 'users';
        return view('admin.pages.admins.users')->with(['users'=>$users,'class'=>$class]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



}
