<?php

namespace App\Http\Controllers;

use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermController extends Controller
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
        //
        $term = $this->createData($request);
        $term->save();
        return redirect()->back()->with('success','Term Have been Added');

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

    public function update_status(Request $request)
    {
        $entah = $request->get('id');
        $term = DB::table('terms')->where('id', '=', $request->get('id'))->pluck('status')->first();
        if ($term == "active"){
            $entah = "inactive";
        }else{
            $entah = "active";
        }
        term::where('id',$request->get('id'))->update([
            'status' => $entah
        ]);
        return redirect()->back()->with('success',$term);
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

    private function createData(Request $request){
        $term = new term();
        $error = 0;
        $name = $request->get('academic_year1') . '/' . $request->get('academic_year2');;
        $term->academic_year = $name;
        $term->semester = $request->get('semester');
        $term->status = 'active';
        return $term;
    }
}
