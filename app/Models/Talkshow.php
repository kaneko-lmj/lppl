<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talkshow extends Model
{
    use HasFactory;
    // app/Models/Talkshow.php
    protected $fillable = ['judul', 'tanggal', 'jam_mulai' , 'jam_selesai' , 'narasumber' ,'youtube', 'facebook', 'poster'];

}
