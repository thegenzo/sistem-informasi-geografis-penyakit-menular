<?php

use App\Models\District;
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
        Schema::create('healthcare_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(District::class)->constrained();
            $table->string('name');
            $table->text('longitude');
            $table->text('latitude');
            $table->text('address');
            $table->enum('type', ['public_health_center', 'hospital']);
            $table->text('contact_information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healthcare_facilities');
    }
};
