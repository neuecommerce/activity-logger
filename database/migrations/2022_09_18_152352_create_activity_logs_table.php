<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogsTable extends Migration
{
    public function up(): void
    {
        Schema::create($this->tableName(), function (Blueprint $table) {
            $table->id();

            $table->string('type');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('properties')->nullable();
            $table->nullableMorphs('subject', 'subject');
            $table->nullableMorphs('causer', 'causer');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName());
    }

    public function getConnection(): string | null
    {
        return config('neue-commerce.activity-logger.model.database_connection');
    }

    private function tableName(): string
    {
        return config('neue-commerce.activity-logger.model.table_name');
    }
}
