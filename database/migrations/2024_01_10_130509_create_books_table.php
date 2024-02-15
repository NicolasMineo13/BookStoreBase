<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->string('ISBN', 36);
            $table->string('title', 100);
            $table->integer('year')->default(0)->unsigned();
            $table->integer('edition')->default(0)->unsigned();
            $table->string('editorial', 50);
            $table->string('description', 500);
            $table->string('dimensions', 20);
            $table->float('unitPrice', 8, 2)->default(0.0)->unsigned();
            $table->string('author_id',50);
            $table->timestamps();
            $table->softDeletes();
            $table->primary('ISBN');
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
