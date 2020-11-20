<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title'];


    public static function calculateStatus(){
        $total = self::count();
        $complete = self::where('status',1)->count();
        $pending = $total-$complete;
        return "$total Total, $complete Complete and $pending Pending.";
    }
}
