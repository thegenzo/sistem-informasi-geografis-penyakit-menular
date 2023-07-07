<?php

use App\Models\Disease;
use App\Models\HealthcareFacilities;
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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Disease::class)->constrained();
            $table->foreignIdFor(HealthcareFacilities::class)->constrained();
            $table->enum('status', ['confirmed', 'suspected', 'recovered', 'deceased']);
            $table->string('age');
            $table->enum('gender', ['male', 'female', 'm+f']);
            $table->integer('total');
            $table->enum('severity', ['mild', 'moderate', 'severe', 'critical', 'asymptomatic']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
