<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingListRelatedFieldPart1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('packing_list_related_field_part1s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id',50);  // Changed to text
            $table->text("heading_proforma_invioce",50)->default('PROFORMA INVOICE NO:')->nullable();
            $table->text("value_proforma_invioce",50)->nullable();

            for ($i = 1; $i <= 35; $i++) {
                $table->text("heading_long_side_$i",50)->default('LEFT & RIGHT SIDES OF BOX( LONG SIDES )')->nullable();
                $table->text("heading_po_$i",50)->default('PO #')->nullable();
                $table->text("value_po_$i",50)->nullable();
                $table->text("heading_cotton_$i",50)->default('100% COTTON')->nullable();
                $table->text("heading_seahorse_$i",50)->default('SEAHORSE PURE TOWEL')->nullable();
            }
            $table->timestamps();
        });

        Schema::create('packing_list_related_field_part2s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id',50);  // Changed to text
            for ($i = 1; $i <= 35; $i++) {
                $table->text("heading_terry_$i",50)->default('TERRY TOWEL')->nullable();
                $table->text("heading_carron_bales_pallets_$i",50)->default('CARONS/BALES/PALLETS')->nullable();
                $table->text("carron_bales_pallets_value_$i",50)->nullable();
                $table->text("heading_pcs_pack_pallet_per_$i",50)->default('PCS PER CARTON/PACK PER BALE/SET PER PALLET')->nullable();
                $table->text("pcs_pack_pallet_per_value_$i",50)->nullable();
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_field_part3s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id',50);  // Changed to text
            for ($i = 1; $i <= 35; $i++) {
                $table->text("heading_color_$i",50)->default('COLOR')->nullable();
                $table->text("heading_sku_no_$i",50)->default('SKU NO:')->nullable();
                $table->text("heading_ean_no_$i",50)->default('EAN NO:')->nullable();
                $table->text("heading_sku_hash_$i",50)->default('SKU #')->nullable();
                $table->text("heading_style_$i",50)->default('STYLE #:')->nullable();
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_field_part4s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id',50);  // Changed to text
            for ($i = 1; $i <= 35; $i++) {
                $table->text("heading_po_number_$i",50)->default('PO NUMBER  :')->nullable();
                $table->text("heading_po_number_value_$i",50)->nullable();
                $table->text("heading_style_name_$i",50)->default('STYLE NAME :')->nullable();
                $table->text("heading_style_name_value_$i",50)->nullable();
                
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_field_part5s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id',50);  // Changed to text
            for ($i = 1; $i <= 35; $i++) {
                $table->text("heading_style_number_$i",50)->default('STYLE NUMBER :')->nullable();
                $table->text("heading_style_number_value_$i",50)->nullable();
                $table->text("heading_color_left_column_$i",50)->default('COLOR  :')->nullable();
                $table->text("heading_color_left_column_value_$i",50)->nullable();
                $table->text("heading_size_break_down_$i",50)->default('SIZE BREAKDOWN:')->nullable();
                
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_field_part6s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id',50);  // Changed to text
            for ($i = 1; $i <= 35; $i++) {
                $table->text("heading_size_break_down_value_$i",50)->nullable();
                $table->text("heading_carton_count_$i",50)->default('CARTON COUNT :')->nullable();
                $table->text("heading_carton_count_value_$i",50)->nullable();
                $table->text("heading_carton_size_$i",50)->default('CARTON SIZE :')->nullable();
                $table->text("heading_carton_size_value_$i",50)->nullable();  
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_field_part7s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id',50);  // Changed to text
            for ($i = 1; $i <= 35; $i++) {
                $table->text("heading_bale_left_column_$i",50)->default('BALE#:')->nullable();
                $table->text("heading_bale_left_column_value_$i",50)->default('BALE#:')->nullable();
                $table->text("heading_net_weight_left_column_$i",50)->default('NET WEIGHT:')->nullable();
                $table->text("heading_gross_weight_left_column_$i",50)->default('GROSS WEIGHT:')->nullable();
                $table->text("heading_net_weight_second_column_$i",50)->default('NET WEIGHT:')->nullable(); 
            }
            $table->timestamps();
        });
        Schema::create('packing_list_related_field_part8s', function (Blueprint $table) {
            $table->id();
            $table->string('packing_list_id',50);  // Changed to text
            for ($i = 1; $i <= 35; $i++) {
                $table->text("heading_gross_weight_second_column_$i",50)->default('GR WEIGHT:')->nullable();
                $table->text("net_weight_second_column_value_$i",50)->nullable();
                $table->text("gross_weight_second_column_value_$i",50)->nullable();
                $table->text("heading_quantity_unit_$i",50)->nullable();
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
        Schema::dropIfExists('packing_list_related_field_part1s');
        Schema::dropIfExists('packing_list_related_field_part2s');
        Schema::dropIfExists('packing_list_related_field_part3s');
        Schema::dropIfExists('packing_list_related_field_part4s');
        Schema::dropIfExists('packing_list_related_field_part5s');
        Schema::dropIfExists('packing_list_related_field_part6s');
        Schema::dropIfExists('packing_list_related_field_part7s');
        Schema::dropIfExists('packing_list_related_field_part8s');
    }
}
