<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->char('company_code',100);
            $table->string('company_name');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->char('pincode',100);
            $table->char('address',200);
            $table->char('email_id',100);
            $table->char('phone_no',50);
            $table->char('fax_no',100);
            $table->char('website',200);
            $table->integer('registration_type');
            $table->char('logo',200);
            $table->boolean('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
