<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpan extends Model
{
    use HasFactory;
	
	public $incrementing = false;
	
	protected $primaryKey = 'No_Simpan';
	
	protected $fillable = [
        'No_Simpan', 'No_Anggota', 'JmlSimpan', 'KodeKsr',
    ];
}
