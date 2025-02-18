<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class DemolishingProperty extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
       'ip',
       'zone',
       'f_name',
       'm_name',
       'l_name',
       'marathi_f_name',
       'marathi_m_name',
       'marathi_l_name',
       'mobile_num',
       'aadhar_num',
       'email',
       'address',
       'marathi_address',
       'purpose',
       'marathi_purpose'
   ];

   protected static function boot()
   {
       parent::boot();

       static::creating(function ($model) {
           $model->ip = Request::ip();
       });
   }
}
