<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table="novels";
    protected $primaryKey="id_novel";
    protected $fillable=[
        'nama_novel',
        'penulis',
        'tgl_cetak',
        'deskripsi_novel',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
    ];
}
