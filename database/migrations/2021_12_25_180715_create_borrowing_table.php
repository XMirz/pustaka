<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowing', function (Blueprint $table) {
            $table->id();
            $table->integer('amount')->unsigned();
            $table->date('return_date');
            $table->string('status');
            $table->timestamps();
            $table->foreignId('book_id')->constrained('books')->restrictOnDelete()->restrictOnUpdate();
            $table->foreignId('borrower_id')->constrained('borrowers')->restrictOnDelete()->restrictOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowing');
    }
}
