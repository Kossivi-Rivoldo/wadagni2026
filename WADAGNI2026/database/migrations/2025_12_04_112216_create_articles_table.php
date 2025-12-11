<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('articles', function (Blueprint $table) {
            
            $table->id('id_art');
            $table->unsignedBigInteger('id_cat');
            $table->string('titre_art');
            $table->text('extr_art')->nullable();
            $table->string('image')->nullable();
            $table->longText('contenu');
            $table->unsignedBigInteger('id_user');
            $table->string('video')->nullable();
            $table->timestamps();

            $table->foreign('id_cat')
                ->references('id_cat')
                ->on('article_cats')
                ->onDelete('cascade');

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('articles');
    }
};
