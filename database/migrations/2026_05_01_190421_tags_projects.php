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
        Schema::create('tags_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('project_id');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('restrict');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('restrict');

            $table->primary(['tag_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_projects');
    }
};
