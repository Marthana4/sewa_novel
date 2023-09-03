<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Novel;
use DB;

class LaporanController extends Controller
{
    public function laporanPeminjamanAktif()
    {
        $peminjamanAktif = Transaksi::select('transaksis.*', 'users.nama as nama_penyewa', 'novels.nama_novel as nama_novel')
        ->join('users', 'transaksis.id', '=', 'users.id')
        ->join('novels', 'transaksis.id_novel', '=', 'novels.id_novel')
        ->where('status', 'dipinjam')
        ->get();
        return view('admin.laporan.peminjamanAktif', compact('peminjamanAktif'));
    }

    public function laporanTransaksiPeminjaman()
    {
        $transaksiPeminjaman = Transaksi::select('transaksis.*', 'users.nama as nama_penyewa', 'novels.nama_novel as nama_novel')
        ->join('users', 'transaksis.id', '=', 'users.id')
        ->join('novels', 'transaksis.id_novel', '=', 'novels.id_novel')
        ->where('status', 'dikembalikan')
        ->get();
        return view('admin.laporan.transaksiPeminjaman', compact('transaksiPeminjaman'));
    }

    public function laporanNovelTersedia()
    {
        $novelTersedia = Novel::leftJoin('transaksis', 'novels.id_novel', '=', 'transaksis.id_novel')
        ->select('novels.*')
        ->whereNull('transaksis.id_transaksi')
        ->orWhere('transaksis.status', 'dikembalikan')
        ->get();
    
        return view('admin.laporan.stokNovelTersedia', compact('novelTersedia'));
    }    

    public function laporanNovelTersewa()
    {
        $novelTersewa =Novel::join('transaksis', 'novels.id_novel', '=', 'transaksis.id_novel')
        ->select('novels.*')
        ->Where('transaksis.status', 'dipinjam')
        ->get();
        
        return view('admin.laporan.stokNovelTersewa', compact('novelTersewa'));
    }

    public function laporanMutasiStok()
    {
        $mutasiMasukNovel = Novel::select('id_novel', 'nama_novel', 'penulis', 'created_at as tanggal_mutasi', DB::raw("'masuk' as status"))
        ->get();

        $mutasiKeluarTransaksi = Transaksi::select('transaksis.id_novel', 'novels.nama_novel', 'novels.penulis', 'transaksis.created_at as tanggal_mutasi', DB::raw("'keluar' as status"))
        ->join('novels', 'transaksis.id_novel', '=', 'novels.id_novel')
        ->where('transaksis.status', 'dipinjam')
        ->get();

        $mutasiMasukTransaksi = Transaksi::select('transaksis.id_novel', 'novels.nama_novel', 'novels.penulis', 'transaksis.updated_at as tanggal_mutasi', DB::raw("'masuk' as status"))
        ->join('novels', 'transaksis.id_novel', '=', 'novels.id_novel')
        ->where('transaksis.status', 'dikembalikan')
        ->get();

        $mutasiStok = $mutasiMasukNovel->concat($mutasiKeluarTransaksi)->concat($mutasiMasukTransaksi);
        $mutasiStok = $mutasiStok->sortBy('tanggal_mutasi');

        return view('admin.laporan.mutasiStokNovel', compact('mutasiStok'));
    }
}
