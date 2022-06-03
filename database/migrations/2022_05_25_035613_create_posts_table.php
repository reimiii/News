<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('sub_category_id');
            $table->integer('author_id');
            $table->integer('admin_id');
            $table->string('post_photo')->nullable();
            $table->string('post_title');
            $table->text('post_detail');
            $table->integer('visitor_count');
            $table->integer('is_share');
            $table->integer('is_comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
