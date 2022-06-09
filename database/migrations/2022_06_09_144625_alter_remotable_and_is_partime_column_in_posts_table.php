<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRemotableAndIsPartimeColumnInPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('is_partime')->default(0)->change();
            $table->integer('remotable')->change();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('is_partime', 'can_parttime');
        });
    }

    public function down()
    {
    }
}
