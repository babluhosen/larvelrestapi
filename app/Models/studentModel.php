<?php

namespace App\Models;
use App\Models\studentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentModel extends Model
{
    use HasFactory;
    protected $table ='students';
    protected $fillable=[
    'name',
    'email',
    'phone',
    'course',
   
    ];
    
}
