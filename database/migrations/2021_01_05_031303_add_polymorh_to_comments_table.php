<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolymorhToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
            $table->dropForeign(['blog_id']);
            $table->dropColumn(['blog_id']);

            $table->morphs('commentable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
            $table->dropMorphs('commentable');
            $table->unsignedInteger('blog_id')->index();
            $table->foreignId('blog_id')->constrained();
        });
    }
}
