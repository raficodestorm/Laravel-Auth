<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // core profile
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');

            // optional fields (for admin-created manager include father_name, nid_no)
            $table->string('father_name')->nullable();
            $table->string('phone')->nullable()->index();
            $table->text('address')->nullable();
            $table->string('nid_no')->nullable(); // NID number for managers/admins
            $table->string('profile_photo_path')->nullable();

            // roles & status
            $table->enum('role', ['user', 'counter_manager', 'admin'])->default('user')->index();
            $table->enum('status', ['active', 'inactive'])->default('active')->index();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
