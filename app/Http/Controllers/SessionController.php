<?php

namespace App\Http\Controllers;

use App\session;
use App\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dari frontend ke back end
        $session = $this->createData($request);

        if(is_null($session)){
            return redirect()->back()->with('error','No Term Has Been Created');

        }

        $session->save();
        return redirect()->back()->with('success','Session Have been Added');

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

    private function createData(Request $request)
    {
        $session = new session();
        $termid = $request->get('idTerm');
        $session->termID = $request->get('idTerm');
        $term =  DB::table('terms')->find($termid);;
        $session->session = $request->get('name') . ' - ' . $term->academic_year . ' - ' . $term->semester;
        $session->type = $request->get('type');
        $session->deadline = $request->get('deadline');
        return $session;
    }
}
