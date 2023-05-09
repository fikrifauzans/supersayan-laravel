<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('users');
        Schema::dropIfExists('master_menus');
        Schema::dropIfExists('menu_details');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('permission_access');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('files');
        Schema::dropIfExists('otps');



        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('is_customer')->nullable()->default(0);
            $table->integer('avatar_id')->nullable()->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
            
        });


        Schema::create('permission_access', function (Blueprint $table) {
            $table->id();
            $table->integer('permission_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->boolean('status')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });

        Schema::create('master_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });

        Schema::create('menu_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->tinyInteger('menu_id')->nullable()->default(null);
            $table->tinyInteger('master_menu_id')->nullable()->default(null);
            $table->tinyInteger('sort')->nullable()->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('menu_details')->onDelete('cascade');

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('link')->nullable();
            $table->string('icon')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('master_menu_id')->nullable();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->nullable()->default(null);
            $table->string('slug')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });

        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('directory')->nullable();
            $table->string('type')->nullable();
            $table->string('reference_table')->nullable();
            $table->integer('reference_id')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->integer('otp')->nullable();
            $table->integer('user_id')->nullable();
            $table->bigInteger('expired')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->integer('deleted_by')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('master_menus');
        Schema::dropIfExists('menu_details');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('permission_access');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('files');
    }
};
