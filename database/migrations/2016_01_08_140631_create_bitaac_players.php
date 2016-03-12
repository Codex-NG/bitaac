<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use bitaac\bitfabric\Core\Facades\Database\Trigger;

class CreateBitaacPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__bitaac_players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id');
            $table->integer('hidden')->default(0);
            $table->string('comment', 140)->default('');
            $table->integer('deletion_time')->default(0);
            $table->timestamps();
        });

        Trigger::after('insert')->on('players')->create(function ($query) {
            $query->table('__bitaac_players')->insert([
                'player_id'  => DB::raw('NEW.`id`'),
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
        Trigger::after('insert')->on('players')->rollback();

        Schema::drop('__bitaac_players');
    }
}
