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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("slug", 255);
            $table->string("image", 50)->nullable();
            $table->string("thumbnail", 50)->nullable();
            // $table->integer("category_id")->default(0);
            // $table->date("start_date")->nullable();
            // $table->date("end_date")->nullable();
            $table->string("video", 255)->nullable();
            $table->string("brochure", 255)->nullable();
            // $table->string("model3D", 255)->nullable();
            $table->integer("order")->default(0);
            $table->enum("status", StatusEnum::getValues())->default(StatusEnum::Active->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
