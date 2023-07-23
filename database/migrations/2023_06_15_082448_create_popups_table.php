<?php

use App\Enums\StatusEnum;
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
        Schema::create('popups', function (Blueprint $table) {
            $table->id();
            $table->enum("type", ["image", "video", "text"])->default("text");
            $table->string("image", 50)->nullable();
            $table->string("video")->nullable();
            $table->string("url")->nullable();
            $table->integer("time")->nullable();
            $table->integer("width")->nullable();
            $table->string("closeOnEscape")->default(StatusEnum::No->value);
            $table->string("closeButton")->default(StatusEnum::No->value);
            $table->string("overlayClose")->default(StatusEnum::No->value);
            $table->string("pauseOnHover")->default(StatusEnum::No->value);
            $table->string("fullScreenButton")->default(StatusEnum::No->value);
            $table->string("color")->nullable();
            $table->enum("status", StatusEnum::getValues())->default(StatusEnum::Active->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popups');
    }
};
