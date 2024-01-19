<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedItem extends Model
{
    use HasFactory;
    protected $table = 'q_feed_item';
    protected $primaryKey = 'id_feed';
}
