<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'depart-id',
        'name',
        
    ];
    public function departs(){
        return $this ->belongsTo('App\departs' ,'depart-id');
    }
}
