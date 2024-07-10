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
        Schema::table('newtaxations', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('no_due_certificates', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('property_tax_issuance_of_property_tax_assessments', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('registration_of_objections', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('re_taxations', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('self_assessments', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('tax_demands', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('tax_exemptions', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('tax_exemption_non_resident_properties', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });

        Schema::table('transfer_property_certificates', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->integer('service_id')->nullable();
                $table->date('aapale_sarkar_payment_date')->nullable();
                $table->date('status')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newtaxations', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('no_due_certificates', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('property_tax_issuance_of_property_tax_assessments', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('registration_of_objections', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('re_taxations', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('self_assessments', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('tax_demands', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('tax_exemptions', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('tax_exemption_non_resident_properties', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });

        Schema::table('transfer_property_certificates', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('aapale_sarkar_payment_date');
            $table->dropColumn('status');
        });
    }
};
