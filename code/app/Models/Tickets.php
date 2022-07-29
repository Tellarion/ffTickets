<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';

    protected $connection = 'mysqldb';

    protected $fillable = [
        'id',
        'name',
        'email',
        'status',
        'message',
        'comment',
        'timeleft_at',
        'created_at',
        'updated_at'
    ];

    use HasFactory;
}
