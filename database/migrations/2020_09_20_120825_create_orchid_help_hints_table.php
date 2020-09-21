<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrchidHelpHintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('orchid_help_hints', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('type');
            $table->string('heading')->nullable();
            $table->boolean('is_visible')->default(1);
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('orchid_help_hints');
    }
}
