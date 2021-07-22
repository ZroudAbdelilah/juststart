<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';
    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('username', 70)->nullable()->default(null);
            $table->string('email', 70)->nullable()->default(null);
            $table->text('password')->nullable()->default(null);
            $table->unsignedBigInteger('adresss_id');

            $table->index(["adresss_id"], 'fk_users_adresss1_idx');


            $table->foreign('adresss_id', 'fk_users_adresss1_idx')
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
