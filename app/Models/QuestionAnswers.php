<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswers extends Model
{
    use HasFactory;

    protected $table = 'q_que_ans';
    protected $primaryKey = 'id_ans';
}
