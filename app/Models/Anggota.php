<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;
	
	public $incrementing = false;
	
	protected $primaryKey = 'No_Anggota';
	
	protected $fillable = [
        'No_Anggota', 'Nama', 'Wajib', 'Pokok', 'Saldo',
    ];
}
