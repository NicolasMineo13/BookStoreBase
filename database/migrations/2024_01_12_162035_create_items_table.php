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
        Schema::create('items', function (Blueprint $table) {
            $table->id('code');
            $table->integer('quantity')->default(0)->unsigned();
            $table->float('total', 8, 2)->default(0.0)->unsigned();
            $table->string('description', 500);
            $table->string('book_id', 36)->nullable();
            $table->uuid('cart_id')->nullable();
            $table->uuid('command_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('book_id')
            ->references('ISBN')
            ->on('books')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('cart_id')
            ->references('code')
            ->on('carts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('command_id')
            ->references('code')
            ->on('commands')
            ->onUpdate('cascade')
            ->onDelete('cascade');           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
