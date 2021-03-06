<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    const TABLE = 'tests';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
                  ->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')
                  ->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('photo_link')->nullable();
            $table->boolean('is_complete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE);
    }
}
