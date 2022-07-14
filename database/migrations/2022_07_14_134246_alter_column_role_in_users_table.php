<?php

use App\Enums\UserRoleEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnRoleInUsersTable extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('role')->default(UserRoleEnum::APPLICANT)->change();
            });
        }
    }

    public function down()
    {
    }
}
