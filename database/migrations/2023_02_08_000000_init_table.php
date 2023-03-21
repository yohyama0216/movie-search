<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** 
         * 対戦動画 
         */
        Schema::dropIfExists('battles');
        Schema::create('battles', function (Blueprint $table) {
            $table->unsignedbigInteger('id')->autoIncrement();
            $table->string('url');
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });

        /** 
         * 対戦プレイヤー
         */
        Schema::dropIfExists('players');
        Schema::create('players', function (Blueprint $table) {
            $table->unsignedbigInteger('id')->autoIncrement();
            // $table->string('profile_id');
            $table->unsignedbigInteger('cr_id');
            $table->unsignedbigInteger('battle_id');
            $table->foreign('battle_id')->references('id')->on('battles');
            $table->tinyInteger('result'); // Enum？ win or lose
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });

        /**
         * デッキ
         */
        Schema::dropIfExists('decks');
        Schema::create('decks', function (Blueprint $table) {
            $table->unsignedbigInteger('id')->autoIncrement();
            $table->string('name');
            $table->unsignedbigInteger('battle_id');
            $table->foreign('battle_id')->references('id')->on('battles');
            $table->tinyInteger('result'); // Enum？ win or lose
            $table->datetime('created_at');
            $table->datetime('updated_at');
        }); 

        /**
         * デッキプレイヤー
         */
        Schema::dropIfExists('deck_player');
        Schema::create('deck_player', function (Blueprint $table) {
            // $table->unsignedbigInteger('id')->autoIncrement();
            $table->bigInteger('deck_id');
            $table->foreign('deck_id')->references('id')->on('decks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->bigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')->cascadeOnUpdate()->cascadeOnDelete();
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });        

        /**
         * カードマスタ
         */
        Schema::dropIfExists('cards');
        Schema::create('cards', function (Blueprint $table) {
            $table->unsignedbigInteger('id')->autoIncrement();
            $table->string('key');
            $table->string('name_jp');
            $table->tinyInteger('elixir');
            $table->string('type');
            $table->string('rarity');
            $table->tinyInteger('arena');
            $table->string('description_jp');
            // $table->integer('sight_range');
            // $table->integer('speed');
            // $table->integer('hit_speed');
            // $table->string('hitpoints_per_level');
            // $table->string('damage_per_level');
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });

        /**
         * デッキカード
         */
        Schema::dropIfExists('card_deck');
        Schema::create('card_deck', function (Blueprint $table) {
            $table->unsignedbigInteger('id')->autoIncrement();
            $table->bigInteger('deck_id');
            $table->foreign('deck_id')->references('id')->on('decks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('card_id');
            $table->foreign('card_id')->references('id')->on('cards')->cascadeOnUpdate()->cascadeOnDelete();
            $table->datetime('created_at');
            $table->datetime('updated_at');
        }); 


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
