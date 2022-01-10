<?php

namespace App\Http\Controllers;

use App\pkm;
use App\session;
use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;

class UploadController extends Controller
{
    private function moveToDisk($request){
        $title =  pkm::where('id',$request->get('idPkm'))->first()->title;
        $session = session::where('id', $request->get('session_id'))->first()->session;
        $sessionName = str_ireplace(" ", '', $session);
        $sessionName = str_ireplace("/", '-', $sessionName);
        $titleName = str_ireplace(" ",'', ucwords($title, " "));
        $file = $request->file('file');
        $tujuan_upload = $sessionName;
        $path = public_path($tujuan_upload);

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $nama_file = $titleName.'.'.$file->getClientOriginalExtension();
        $file->move($tujuan_upload,$nama_file);
//        return $tujuan_upload.'/'.$nama_file;
    }
    private function generatePkm()
    {
        $id = Auth::id();
        $pkm = pkm::where('user_id',$id)->first();
        return $pkm;
    }

    private function generateSession($id)
    {
        return \App\session::where('id',$id)->first();
    }

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
    private function checkExtension(Request $request){
        $file = $request->file('file');
        if($file->getClientOriginalExtension() == 'docx' || $file->getClientOriginalExtension() == 'doc'){
            return true;
        }else{
            return false;
        };
    }
    private function checkFileSize(Request $request){
        $file = $request->file('file');
        if($file->getSize() < 1024*5*1000){
            return true;
        }else{
            return false;
        };
    }
    public function store(Request $request)
    {
        if(!$this->checkExtension($request)){
            return back()->with('error', 'Incorrect Uploaded File Extension');
        }else if(!$this->checkFileSize($request)){
            return back()->with('error', 'Incorrect Uploaded File Size');
        }else {
//            $nama_file = $this->moveToDisk($request);
//
//                        $upload = Upload::where([['idPkm', $request->get('idPkm')],['session_id',$request->get('session_id')]])->get();
//
//                        if (sizeof($upload) == 1){
//                            //kalo cuman update data
//                            Upload::where([['idPkm', $request->idPkm],['session_id',$request->session_id]])
//                                ->update(['last_upload' => date("Y-m-d H:i:s",time())]);
//                        }else {
//
//                            //kalo belum pernah upload
//
//                            $upload = Upload::Create(
//                                [
//                                    'idPkm' => $request->idPkm,
//                                    'session_id' => $request->session_id,
//                                    'file' => $nama_file,
//                                    'last_upload' => date("Y-m-d H:i:s", time())
//                                ]
//                            );
//
//                            $idPkm = $request->get('idPkm');
//                            DB::table('pkms')
//                                ->where('id', '=', $idPkm)
//                                ->update(['status' => 'Uploaded','uploaded' => now()]);
//                        }
//                        return redirect()->route('home')->with('success', 'Pkm Have been Uploaded');
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
        $pkm = $this->generatePkm();
        $session = $this->generateSession($id);
        return view('user.upload')
            ->with('pkm', $pkm)
            ->with('session', $session);

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

    private function checkData(Request $request)
    {
    }
}
