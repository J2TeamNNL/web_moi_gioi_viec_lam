<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsForeignKeyOnDelete extends Migration
{
    public function up()
    {
        $sm = Schema::getConnection()->getDoctrineSchemaManager();
        $indexesFiles = $sm->listTableIndexes('files');
        Schema::table('files', function (Blueprint $table) use($indexesFiles) {
            if(array_key_exists('files_post_id_foreign', $indexesFiles)) {
                $table->dropForeign('files_post_id_foreign');
                $table->foreign('post_id', 'files_post_id_foreign')
                    ->references('id')
                    ->on('posts')
                    ->onDelete('cascade');
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
        //
    }
}
