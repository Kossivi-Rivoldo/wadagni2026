<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('article_cats', function (Blueprint $table) {
            $table->id('id_cat');
            $table->string('nom_cat');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    public function down(): void {
        Schema::dropIfExists('article_cats');
    }
};
