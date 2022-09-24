<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateActivityLogsTable extends Migration
{
    public function up(): void
    {
        Schema::create($this->tableName(), function (Blueprint $table) {
            $table->id();

            $table->string('type');
            $table->string('title');
            $table->text('description')->nullable();
            $table->morphs('subject', 'subject');
            $table->nullableMorphs('causer', 'causer');
            $table->json('properties')->default('[]');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->tableName());
    }

    public function getConnection(): string | null
    {
        return config('neuecommerce.activity-logger.model.database_connection');
    }

    private function tableName(): string
    {
        return config('neuecommerce.activity-logger.model.table_name');
    }
}
