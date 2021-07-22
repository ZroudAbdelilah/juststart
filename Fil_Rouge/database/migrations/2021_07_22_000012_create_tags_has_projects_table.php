<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTagsHasProjectsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tags_has_projects';
    /**
     * Run the migrations.
     * @table tags_has_projects
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('tags_id');
            $table->unsignedBigInteger('projects_id');

            $table->index(["projects_id"], 'fk_tags_has_projects_projects1_idx');

            $table->index(["tags_id"], 'fk_tags_has_projects_tags1_idx');


            $table->foreign('tags_id', 'fk_tags_has_projects_tags1_idx')
                ->references('id')->on('tags')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projects_id', 'fk_tags_has_projects_projects1_idx')
                ->references('id')->on('projects')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
