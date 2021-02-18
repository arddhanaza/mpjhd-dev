<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktorPembobotanUtama extends Model
{
    use HasFactory;
    protected $table = 'faktor_pembobotan_utama';
    protected $primaryKey = 'id_pembobotan';
}
