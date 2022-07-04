<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CBank extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Bank::where('deleted','=', 1)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('jalandarat/bank/detail/'.$row->id_bank).'" data-toggle="tooltip"  data-id="'.$row->id_bank.'" class="detail btn btn-info btn-sm">Detail</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_bank.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBank">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_bank.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBank">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        
        return view('bank.bank');
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
        $request->validate([
            
            'logo.*' => 'mimes:JPG, JPEG, jpg, PNG, png|max:2000',
            
        ]);

        if ($request->hasfile('logo')) {            
            $logo = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('logo')->getClientOriginalName());
            $request->file('logo')->move(public_path('logo_bank'), $logo);
        }else{
            return response()->json(['error'=>'Logo gagal diinputkan.']);
        }

        $id = Auth::user()->id;
        Bank::updateOrCreate(['id_bank'=> $request->id], 
        ['nama_bank' => $request->nama_bank, 'no_rekening' => $request->no_rekening, 'atas_nama' => $request->atas_nama, 'logo' => $logo, 'created_by' => $id]);
        return response()->json(['success'=>'Data Berhasil Disimpan']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::find($id);
        $user = User::find($bank->created_by);
        return view('bank.detail_bank',['bank'=>$bank, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::find($id);
        return response()->json($bank);
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
        $hapus = Bank::find($id);
        $hapus->deleted = 0;
        $hapus->save();
        return response()->json(['success'=>'Bank deleted successfully.']);

    }
}
