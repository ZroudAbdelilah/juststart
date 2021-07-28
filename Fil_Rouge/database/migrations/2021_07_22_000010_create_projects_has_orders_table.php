<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProjectsHasOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projects_has_orders';
    /**
     * Run the migrations.
     * @table projects_has_orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('projects_id');
            $table->unsignedBigInteger('orders_id');
            $table->timestamps();
            $table->index(["orders_id"], 'fk_projects_has_orders_orders1_idx');

            $table->index(["projects_id"], 'fk_projects_has_orders_projects1_idx');


            $table->foreign('projects_id', 'fk_projects_has_orders_projects1_idx')
                ->references('id')->on('projects')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('orders_id', 'fk_projects_has_orders_orders1_idx')
                ->references('id')->on('orders')
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
