<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsAddress2AndDistrictAndCityInCompaniesTable extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            if (Schema::hasColumn('companies', 'address2')) {
                $table->dropColumn('address2');
            }
            if (Schema::hasColumn('companies', 'district')) {
                $table->dropColumn('district');
            }
            if (Schema::hasColumn('companies', 'city')) {
                $table->dropColumn('city');
            }
        });
    }

    public function down()
    {
    }
}
