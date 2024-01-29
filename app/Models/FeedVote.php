<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedVote extends Model
{
    use HasFactory;
    protected $table = 'q_feed_vote';
    protected $primaryKey = ['id_feed', "id_user"];
    public $incrementing = false;
    public $timestamps = false;
}
