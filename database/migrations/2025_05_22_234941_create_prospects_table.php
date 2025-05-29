<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('prospects', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('contact_number');
        $table->string('email_address');
        $table->text('business_address')->nullable();
        $table->text('home_address')->nullable();
        $table->string('limited_company')->nullable();
        $table->string('limited_company_number')->nullable();
        $table->string('charity')->nullable();
        $table->string('sole_trader')->nullable();
        $table->string('current_supplier_gas')->nullable();
        $table->string('current_supplier_electricity')->nullable();
        $table->date('contract_end_date_gas')->nullable();
        $table->date('contract_end_date_electricity')->nullable();
        $table->string('mprn_number')->nullable();
        $table->string('mpan_number')->nullable();
        $table->string('eac')->nullable();
        $table->string('aq')->nullable();
        $table->string('bank_name')->nullable();
        $table->string('bank_account_name')->nullable();
        $table->string('account_number')->nullable();
        $table->string('sort_code')->nullable();
        $table->unsignedBigInteger('assignee_id')->nullable();
        $table->text('additional_details')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospects');
    }
};
