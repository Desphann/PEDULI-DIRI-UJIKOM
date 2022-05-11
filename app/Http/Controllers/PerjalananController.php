<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PerjalananController extends Controller
{
    public function index(){
        $data = DB::table('perjalanans')
        ->join('users', 'users.id', '=', 'perjalanans.id_user')
        ->select('users.email','perjalanans.id','perjalanans.tanggal', 'perjalanans.jam', 'perjalanans.lokasi', 'perjalanans.suhu')
        ->where('users.name', '=', auth()->user()->name)
        ->get();
        return view('pages.table', ['data'=>$data]);
    }
    
    public function halamanInput(){
        return view('pages.input');
    }

    public function saveInput(Request $request){
        $data=[
            'id_user'=>auth()->user()->id,
            'tanggal'=>$request->tanggal,
            'jam'=>$request->jam,
            'lokasi'=>$request->lokasi,
            'suhu'=>$request->suhu
        ];

        // dd($data);
        perjalanan::create($data);
        return redirect('/input')->with('succes', 'Data Berhasil Dibuat');
    }

    public function deletePerjalanan(Request $request){
        Perjalanan::find((int) $request->id)->delete();
        return redirect('/table');
    }

    public function cariPerjalanan(Request $request)
    {
        if(!empty($request->input('lokasi')) && empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam')))
        {
            $cari = $request->lokasi;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->where(function ($query) use($cari){
                $query->where('users.name', auth()->user()->name)
                    ->where('perjalanans.lokasi', 'LIKE' , '%'.$cari.'%');
            })->get();
            if ($data) {
                return view('pages.table', ['data'=>$data]);
            } else {
                abort(400);
            }
        }else if(empty($request->input('lokasi')) && !empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam')))
        {
            $cari = $request->suhu;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->where(function ($query) use($cari){
                $query->where('users.name', auth()->user()->name)
                    ->where('perjalanans.suhu', 'LIKE' , '%'.$cari.'%');
            })->get();
            if ($data) {
                return view('pages.table', ['data'=>$data]);
            } else {
                abort(400);
            }
        }else if(empty($request->input('lokasi')) && empty($request->input('suhu')) && !empty($request->input('tanggal')) && empty($request->input('jam')))
        {
            $cari = $request->tanggal;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->where(function ($query) use($cari){
                $query->where('users.name', auth()->user()->name)
                    ->where('perjalanans.tanggal', 'LIKE' , '%'.$cari.'%');
            })->get();
            if ($data) {
                return view('pages.table', ['data'=>$data]);
            } else {
                abort(400);
            }
        }else if(empty($request->input('lokasi')) && empty($request->input('suhu')) && empty($request->input('tanggal')) && !empty($request->input('jam')))
        {
            $cari = $request->jam;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->where(function ($query) use($cari){
                $query->where('users.name', auth()->user()->name)
                    ->where('perjalanans.jam', 'LIKE' , '%'.$cari.'%');
            })->get();
            if ($data) {
                return view('pages.table', ['data'=>$data]);
            } else {
                abort(400);
            }
        }else{
        $data = DB::table('perjalanans')
        ->join('users', 'users.id', '=', 'perjalanans.id_user')
        ->select('users.email', 'perjalanans.tanggal', 'perjalanans.jam', 'perjalanans.lokasi', 'perjalanans.suhu')
        ->where('users.name', '=', auth()->user()->name)
        ->get();
        return view('pages.table', ['data'=>$data]);
        }
    }
}
