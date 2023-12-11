<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'depart_id',
        'name',
        
    ];
    public function depart(){
        return $this->belongsTo('App\Depart','depart_id' );
    }
    
}
