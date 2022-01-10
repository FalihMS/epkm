<?php

namespace App\Http\Controllers;

use App\pkm;
use App\user;
use App\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->authorizeRoles(['super_Admin','admin'])){

            //kalo admin ke direct ke admin

            return redirect('/admin');
        }



        if(!$this->havePkm()){

            //kalo ngga punya pkm dia direct bikin dulu
            return redirect('/pkm');
        }
            $pkm = $this->generatePkm();
            $sessions = $this->generateSession();
            return view('user.home')
                ->with('pkm', $pkm)
                ->with('sessions', $sessions);

    }
    private function havePkm()
    {
        $pkm = Auth::user()->Pkm;
        if (!isset($pkm)){

           return false;
        }else{

            return true;
        }

    }

    private function generatePkm()
    {
        $id = Auth::id();
        $pkm = pkm::where('user_id',$id)->first();
        return $pkm;
    }

    private function generateSession()
    {
        $id = Auth::id();
        $pkm = pkm::where('user_id',$id)->first();
        $session = session::where('type',$pkm['type'])-> get();
        return $session;
    }
}
