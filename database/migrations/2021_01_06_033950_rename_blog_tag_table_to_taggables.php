<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameBlogTagTableToTaggables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_tag', function (Blueprint $table) {
            //
            $table->dropForeign(['blog_id']);
            $table->dropColumn(['blog_id']);

            // $table->morphs('taggable');
        });
        Schema::rename('blog_tag','taggables');
        Schema::table('taggables',function(Blueprint $table){
            $table->morphs('taggable');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_tag', function (Blueprint $table) {
            //
            $table->dropMorphs('taggable');
        });
        Schema::rename('blog_tag', 'taggables');
        Schema::disableForeignKeyConstraints();
        Schema::table('blog_tag', function (Blueprint $table) {
            //
            $table->unsignedInteger('blog_id')->index();
            $table->foreignId('blog_id')
            ->constrained()
            ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();

        // php artisan make:migration RenameBlogTagToTaggables --table=blog_tag
    }
}
