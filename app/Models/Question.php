<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'q_question';
    protected $primaryKey = 'id_que';
    public $incrementing = false;
    public $timestamps = false;
}
