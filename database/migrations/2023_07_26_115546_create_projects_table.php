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
            $table->integer("category_id");
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->string("video", 255)->nullable();
            $table->string("3d", 255)->nullable();
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
