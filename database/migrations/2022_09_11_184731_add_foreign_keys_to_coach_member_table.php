<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCoachMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coach_member', function (Blueprint $table) {
            $table->foreign(['coach_id'])->references(['id'])->on('coaches')->onDelete('CASCADE');
            $table->foreign(['member_id'])->references(['id'])->on('members')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coach_member', function (Blueprint $table) {
            $table->dropForeign('coach_member_coach_id_foreign');
            $table->dropForeign('coach_member_member_id_foreign');
        });
    }
}
