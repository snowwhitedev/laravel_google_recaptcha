<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitemapSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitemap_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('homepage_included')->default(1);
            $table->string('homepage_freq')->default('weekly');
            $table->string('homepage_priority')->default('1.0');

            $table->boolean('posts_included')->default(1);
            $table->string('posts_freq')->default('weekly');
            $table->string('posts_priority')->default('0.9');

            $table->boolean('cats_included')->default(1);
            $table->string('cats_freq')->default('weekly');
            $table->string('cats_priority')->default('0.8');

            $table->boolean('tags_included')->default(1);
            $table->string('tags_freq')->default('weekly');
            $table->string('tags_priority')->default('0.7');

            $table->boolean('authors_included')->default(1);
            $table->string('authors_freq')->default('weekly');
            $table->string('authors_priority')->default('0.6');
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
        Schema::dropIfExists('sitemap_settings');
    }
}
