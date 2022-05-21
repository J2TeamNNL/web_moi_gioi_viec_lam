<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsNullableInUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'password')) {
                $table->string('password')->nullable()->change();
            }
            if (Schema::hasColumn('users', 'city')) {
                $table->string('city')->nullable()->change();
            }
            if (Schema::hasColumn('users', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
