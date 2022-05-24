<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnRemotableNullableInPostsTable extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('posts', 'remotable')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->string('remotable')->nullable()->change();
            });
        }
    }

    public function down()
    {
    }
}
