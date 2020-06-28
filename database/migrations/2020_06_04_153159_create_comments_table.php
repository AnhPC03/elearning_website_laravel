<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned()->index();
            $table->bigInteger('lesson_id')->unsigned()->index();
            $table->bigInteger('id_parent')->unsigned()->index()->nullable();
            $table->text('content');
            $table->timestamps();
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('lesson_id')
                  ->references('id')
                  ->on('lessons')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
