<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnLevelsToPostsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('posts', 'levels')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->string('levels')
                    ->comment('array of levels')
                    ->nullable()
                    ->after('job_title');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('posts', 'levels')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('levels');
            });
        }
    }
}
