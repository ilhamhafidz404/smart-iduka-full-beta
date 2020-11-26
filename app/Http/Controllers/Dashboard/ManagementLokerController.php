<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostLoker;
use DataTables;

class ManagementLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexnotpending(Request $request)
    {
            $postPending = PostLoker::where('status','pending')->get();
            $postNotPending = PostLoker::where('status','!=','pending')->get();


            if ($request->ajax()) {
                $data = PostLoker::where('status','!=','pending')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('company_name',function($data){
                            return $data->user->profileCompany->name;
                        })
                        ->addColumn('action', function($row){
       
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook"><i class="fas fa-edit"></i></a>';
       
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook"><i class="fas fa-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action','company_name'])
                        ->make(true);
            }

            return view('dashboard.loker.indexnotpending',compact('postPending','postNotPending'));
    }


     public function indexpending(Request $request)
    {
            


            if ($request->ajax()) {
                $data = PostLoker::where('status','pending')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('company_name',function($data){
                            return $data->user->profileCompany->name;
                        })
                        ->addColumn('kategori', function($row){
                            return $row->kategori->name;
                             
                        })
                        ->addColumn('action', function($row){
       
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook"><i class="fa fa-info" aria-hidden="true"></i> Tinjau</a>';
       
                                return $btn;
                        })
                        ->rawColumns(['action','company_name','kategori'])
                        ->make(true);
                }

        return view('dashboard.loker.indexpending');
    }

   
    public function tinjauGet($id)
    {
        $post = PostLoker::where('id',$id)->first();

        return view('dashboard.loker.tinjau',compact('post'));
    }

    public function tinjauPost(Request $request,$id)
    {
        PostLoker::where('id',$id)->update(['status' => $request->status]);

        return redirect()->route('management.loker.indexpending');
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
        $data = PostLoker::find($id);
        return response()->json($data);
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
}
