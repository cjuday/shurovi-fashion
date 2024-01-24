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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('commonName');
            $table->string('officialName');
            $table->string('tld');
            $table->string('cca2');
            $table->string('ccn3');
            $table->string('cca3');
            $table->string('cioc');
            $table->integer('independent');
            $table->string('status');
            $table->integer('unMember');
            $table->string('root');
            $table->string('suffixes');
            $table->string('capital');
            $table->string('region');
            $table->integer('population');
            $table->string('latlng');
            $table->string('demonym');
            $table->string('area');
            $table->string('timezones');
            $table->string('borders');
            $table->string('nativeName');
            $table->string('numericCode');
            $table->string('currencies');
            $table->string('languages');
            $table->string('regionalBlocks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
