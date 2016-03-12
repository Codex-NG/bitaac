<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use bitaac\bitfabric\Core\Facades\Database\Trigger;

class CreateBitaacAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__bitaac_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unique();
            $table->integer('admin')->default(0);
            $table->integer('email_change_time')->nullable()->default(null);
            $table->string('email_change_new', 255)->nullable()->default(null);
            $table->string('reckey')->nullable()->default(null);
            $table->timestamp('last_login')->nullable()->default(null);
            $table->integer('total_points')->default(0);
            $table->integer('points')->default(0);
            $table->timestamps();
        });

        Trigger::after('insert')->on('accounts')->create(function ($query) {
            $query->table('__bitaac_accounts')->insert([
                'account_id' => DB::raw('NEW.`id`'),
                'created_at' => DB::raw('now()')
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Trigger::after('insert')->on('accounts')->rollback();

        Schema::drop('__bitaac_accounts');
    }
}
