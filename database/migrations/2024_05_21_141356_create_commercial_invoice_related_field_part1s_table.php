<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialInvoiceRelatedFieldPart1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_invoice_related_field_part1s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id',50);  // Changed to string
            $table->string("heading_proforma_invioce",50)->default('PROFORMA INVOICE NO:')->nullable();
            $table->string("value_proforma_invioce",50)->nullable();

            for ($i = 1; $i <= 10; $i++) {
                $table->string("heading_long_side_$i",50)->default('LEFT & RIGHT SIDES OF BOX( LONG SIDES )')->nullable();
                $table->string("heading_po_$i",50)->default('PO #')->nullable();
                $table->string("value_po_$i",50)->nullable();
                $table->string("heading_cotton_$i",50)->default('100% COTTON')->nullable();
                $table->string("heading_seahorse_$i",50)->default('SEAHORSE PURE TOWEL')->nullable();
            }
            $table->timestamps();
        });

        Schema::create('commercial_invoice_related_field_part2s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id',50);  // Changed to string
            for ($i = 1; $i <= 10; $i++) {
                $table->string("heading_terry_$i",50)->default('TERRY TOWEL')->nullable();
                $table->string("heading_carron_bales_pallets_$i",50)->default('CARONS/BALES/PALLETS')->nullable();
                $table->string("carron_bales_pallets_value_$i",50)->nullable();
                $table->string("heading_pcs_pack_pallet_per_$i",50)->default('PCS PER CARTON/PACK PER BALE/SET PER PALLET')->nullable();
                $table->string("pcs_pack_pallet_per_value_$i",50)->nullable();
            }
            $table->timestamps();
        });
        Schema::create('commercial_invoice_related_field_part3s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id',50);  // Changed to string
            for ($i = 1; $i <= 10; $i++) {
                $table->string("heading_color_$i",50)->default('COLOR')->nullable();
                $table->string("heading_sku_no_$i",50)->default('SKU NO:')->nullable();
                $table->string("heading_ean_no_$i",50)->default('EAN NO:')->nullable();
                $table->string("heading_sku_hash_$i",50)->default('SKU #')->nullable();
                $table->string("heading_style_$i",50)->default('STYLE #:')->nullable();
            }
            $table->timestamps();
        });
        Schema::create('commercial_invoice_related_field_part4s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id',50);  // Changed to string
            for ($i = 1; $i <= 10; $i++) {
                $table->string("heading_style_value_$i",50)->nullable();
                $table->string("heading_po_number_$i",50)->default('PO NUMBER  :')->nullable();
                $table->string("heading_po_number+_value_$i",50)->nullable();
                $table->string("heading_style_name_$i",50)->default('STYLE NAME :')->nullable();
                $table->string("heading_style_name_value_$i",50)->nullable();
                
            }
            $table->timestamps();
        });
        Schema::create('commercial_invoice_related_field_part5s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id',50);  // Changed to string
            for ($i = 1; $i <= 10; $i++) {
                $table->string("heading_style_number_$i",50)->default('STYLE NUMBER :')->nullable();
                $table->string("heading_style_number_value_$i",50)->nullable();
                $table->string("heading_color_left_column_$i",50)->default('COLOR  :')->nullable();
                $table->string("heading_color_left_column_value_$i",50)->nullable();
                $table->string("heading_size_break_down_$i",50)->default('SIZE BREAKDOWN:')->nullable();
                
            }
            $table->timestamps();
        });
        Schema::create('commercial_invoice_related_field_part6s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id',50);  // Changed to string
            for ($i = 1; $i <= 10; $i++) {
                $table->string("heading_size_break_down_value_$i",50)->nullable();
                $table->string("heading_carton_count_$i",50)->default('CARTON COUNT :')->nullable();
                $table->string("heading_carton_count_value_$i",50)->nullable();
                $table->string("heading_carton_size_$i",50)->default('CARTON SIZE :')->nullable();
                $table->string("heading_carton_size_value_$i",50)->nullable();  
            }
            $table->timestamps();
        });
        Schema::create('commercial_invoice_related_field_part7s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id',50);  // Changed to string
            for ($i = 1; $i <= 10; $i++) {
                $table->string("heading_bale_left_column_$i",50)->default('BALE#:')->nullable();
                $table->string("heading_bale_left_column_value_$i",50)->default('BALE#:')->nullable();
                $table->string("heading_net_weight_left_column_$i",50)->default('NET WEIGHT:')->nullable();
                $table->string("heading_gross_weight_left_column_$i",50)->default('GROSS WEIGHT:')->nullable();
                $table->string("heading_net_weight_second_column_$i",50)->default('NET WEIGHT:')->nullable(); 
            }
            $table->timestamps();
        });
        Schema::create('commercial_invoice_related_field_part8s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id',50);  // Changed to string
            for ($i = 1; $i <= 10; $i++) {
                $table->string("heading_gross_weight_second_column_$i",50)->default('GR WEIGHT:')->nullable();
                $table->string("net_weight_second_column_value_$i",50)->nullable();
                $table->string("gross_weight_second_column_value_$i",50)->nullable();
                $table->string("heading_quantity_unit_$i",50)->nullable();
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
        Schema::dropIfExists('commercial_invoice_related_field_part1s');
        Schema::dropIfExists('commercial_invoice_related_field_part2s');
        Schema::dropIfExists('commercial_invoice_related_field_part3s');
        Schema::dropIfExists('commercial_invoice_related_field_part4s');
        Schema::dropIfExists('commercial_invoice_related_field_part5s');
        Schema::dropIfExists('commercial_invoice_related_field_part6s');
        Schema::dropIfExists('commercial_invoice_related_field_part7s');
        Schema::dropIfExists('commercial_invoice_related_field_part8s');
    }
}
