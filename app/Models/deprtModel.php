<?php

namespace App\Models;
use App\Models\deprtModel;
use App\Models\studentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deprtModel extends Model
{
    use HasFactory;
    protected $table ='deprts';
    protected $fillable=[
    'student_id',
    'name',
   
    ];
    public function categorybelongsTo()
    {
        return $this->belongsTo(studentModel::class,'student_id');
    }
}
