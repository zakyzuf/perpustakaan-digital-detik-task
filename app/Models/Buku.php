<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Buku extends Model
{
    use HasFactory;

    protected $table = "buku";

    protected $fillable = ["judul", "id_kategori", "id_user", "deskripsi", "jumlah", "cover", "file", "slug", "created_at", "updated_at"];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
