<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlinthCertificate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'service_id', 'aapale_sarkar_payment_date', 'status', 'status_remark', 'is_aapale_sarkar_payment_paid', 'payment_date', 'is_payment_paid', 'zone', 'ward', 'survey_no', 'applicant_name', 'applicant_mobile_no', 'applicant_full_address', 'plot_no', 'road', 'building_no', 'document', 'email_id', 'building_permission_no', 'application_no'];
}
