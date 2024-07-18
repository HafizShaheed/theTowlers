<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingListRelatedValuePart1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  
    public function up()
    {
        Schema::create('packing_list_related_value_part1s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->text("color_name_second_column_value_$i")->nullable();
              
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_value_part2s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->text("sku_no_second_column_value_$i")->nullable();
              
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_value_part3s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
             
                $table->text("ean_no_second_column_value_$i")->nullable();
               
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_value_part4s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->text("sku_hash_no_second_column_value_$i")->nullable();
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_value_part5s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->text("style_no_second_column_value_$i")->nullable();
               
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_value_part6s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->text("quantity_third_column_value_$i")->nullable();
                $table->text("quantity_unit_third_column_value_$i")->nullable();
              
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_value_part7s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->text("price_third_column_value_$i")->nullable();
                $table->text("price_unit_third_column_value_$i")->nullable();
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_value_part8s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->text("currency_symbol_third_column_value_$i")->nullable();
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_value_part9s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->text("total_amount_third_column_value_$i")->nullable();
            }
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packing_list_related_value_part1s');
        Schema::dropIfExists('packing_list_related_value_part2s');
        Schema::dropIfExists('packing_list_related_value_part3s');
        Schema::dropIfExists('packing_list_related_value_part4s');
        Schema::dropIfExists('packing_list_related_value_part5s');
        Schema::dropIfExists('packing_list_related_value_part6s');
        Schema::dropIfExists('packing_list_related_value_part7s');
        Schema::dropIfExists('packing_list_related_value_part8s');
        Schema::dropIfExists('packing_list_related_value_part9s');
    }
}
