<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table="transaksis";
    protected $primaryKey="id_transaksi";
    protected $fillable=[
        'id',
        'id_novel',
        'tgl_jatuh_tempo',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
    ];

    public function barang()
    {
        return $this->belongsto('App\Models\Novel', 'id_transaksi', 'id_transaksi');
    }   

    public function user()
    {
        return $this->belongsto('App\Models\User', 'id', 'id');
    }
}
