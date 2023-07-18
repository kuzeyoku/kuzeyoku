<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("slug", 255);
            $table->string("image", 30)->nullable();
            $table->integer("category_id");
            $table->integer("price")->nullable();
            $table->string("currency")->nullable();
            $table->string("video", 255)->nullable();
            $table->string("status", 50)->default(StatusEnum::Active->value);
            $table->integer("view_count")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
