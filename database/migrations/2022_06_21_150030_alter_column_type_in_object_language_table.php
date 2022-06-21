<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnTypeInObjectLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('object_language', function (Blueprint $table) {
            if (Schema::hasColumn('object_language', 'type')) {
                $table->string('type')->change();
            }
        });
        Schema::table('object_language', function (Blueprint $table) {
            if (Schema::hasColumn('object_language', 'type')) {
                $table->renameColumn('type','object_type');
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
