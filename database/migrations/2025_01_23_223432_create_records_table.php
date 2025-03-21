<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_path')->nullable();
            $table->string('description')->nullable();
            $table->date('date')->nullable();  // Use CURRENT_TIMESTAMP
            $table->double('amount')->default(0);
            $table->enum('record', ['income', 'expenditure'])->default('income');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->timestamps();
        
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
