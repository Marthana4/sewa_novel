<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\Novel;
use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $transaksi= Transaksi::select('transaksis.*', 'users.nama as nama_penyewa', 'novels.nama_novel as nama_novel')
        ->join('users', 'transaksis.id', '=', 'users.id')
        ->join('novels', 'transaksis.id_novel', '=', 'novels.id_novel')
        ->where('users.nama','LIKE','%'.$keyword.'%')
        ->orWhere('novels.nama_novel','LIKE','%'.$keyword.'%')
        ->paginate(10);
        return view('admin.pengembalianNovel',compact('transaksi','keyword'));
        // return response()->json(['status'=>'Success', 'data'=>['content'=>$transaksi]], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $namaPengguna = Auth::user()->nama;
        $tglJatuhTempo = date('Y-m-d', strtotime('+7 days', strtotime(date("Y-m-d"))));

        $transaksi = Novel::leftJoin('transaksis', 'novels.id_novel', '=', 'transaksis.id_novel')
        ->select('novels.*')
        ->whereNull('transaksis.id_transaksi')
        ->orWhere('transaksis.status', 'dikembalikan')
        ->get();

        return view('penyewa.formPersewaan', compact('transaksi', 'namaPengguna', 'tglJatuhTempo'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "id_novel" => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson(), 400);
        } else {
            $input = $request->input();
            try {
                $data = new Transaksi;
                $data->id = auth()->user()->id;
                $data->id_novel = $request->id_novel;
                $data->tgl_jatuh_tempo = date('Y-m-d', strtotime('+7 days', strtotime(date("Y-m-d"))));
                $data->status = 'dipinjam';
                $data->created_by = auth()->user()->id;
                $data->created_at = Carbon::now();
                $data->updated_at = 0;
                $data->updated_at = null;

                $data->save();
                return redirect('/penyewa-dashboard');
                // return response()->json(['status'=>'success', 'data' => [
                //     'message' => 'Data berhasil ditambah'
                // ]], 200);
            } catch (Exception $e) {
                return redirect()->back()->with('message', 'Data gagal ditambah');
                // return response()->json(['error'=>'Data gagal ditambah','message'=>$e], 500);
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi= Transaksi::where('id_transaksi', $id)
        ->select('transaksis.*', 'users.nama as nama_penyewa', 'novels.nama_novel as nama_novel')
        ->join('users', 'transaksis.id', '=', 'users.id')
        ->join('novels', 'transaksis.id_novel', '=', 'novels.id_novel')
        ->first();
        return view('admin.editTransaksi', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'Invalid request');
        }

        try {
            $data = Transaksi::find($id);

            $data->status = 'dikembalikan';
            $data->updated_by = auth()->user()->id;
            $data->updated_at = Carbon::now();

            $data->update();

            return redirect('/admin-transaksi')->with('success', 'Data updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update data');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transaksi::where('id_transaksi', $id)->delete();
        return redirect('/admin-transaksi');

        // if ($data) {
        //     return response()->json(['status'=>'Data berhasil dihapus']);
        // } else {
        //     return response()->json(['status'=>'Data gagal dihapus']);
        // }
    }
}
