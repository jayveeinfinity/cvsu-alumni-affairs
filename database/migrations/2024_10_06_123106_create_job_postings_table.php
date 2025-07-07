<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->string('location');
            $table->string('job_type');
            $table->string('experience')->nullable();
            $table->decimal('salary_min', 8, 2)->nullable();
            $table->decimal('salary_max', 8, 2)->nullable();
            $table->string('currency')->nullable();
            $table->text('job_description');
            $table->text('responsibilities')->nullable();
            $table->text('requirements')->nullable();
            $table->text('skills_experience')->nullable();
            $table->text('salary_benefits')->nullable();
            $table->string('apply_link')->nullable();
            $table->date('posted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_postings');
    }
}
