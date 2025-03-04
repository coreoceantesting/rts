<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ChangeHolderPartner extends Model
{
    use HasFactory;

    public function partnerchange()
    {
        return $this->hasMany(PartnerChange::class);
    }
    protected $table ='business_partner_changes';
    protected $fillable =
    [
        'user_id',
        'ip',
        'zone',
        'application_no',
        'service_id',
        'aapale_sarkar_payment_date',
        'payment_date',
        'is_payment_paid',
        'is_payment_paid_aapale_sarkar',
        'status',
        'f_name',
        'm_name',
        'l_name',
        'mobile_num',
        'email',
        'aadhar_num',
        'propert_number',
        'resi_address',
        'owner_name',
        'owner_aadhar_num',
        'existing_name',
        'new_name',
        'owner_status',
        'business_type',
        'new_business_name',
        'reason',
        'partner_change_id',
        'application_doc'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
