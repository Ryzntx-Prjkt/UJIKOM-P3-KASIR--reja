<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use Loggable;
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
