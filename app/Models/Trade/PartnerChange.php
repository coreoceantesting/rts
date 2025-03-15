<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerChange extends Model
{
    use HasFactory;

    public function changeholderpartner()
    {
        return $this->belongsTo(ChangeHolderPartner::class);
    }
    protected $table ='partner_changes';
    protected $fillable = [
        'partner_change_id',
        'partner_name',
        'partner_aadhar',
        'partner_address',
        'partner_mobile_num',
        'partner_email',
        'partner_status'
    ];
}
