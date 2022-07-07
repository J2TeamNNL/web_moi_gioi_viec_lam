<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsSalaryInPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'min_salary')) {
                $table->float('min_salary')->change();
            }
            if (Schema::hasColumn('posts', 'max_salary')) {
                $table->float('max_salary')->change();
            }
            if (Schema::hasColumn('posts', 'currency_salary')) {
                $table->integer('currency_salary')->change();
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
