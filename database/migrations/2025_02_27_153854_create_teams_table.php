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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('team_leader');
            $table->string('email');
            $table->string('phone');
            $table->integer('player_count');
            $table->text('contact_address');
            $table->string('company_logo')->nullable();
            $table->json('player_sizes');
            $table->decimal('amount', 8, 2)->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('stripe_session_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
