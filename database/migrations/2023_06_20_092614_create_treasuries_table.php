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
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->boolean("is_master")->default(0)->comment("principal -> 1, secondary -> 0");
            $table->bigInteger("last_exchange")->nullable();
            $table->bigInteger("last_collect")->nullable();
            $table->integer("com_code");
            $table->boolean("active")->default(1);
            $table->date("date")->comment("for search");
            $table->integer("added_by");
            $table->integer("updated_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treasuries');
    }
};
