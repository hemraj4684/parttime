<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabs', function (Blueprint $table) {
            $table->increments('tab_id');
            $table->string('name')->unique();
            $table->string('description')->unique();
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('service_id')->on('services');
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');            
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('modules', function (Blueprint $table) {
            $table->increments('module_id');
            $table->string('name')->unique();
            $table->string('description')->unique();
            $table->integer('tab_id')->unsigned()->nullable();
            $table->foreign('tab_id')->references('tab_id')->on('tabs');
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');            
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');            
            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::create('tabs_services', function (Blueprint $table) {
        //     $table->integer('tab_id')->unsigned()->nullable();
        //     $table->foreign('tab_id')->references('tab_id')->on('tabs');
        //     $table->integer('service_id')->unsigned()->nullable();
        //     $table->foreign('service_id')->references('service_id')->on('services');
        // });        

        // Schema::create('modules_tabs', function (Blueprint $table) {
        //     $table->integer('tab_id')->unsigned()->nullable();
        //     $table->foreign('tab_id')->references('tab_id')->on('tabs');
        //     $table->integer('module_id')->unsigned()->nullable();
        //     $table->foreign('module_id')->references('module_id')->on('modules');
        // });

        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('permission_id');
            $table->string('name')->unique()->nullable();
            $table->string('routeName')->unique();  
            $table->integer('module_id')->unsigned()->nullable();
            $table->foreign('module_id')->references('module_id')->on('modules');          
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');            
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->integer('permission_id')->unsigned()->nullable();
            $table->foreign('permission_id')->references('permission_id')->on('permissions');
            $table->integer('org_id')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('roles_permissions');
        
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('modules');
        Schema::dropIfExists('tabs');
        
        
    }

}


