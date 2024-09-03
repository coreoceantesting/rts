<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingAapaleSarkarData extends Model
{
    use HasFactory;

    protected $fillable = ['application_no', 'service_id', 'user_id'];
}
