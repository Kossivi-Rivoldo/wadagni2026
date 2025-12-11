<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dons', function (Blueprint $table) {
            $table->id();
            $table->string('nom_donateur');
            $table->enum('type_don', ['espece', 'nature']);
            $table->decimal('montant', 10, 2)->nullable();
            $table->integer('quantite')->nullable();
            $table->dropColumn('description');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dons');
    }
};
