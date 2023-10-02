<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_type_id',
        'book_no',
        'book_date',
        'book_details',
        'depart-id',
        'division-id'
    ];
    public function departs(){
        return $this ->belongsTo('App\departs' ,'depart-id');
    }
    public function divisions(){
        return $this ->belongsTo('App\divisions' ,'division-id');
    }
    public function book_types(){
        return $this ->belongsTo('App\book_types' ,'book_type_id');
    }
}
