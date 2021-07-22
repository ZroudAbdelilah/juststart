<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProjectLeaderTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'project_leader';
    /**
     * Run the migrations.
     * @table project leader
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('username', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->text('password')->nullable();
            $table->unsignedBigInteger('adresss_id');

            $table->index(["adresss_id"], 'fk_project_leader_adresss1_idx');


            $table->foreign('adresss_id', 'fk_project_leader_adresss1_idx')
                ->references('id')->on('adresss')
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
