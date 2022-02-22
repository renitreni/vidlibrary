<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_videos', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('extension');
            $table->string('filecode');
            $table->string('length');
            $table->string('size');
            $table->text('download_url');
            $table->text('single_img');
            $table->text('protected_embed');
            $table->text('protected_dl');
            $table->string('uploaded_by');
            $table->bigInteger('views');
            $table->integer('is_published');
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
        Schema::dropIfExists('my_videos');
    }
}
