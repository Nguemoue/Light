<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('daily_breads', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->string("poster_url")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_breads');
    }
};
