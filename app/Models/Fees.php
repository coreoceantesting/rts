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

    public function service()
    {
        return $this->belongsTo(ServiceName::class, 'service_name_id', 'id');
    }

    protected $table = 'fees_masters';

    protected $fillable = ['service_name_id','fees'];
}
