<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->boolean('serverType')->default(false);
            $table->boolean('status')->default(false);
            $table->string('server_name');
            $table->tinyInteger('servertype_1')->unsigned();
            $table->date('date')->nullable();
            $table->string('serverplatform');
            $table->string('type');
            $table->ipAddress('loginIp');
            $table->ipAddress('serverIp');
            $table->char('loginPort', 4);
            $table->char('serverPort', 4);
            $table->string('chronicle');
            $table->char('xpRate', 5);
            $table->char('dropRate', 5);
            $table->char('safeRate', 5);
            $table->char('spRate', 5);
            $table->char('adenaRate', 5);
            $table->char('maxRate', 5);
            $table->string('language');
            $table->string('website');
            $table->mediumText('desc');
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
        Schema::drop('servers');
    }
}
