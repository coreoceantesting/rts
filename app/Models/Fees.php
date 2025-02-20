<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Fees extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'fees_masters';

    protected $fillable = ['service_name_id','fees'];
}
