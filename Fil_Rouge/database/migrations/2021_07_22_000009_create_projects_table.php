<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProjectsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projects';
    /**
     * Run the migrations.
     * @table projects
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name', 70)->nullable();
            $table->decimal('target_b', 11, 2)->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('d_line')->nullable();
            $table->text('thumbnail')->nullable();
            $table->unsignedBigInteger('categorys_id');
            $table->unsignedBigInteger('project_leader_id');

            $table->index(["categorys_id"], 'fk_projects_categorys1_idx');

            $table->index(["project_leader_id"], 'fk_projects_project_leader1_idx');


            $table->foreign('categorys_id', 'fk_projects_categorys1_idx')
                ->references('id')->on('categorys')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('project_leader_id', 'fk_projects_project_leader1_idx')
                ->references('id')->on('project_leader')
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
