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
        'cover',
        'depart_id',
        'user_id',
        'division_id'
    ];
    public function depart(){
        return $this ->belongsTo('App\Depart' ,'depart_id');
    }
    public function division(){
        return $this ->belongsTo('App\Division' ,'division_id');
    }
    public function book_type(){
        return $this ->belongsTo('App\Book_Type' ,'book_type_id');
    }
    public function user(){
        return $this ->belongsTo('App\User' ,'user_id');
    }
}
