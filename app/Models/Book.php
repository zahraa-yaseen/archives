<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_type_id',
        'book_no',
        'book_date',
        'book_details',
       'book_to_from',
        'cover',
        'depart_id',
        'user_id',
        'division_id'
    ];
    public function booktype(){
        return $this->belongsTo('App\BookType','book_type_id' );
    }
    public function image(){
        return $this->hasMany(Image::class );
                               
 
 
 
 
 }
}
