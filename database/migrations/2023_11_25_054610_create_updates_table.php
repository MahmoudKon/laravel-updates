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
        Schema::create('updates', function (Blueprint $table) {
            $table->uuid('id');
            $table->text('link')->nullable();
            $table->string('file', 255)->nullable();
            $table->string('path');
            $table->boolean('type')->default(1)->comment("0 is link | 1 is file");
            $table->float('size')->default(0);
            $table->string('name')->nullable();
            $table->string('extension')->nullable();
            $table->text('about')->nullable();
            $table->string('version')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::enableForeignKeyConstraints();
            Schema::dropIfExists('updates');
        Schema::disableForeignKeyConstraints();
    }
};
