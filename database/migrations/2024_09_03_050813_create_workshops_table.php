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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slung');
            $table->string('thumbnail');
            $table->string('venue_thumbnail');
            $table->string('bg_map');

            $table->text('address');
            $table->text('about');

            $table->unsignedBigInteger('price');

            $table->boolean('is_open');
            $table->boolean('has_started');

            $table->date('started_at');

            $table->time('time_at');

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('workshop_instructor_id')->constrained()->cascadeOnDelete();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
