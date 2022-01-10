<?php

namespace App\Http\Controllers;

use App\ClassLecturer;
use App\lecturer;
use App\pkm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PkmController extends Controller
{
    public function createData($request){
        $pkm = new pkm();
        $pkm->user_id = Auth::id();
        $pkm->title = $request->get('title');
        $pkm->type = $request->get('type');
        $pkm->lecturer_id = $request->get('idLecturer');
        $pkm->class = $request->get('class');
        $pkm->member_1_nim = $request->get('member_1_nim');
        $pkm->member_1_nama = $request->get('member_1_nama');
        $pkm->member_2_nim = $request->get('member_2_nim');
        $pkm->member_2_nama = $request->get('member_2_nama');
        $pkm->status = 'Not Upload';
        $pkm->created = Carbon::now();
        return $pkm;
    }
    public function getClass($id){
//        $class = DB::table("class_lecturers")->where("id_lecturer",$id)->pluck("name","id");
        $class = ClassLecturer::where('lecturer_id', $id)->get();
        return json_encode($class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = $user['id'];
        $lecturers = lecturer::all();
        return view('user.create_pkm')
            ->with('lecturers', $lecturers)
            ->with('id',$id);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data masuk
        if ($this->checkData($request)) {

            //dari frontend ke back end
            $pkm = $this->createData($request);

            //save data
            $pkm->save();
            return redirect()->route('home')->with('success', 'Pkm Have been Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function checkData($request)
    {
        return true;
    }
}
