<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seast extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'group_id', 'seats_name', 'user_id', 'status'
    ];
}
