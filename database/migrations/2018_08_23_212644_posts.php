<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_data', function (Blueprint $table) {//文章内的更多信息，考虑到会大量写，所以分离
            $table->increments('id');
            $table->string('list');
            $table->string('posts_id');
            $table->string('plate_id')->nullable();
        });

        Schema::create('posts', function (Blueprint $table) { //文章表，存储文章基本信息
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('content');
            $table->string('status')->default(1);
            $table->string('user_id');
            $table->timestamps();
        });

        Schema::create('msg', function (Blueprint $table) { //通知表（后期可考虑分表/rails）
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('content');
            $table->string('user_id');
            $table->string('status')->default(1);
            $table->timestamps();
        });

        Schema::create('user_setting', function (Blueprint $table) { //用户设置
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->string('user_id');
            $table->timestamps();
        });

        Schema::create('website_setting', function (Blueprint $table) { //网站设计
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('zans', function (Blueprint $table) { //赞
            $table->increments('id');
            $table->string('user_id');
            $table->string('posts_id');
            $table->timestamps();
        });

        Schema::create('comment', function (Blueprint $table) { //评论
            $table->increments('id');
            $table->text('content');
            $table->string('user_id');
            $table->string('posts_id');
            $table->string('status')->default(1);
            $table->timestamps();
        });

        Schema::create('user_log', function (Blueprint $table) { //用户记录
            $table->string('user_id');
            $table->string('content');
            $table->timestamps();
        });

        Schema::create('admin_log', function (Blueprint $table) { //管理记录
            $table->string('user_id');
            $table->string('content');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) { //图片信息
            $table->increments('id');
            $table->string('title');
            $table->string('path');
            $table->string('user_id');
            $table->string('cloud');
            $table->string('status')->default(1);
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) { //标签
            $table->increments('id');
            $table->string('title');
            $table->string('user_id');
            $table->string('posts_id');
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });

        Schema::create('plate', function (Blueprint $table) {//板块
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('posts_data');
        Schema::dropIfExists('msg');
        Schema::dropIfExists('user_setting');
        Schema::dropIfExists('website_setting');
        Schema::dropIfExists('zans');
        Schema::dropIfExists('comment');
        Schema::dropIfExists('user_log');
        Schema::dropIfExists('admin_log');
        Schema::dropIfExists('images');
        Schema::dropIfExists('plate');
        Schema::dropIfExists('tags');
    }
}
