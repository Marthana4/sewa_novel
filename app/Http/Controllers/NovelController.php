<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use App\Models\Novel;
use Carbon\Carbon;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $novel = Novel::where('nama_novel', 'LIKE', '%' . $keyword . '%')
        ->orWhere('penulis', 'LIKE', '%' . $keyword . '%')
        ->paginate(10);
        return view('admin.novel',compact('novel','keyword'));
        // return response()->json(['status'=>'Success', 'data'=>['content'=>$novel]], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $novel = new Novel;
        return view('admin.tambahNovel',compact('novel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "nama_novel" => 'required|string|max:50',
            "penulis" => 'required|string|max:255',
            "tgl_cetak" => 'required|date',
            "deskripsi_novel" => 'required|string|max:500',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson(), 400);
        } else {
            $input = $request->input();
            // $inputTanggal = $request->tgl_cetak;
            // $tanggalCetak = \Carbon\Carbon::createFromFormat('d/m/Y', $inputTanggal)->format('Y-m-d');
            try {
                $data = new Novel;
                $data->nama_novel = $request->nama_novel;
                $data->penulis = $request->penulis;
                $data->tgl_cetak = $request->tgl_cetak;
                $data->deskripsi_novel = $request->deskripsi_novel;
                $data->created_by = auth()->user()->id;
                $data->created_at = Carbon::now();
                $data->updated_at = 0;
                $data->updated_at = null;

                $data->save();
                return redirect('/admin-novel');
                

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
        $novel = Novel::where('id_novel', $id)->first();
        return view('admin.editNovel', compact('novel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            "nama_novel" => 'required|string|max:50',
            "penulis" => 'required|string|max:255',
            "tgl_cetak" => 'required|date',
            "deskripsi_novel" => 'required|string|max:500',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson(), 400);
        } else {
            // $inputTanggal = $request->tgl_cetak;
            // $tanggalCetak = \Carbon\Carbon::createFromFormat('d-m-Y', $inputTanggal)->format('Y-m-d');
            try {
                $data = Novel::find($id);
                $data->nama_novel = $request->nama_novel;
                $data->penulis = $request->penulis;
                $data->tgl_cetak = $request->tgl_cetak;
                $data->deskripsi_novel = $request->deskripsi_novel;
                $data->updated_by = auth()->user()->id;
                $data->updated_at = Carbon::now();

                $data->update();
                return redirect('/admin-novel');
                // return response()->json(['status'=>'success', 'data' => [
                //     'message' => 'Data berhasil di update'
                // ]], 200);
            } catch (Exception $e) {
                return redirect()->back()->with('message', 'Data gagal ditambah');
                // return response()->json(['error'=>'Data gagal di update','message'=>$e], 500);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Novel::where('id_novel', $id)->delete();
        return redirect('/admin-novel');

        // if ($data) {
        //     return response()->json(['status'=>'Data berhasil dihapus']);
        // } else {
        //     return response()->json(['status'=>'Data gagal dihapus']);
        // }
    }
}
