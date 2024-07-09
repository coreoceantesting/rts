<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tax_demands', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('newtaxations', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('tax_exemptions', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('self_assessments', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('registration_of_objections', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('no_due_certificates', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('property_tax_issuance_of_property_tax_assessments', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('transfer_property_certificates', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('re_taxations', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });

        Schema::table('tax_exemption_non_resident_properties', function (Blueprint $table) {
            $table->after('is_aapale_sarkar_payment_paid', function (Blueprint $table) {
                $table->string('upic_id')->nullable();
                $table->string('application_no')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tax_demands', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('newtaxations', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('tax_exemptions', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('self_assessments', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('registration_of_objections', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('no_due_certificates', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('property_tax_issuance_of_property_tax_assessments', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('transfer_property_certificates', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('re_taxations', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });

        Schema::table('tax_exemption_non_resident_properties', function (Blueprint $table) {
            $table->dropColumn('upic_id');
            $table->dropColumn('application_no');
        });
    }
};
