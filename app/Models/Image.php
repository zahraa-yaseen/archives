<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
    use HasFactory;
    protected $fillable = [
        
        'image',
        'book_id',
        
    ];
public function book(){
    return $this ->belongsTo('App\Book' ,'book_id');
}

}
