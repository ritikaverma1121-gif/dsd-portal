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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->after('email');       // For phone
            $table->string('profile_pic')->nullable()->after('phone_number'); // For storing image path
            $table->text('bio')->nullable()->after('profile_pic');            // Short bio
            $table->enum('status', ['active', 'inactive'])->default('active')->after('bio'); // User status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'profile_pic', 'bio', 'status']);
        });
    }
};
