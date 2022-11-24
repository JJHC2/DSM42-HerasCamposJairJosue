<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_categories', function (Blueprint $table) {
            $table->Bigincrements("id")->primarykey();
            $table->text("description");
            $table->unsignedBigInteger("categories_id");
            $table->foreign("categories_id")->references("id")->on("categories")->onDelete('cascade');   
            $table->timestamps();   
            $table->SoftDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_categories');
    }
};
