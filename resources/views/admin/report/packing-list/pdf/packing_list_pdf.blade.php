<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
{{-- <style>
    @page {
        margin: 100px 25px;
    }

    header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 70px;
    }

    .content {
        margin-top: 200px;
        /* padding: 20px;
        margin-bottom: 0px; */
    }

    .no-margin {
        margin: 0;
    }
</style> --}}
<style>
    @page {
        margin-top: 100px; /* Height of the header */
        margin-bottom: 25px;
    }

  

    .header {
        position: absolute;
        top: -60px;
        left: 0px;
        right: 0px;
    }

    .content {
        margin-top: 20px; /* Adjust as per your content flow */
    }

    .invoice-table {
        border: 1px solid #000;
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    .invoice-table td {
        width: 50%;
        font-size: 8px;
        vertical-align: top;
    }

    .address-div {
        width: 100%;
        text-align: center;
    }

    .address-div div {
        width: 100%;
    }

    .address-div table {
        width: 100%;
    }

    .address-div p {
        margin: 2px;
    }

    .address-div b {
        margin: 2px;
        text-decoration: underline;
    }
</style>




<body style="font-family: sans-serif;">

    

    <div style="clear:both;"></div>
    <div class="header">

    
        <table style="text-align: center; margin: 0 auto;">
            <tr>
                <td>
                    <img style="width: 70px; "
                         src="data:image/jpeg;base64,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"
                        alt="">
                </td>
                <td>
                    <h1 style="font-family: serif; margin:0;">Towellers Limited</h1>
                </td>
            </tr>
            <tr>
                <td style="margin-top:-30px;padding-left:80px;" colspan="2">
                    <b style="font-family: serif; text-decoration: underline; display:block; margin:-20px 0;">PACKING SLIPE</b>
                    <b
                        style="font-family: serif; text-decoration: underline; display:block; margin:-10px 0; font-size:10px;">{{ $PackingList['heading_f_i_no'] ?? '' }}
                        &nbsp;&nbsp;{{ $PackingList['value_f_i_no'] ?? '' }} </b>
                </td>
            </tr>
        </table>
        <table border="1" style="border: 1px solid #000; border-collapse: collapse; width: 100%; margin-top:20px;">
            <tr>
                <td style="width: 50%; font-size:8px;">
                    <table border="0">
                        <tr>
                            <td>
                                <div style="border-bottom: 1px solid #000; height: 60px; width:370px;">
                                    <b
                                        style="margin: 2px; text-decoration: underline">{{ $PackingList['heading_shipper'] ?? '' }}</b>
                                    <p style="margin: 2px; ">{{ $PackingList['name_shipper'] ?? '' }}</p>
                                    <p style="margin: 2px; ">{{ $PackingList['address_shipper'] ?? '' }}</p>
                                    <p style="margin: 2px; ">
                                        {{ $PackingList['city_shipper'] ?? '' }}&nbsp;&nbsp;{{ $PackingList['country_shipper'] ?? '' }}
                                    </p>
                                    <p style="margin: 2px; ">{{ $PackingList['phone_shipper'] ?? '' }}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="height: 65px; width: 300px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <div style="width: 150px;">
                                                    <b
                                                        style="margin: 2px; text-decoration: underline">{{ $PackingList['heading_buyer'] ?? '' }}</b>
                                                    <p style="margin: 2px; ">
                                                        {{ $PackingList['name_buyer'] ?? '' }}</p>
                                                    <p style="margin: 2px; ">
                                                        {{ $PackingList['address_buyer'] ?? '' }}</p>
                                                    <p style="margin: 2px; ">
                                                        {{ $PackingList['city_buyer'] ?? '' }}&nbsp;&nbsp;{{ $PackingList['country_buyer'] ?? '' }}
                                                    </p>
                                                    <p style="margin: 2px; ">
                                                        {{ $PackingList['phone_buyer'] ?? '' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 150px;">
                                                    <b
                                                        style="margin: 2px; text-decoration: underline">{{ $PackingList['heading_ship_to'] ?? '' }}</b>
                                                    <p style="margin: 2px; ">
                                                        {{ $PackingList['name_ship_to'] ?? '' }}</p>
                                                    <p style="margin: 2px; ">
                                                        {{ $PackingList['address_ship_to'] ?? '' }}</p>
                                                    <p style="margin: 2px; ">
                                                        {{ $PackingList['city_ship_to'] ?? '' }}&nbsp;&nbsp;{{ $PackingList['country_ship_to'] ?? '' }}
                                                    </p>
                                                    <p style="margin: 2px; ">
                                                        {{ $PackingList['phone_ship_to'] ?? '' }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td>
                                <div style="border-bottom: 1px solid #000; height: 30px; width: 300px;">
                                    Exporter's Membership Number
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="height: 50px; width: 300px;">
                                    Particular of transport ( as far as known )
                                </div>
                            </td>
                        </tr> -->
                    </table>
                </td>
                <td style="width: 50%; font-size:8px; height:50px">
                    <table border="0" style="width: 100%; border-collapse: collapse; ">
                        <tr>
                            <td style="border-right:.5px solid #000;">
                                <div style=" width: 100%; text-align:center;">
                                    <b
                                        style="border-bottom:.5px solid #000; display:block; margin:0;">{{ $PackingList['heading_invioce'] ?? '' }}</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['commercial_invoice'] ?? '' }} </p>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_total_pkg'] ?? '' }}</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['total_pkg_value'] ?? '' }} </p>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_lc'] ?? '' }}#</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['lc_value'] ?? '' }}
                                    </p>

                                </div>
                            </td>
                            <td style="border-right:.5px solid #000;">
                                <div style=" width: 100%; text-align:center;">
                                    <b
                                        style="border-bottom:.5px solid #000; display:block; margin:0;">{{ $PackingList['heading_vessel'] ?? '' }}</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['vessel_value'] ?? '' }}
                                    </p>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_contract_no'] ?? '' }}</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['contract_no_value'] ?? '' }}</p>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_issue_date_lc'] ?? '' }}</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['lc_issue_date_value'] ?? '' }}</p>

                                </div>
                            </td>
                            <td>
                                <div style=" width: 100%; text-align:center;">
                                    <b
                                        style="border-bottom:.5px solid #000; display:block; margin:0;">{{ $PackingList['heading_dated'] ?? '' }}</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['dated'] ?? '' }}</p>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_contract_date'] ?? '' }}</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['contract_date_value'] ?? '' }} </p>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_pyment_terms'] ?? '' }}</b>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['pyment_terms_value'] ?? '' }} </p>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right:.5px solid #000;">
                                <div style=" width: 100%; text-align:center;">
                                    <b
                                        style="border-bottom:.5px solid #000; display:block; margin:0;">{{ $PackingList['heading_drawn_at'] ?? '' }}</b>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_drawn_under'] ?? '' }}</b>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_part_of_loading'] ?? '' }}</b>
                                    <b
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $PackingList['heading_part_of_discharge'] ?? '' }}</b>
                                </div>
                            </td>

                            <td colspan="2">
                                <div style=" width: 100%; text-align:center;">
                                    <p style="border-bottom:.5px solid #000; display:block; margin:0;">
                                        {{ $PackingList['drawn_at_value'] ?? '' }}</p>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['drawn_under_value'] ?? '' }}</p>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['port_of_loading_value'] ?? '' }}</p>
                                    <p
                                        style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $PackingList['port_of_discharge_value'] ?? '' }}</p>

                                </div>
                            </td>
                        </tr>



                    </table>
                    <table border="0" style="width: 100%; border-collapse: collapse; ">
                        <tr>
                            <td style="width: 130px;"><b
                                    style="display: block; border-right:.5px solid #000 ; border-bottom:.5px solid #000; text-align: center; ">{{ $PackingList['heading_container_no'] ?? '' }}</b>
                            </td>
                            <td style="width: 60px;"><b
                                    style="display: block; border-right:.5px solid #000 ; border-bottom:.5px solid #000; text-align: center; width: 60px;">{{ $PackingList['heading_currency'] ?? '' }}</b>
                            </td>
                            <td><b
                                    style="display: block;  border-bottom:.5px solid #000; text-align: center;">{{ $PackingList['heading_term_of_delivery'] ?? '' }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p
                                    style="border-right:.5px solid #000 ;  margin: 0px; text-align: center; width: 130px;">
                                    {{ $PackingList['container_no_value'] ?? '' }}</p>
                            </td>
                            <td>
                                <p
                                    style="border-right:.5px solid #000 ;  margin: 0px; text-align: center; width: 60px; ">
                                    {{ $PackingList['currency_value'] ?? '' }}</p>
                            </td>
                            <td>
                                <p style="  margin: 0px; text-align: center;">
                                    {{ $PackingList['term_of_delivery_value'] ?? '' }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>
    <main>



        <table border="0"
            style="border: 1px solid #000; border-collapse: collapse; width: 100%;  margin-top: 200px;">
            <thead>
                <tr style="font-size:8px; text-align: center;">
                    <th style="width: 20%; border: 1px solid;">
                        <div style="text-transform: uppercase;">
                            {{ $PackingList['heading_marks_no'] ?? '' }}
                        </div>
                    </th>

                    <th style="width: 40%; border: 1px solid;">
                        <div style="text-transform: uppercase;">
                            {{ $PackingList['heading_discription_of_goods'] ?? '' }}
                        </div>
                    </th>

                    <th style="width: 8%; border: 1px solid;">
                        <div style="text-transform: uppercase;">
                            {{-- {{ $PackingList['heading_quantity'] ?? '' }} --}}
                            {{'NET WT' }}
                        </div>
                    </th>
                    <th style="width: 9%; border: 1px solid;">
                        <div style="text-transform: uppercase; ">
                            {{-- {{ $PackingList['heading_prices'] ?? '' }} --}}
                            {{'GROSS WT' }}
                        </div>

                    </th>
                    <th style="width: 10%; border: 1px solid;">
                        <div style="text-transform: uppercase; ">
                            {{-- {{ $PackingList['heading_total_amount'] ?? '' }} --}}
                            {{'BAL/CARTON NO:' }}
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- ---------- THIS IS HEADING  TABLE ----------- -->

            <!-- ---------- THIS IS HEADING  TABLE ----------- -->
            <?php
            $grandTotal = 0;
            $palltesValueSum = [];
            $netWeightTotalSecondColumn = 0;
            $grossWeightTotalSecondColumn = 0;
            $quantitySums = [];
            $priceSums = [];
            ?>
            @for ($i = 1; $i <= 5; $i++)
                @php
                    $start = ($i - 1) * 10 + 1;
                    $end = $i * 10;
                    $hasData = false;
                @endphp

                @for ($j = $start; $j <= $end; $j++)
                    @if (
                        !empty($PackingList['color_name_second_column_value_' . $j]) ||
                            !empty($PackingList['sku_no_second_column_value_' . $j]) ||
                            !empty($PackingList['ean_no_second_column_value_' . $j]) ||
                            !empty($PackingList['style_no_second_column_value_' . $j]) ||
                            !empty($PackingList['sku_hash_no_second_column_value_' . $j])
                            )
                        @php
                            $hasData = true;
                            break;
                        @endphp
                    @endif
                @endfor

                @if (!$hasData)
                    @continue
                @endif







                <tr style="font-size:8px; ">
                    <td style=" border-right: 1px solid;">
                        <p style="width: 150px; word-wrap: break-word;">
                            {{ $PackingList['heading_long_side_' . $i] ?? '' }}
                        </p>
                        <p style="width: 150px; word-wrap: break-word;">
                            {{ $PackingList['heading_po_number_' . $i] ?? '' }} 
                        </p>
                        <p>
                            {{ $PackingList['heading_po_number_value_' . $i] ?? '' }}
                        </p>
                        <p style="width: 150px; word-wrap: break-word;">
                            {{ $PackingList['heading_style_name_' . $i] ?? '' }} 
                        </p>
                        <p>
                            {{ $PackingList['heading_style_name_value_' . $i] ?? '' }}
                        </p>
                        <p style="width: 150px; word-wrap: break-word;">
                            {{ $PackingList['heading_style_number_' . $i] ?? '' }} 
                        </p>
                        <p>
                            {{ $PackingList['heading_style_number_value_' . $i] ?? '' }}

                        </p>
                        <p style="width: 150px; word-wrap: break-word;">
                            {{ $PackingList['heading_color_left_column_' . $i] ?? '' }} 
                        </p>
                        <p>
                            {{ $PackingList['heading_color_left_column_value' . $i] ?? '' }}
                        </p>
                        <p style="width: 150px; word-wrap: break-word;">
                            {{ $PackingList['heading_size_break_down_' . $i] ?? '' }} 
                        </p>
                        <p>
                            {{ $PackingList['heading_size_break_down_value_' . $i] ?? '' }}
                        </p>
                        <p style="width: 150px; word-wrap: break-word;">
                            {{ $PackingList['heading_carton_count_' . $i] ?? '' }} 
                        </p>
                        <p>
                            {{ $PackingList['heading_carton_count_value_' . $i] ?? '' }}
                        </p>

                    </td>

                    <td style=" border-right: 1px solid;">
                        <p style="width: 260px ; word-wrap: break-word; text-align: left;">
                            <b style="text-decoration: underline;">
                                {{ $PackingList['heading_performa_invioce_no'] ?? '' }}
                                : {{ $PackingList['performa_invioce_no_value'] ?? '' }}</b>

                        </p>
                        <p style="width: 260px ; word-wrap: break-word; text-align: left;">

                            <b style="text-decoration: underline;"> {{ $PackingList['heading_po_' . $i] ?? '' }}
                                &nbsp;&nbsp; {{ $PackingList['value_po_' . $i] ?? '' }}</b>
                        </p>
                        <p style="width: 260px ; word-wrap: break-word; text-align: left;">

                            <b style="text-decoration: underline;">
                                {{ $PackingList['heading_cotton_' . $i] ?? '' }} </b>
                        </p>
                        <p style="width: 260px ; word-wrap: break-word; text-align: left;">

                            <b style="text-decoration: underline;">
                                {{ $PackingList['heading_seahorse_' . $i] ?? '' }} </b>
                        </p>
                        <p style="width: 200px ; word-wrap: break-word; text-align: left;">
                            {{ $PackingList['heading_terry_' . $i] ?? '' }}
                        </p>
                        <p style="width: 200px ; word-wrap: break-word; text-align: left;">
                            {{ $PackingList['carron_bales_pallets_value_' . $i] ?? '' }} &nbsp;&nbsp;
                            {{ $PackingList['heading_carron_bales_pallets_' . $i] ?? '' }} &nbsp;&nbsp;
                            {{ $PackingList['pcs_pack_pallet_per_value_' . $i] ?? '' }} &nbsp;&nbsp;
                            {{ $PackingList['heading_pcs_pack_pallet_per_' . $i] ?? '' }}
                        </p>
                        {{-- ============================== start heading of value sku ern etc --}}

                        <div style="text-align: left; white-space: nowrap; margin-left:10px">
                            <div
                                style="display: inline-block; width: 19%; text-decoration: underline; margin-right: 1%; font-weight: bold; color: #000;">
                                {{ $PackingList['heading_color_' . $i] ?? '' }}
                            </div>
                            <div
                                style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; font-weight: bold; color: #000;">
                                {{ $PackingList['heading_sku_no_' . $i] ?? '' }}
                            </div>
                            <div
                                style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; font-weight: bold; color: #000;">
                                {{ $PackingList['heading_ean_no_' . $i] ?? '' }}
                            </div>
                            <div
                                style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; font-weight: bold; color: #000;">
                                {{ $PackingList['heading_sku_hash_' . $i] ?? '' }}
                            </div>
                            <div
                                style="display: inline-block; width: 18%; text-decoration: underline; font-weight: bold; color: #000;">
                                {{ $PackingList['heading_style_' . $i] ?? '' }}
                            </div>
                        </div>

                        @for ($j = $start; $j <= $end; $j++)
                            @php
                                $colorName = $PackingList['color_name_second_column_value_' . $j] ?? '';
                                $skuNo = $PackingList['sku_no_second_column_value_' . $j] ?? '';
                                $eanNo = $PackingList['ean_no_second_column_value_' . $j] ?? '';
                                $skuHashNo = $PackingList['sku_hash_no_second_column_value_' . $j] ?? '';
                                $styleNo = $PackingList['style_no_second_column_value_' . $j] ?? '';
                            @endphp

                            @if ($colorName || $skuNo || $eanNo || $skuHashNo || $styleNo)
                                <div class="no-margin"
                                    style="text-align: left; white-space: nowrap; margin-top:5px; margin-left:10px">
                                    <div
                                        style="display: inline-block; width: 19%; text-decoration: underline; margin-right: 1%; color: #000;">
                                        {{ $colorName }}
                                    </div>
                                    <div
                                        style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                        {{ $skuNo }}
                                    </div>
                                    <div
                                        style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                        {{ $eanNo }}
                                    </div>
                                    <div
                                        style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                        {{ $skuHashNo }}
                                    </div>
                                    <div
                                        style="display: inline-block; width: 18%; text-decoration: underline; color: #000;">
                                        {{ $styleNo }}
                                    </div>
                                </div>


                                <div class="no-margin"
                                style="text-align: left; white-space: nowrap; margin-top:5px; margin-left:10px">
                                <div
                                    style="display: inline-block; width: 19%; text-decoration: underline; margin-right: 1%; color: #000;">
                                    {{ $colorName }}
                                </div>
                                <div
                                    style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                    {{ $skuNo }}
                                </div>
                                <div
                                    style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                    {{ $eanNo }}
                                </div>
                                <div
                                    style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                    {{ $skuHashNo }}
                                </div>
                                <div
                                    style="display: inline-block; width: 18%; text-decoration: underline; color: #000;">
                                    {{ $styleNo }}
                                </div>
                            </div>
                            <div class="no-margin"
                            style="text-align: left; white-space: nowrap; margin-top:5px; margin-left:10px">
                            <div
                                style="display: inline-block; width: 19%; text-decoration: underline; margin-right: 1%; color: #000;">
                                {{ $colorName }}
                            </div>
                            <div
                                style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                {{ $skuNo }}
                            </div>
                            <div
                                style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                {{ $eanNo }}
                            </div>
                            <div
                                style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                                {{ $skuHashNo }}
                            </div>
                            <div
                                style="display: inline-block; width: 18%; text-decoration: underline; color: #000;">
                                {{ $styleNo }}
                            </div>
                        </div>
                        <div class="no-margin"
                        style="text-align: left; white-space: nowrap; margin-top:5px; margin-left:10px">
                        <div
                            style="display: inline-block; width: 19%; text-decoration: underline; margin-right: 1%; color: #000;">
                            {{ $colorName }}
                        </div>
                        <div
                            style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                            {{ $skuNo }}
                        </div>
                        <div
                            style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                            {{ $eanNo }}
                        </div>
                        <div
                            style="display: inline-block; width: 18%; text-decoration: underline; margin-right: 1%; color: #000;">
                            {{ $skuHashNo }}
                        </div>
                        <div
                            style="display: inline-block; width: 18%; text-decoration: underline; color: #000;">
                            {{ $styleNo }}
                        </div>
                    </div>

      
                            @endif
                        @endfor

                        {{-- <div>
                            <p style=" margin-top:10px; word-wrap: break-word;">
                                NET WEIGHT: &nbsp; &nbsp; &nbsp;
                                {{ $PackingList['net_weight_second_column_value_' . $i] ?? 0 }} KGS

                            </p>
                            <p style=" margin-top:2px; word-wrap: break-word;">
                                GR WEIGHT &nbsp; &nbsp; &nbsp;
                                {{ $PackingList['gross_weight_second_column_value_' . $i] ?? 0 }} KGS

                            </p>
                        </div> --}}


                        <?php
                        
                            $palletValue = $PackingList['carron_bales_pallets_value_' . $i] ?? '';
                            $palletUnit = $PackingList['heading_carron_bales_pallets_' . $i] ?? '';
                
                            if (is_numeric($palletValue)) {
                                $palletValue = (float) $palletValue;
                                // Sum the quantities based on their units
                                if (isset($palltesValueSum[$palletUnit])) {
                                    $palltesValueSum[$palletUnit] += $palletValue;
                                } else {
                                    $palltesValueSum[$palletUnit] = $palletValue;
                                }
                            } 

                            $perValue = $PackingList['pcs_pack_pallet_per_value_' . $i] ?? '';
                            $perUnit = $PackingList['heading_pcs_pack_pallet_per_' . $i] ?? '';
                
                            // if (is_numeric($perValue)) {
                            //     $perValue = (float) $perValue;
                            //     // Sum the quantities based on their units
                            //     if (isset($perValueSum[$perUnit])) {
                            //         $perValueSum[$perUnit] += $perValue;
                            //     } else {
                            //         $perValueSum[$perUnit] = $perValue;
                            //     }
                            // }
                            
                            // gr total and net total second column
                            if (isset($PackingList['gross_weight_second_column_value_' . $i])) {
                                $grossWeightTotalSecondColumn += $PackingList['gross_weight_second_column_value_' . $i];
                            }
                            // gr total and net total second column
                            if (isset($PackingList['net_weight_second_column_value_' . $i])) {
                                $netWeightTotalSecondColumn += $PackingList['net_weight_second_column_value_' . $i];
                            }
                        ?>
                    </td>
                    <td style="border-right: 1px solid; text-align: center">
                        <p style="width: 40px; word-wrap: break-word; margin-top:106px ">
                         
                            @php
                            // Initialize sum for the current chunk
                            $chunkSum = 0;
                        @endphp
                    
                        @for ($j = $start; $j <= $end; $j++)
                            @php
                                // Extract quantity and unit from current iteration
                                $quantity = $PackingList['quantity_third_column_value_' . $j] ?? '';
                                $unit = $PackingList['quantity_unit_third_column_value_' . $j] ?? '';
                    
                                // Check if quantity is numeric
                                if (is_numeric($quantity) && isset($quantity)) {
                                    $quantity = (float) $quantity;
                                    $chunkSum += $quantity; // Add quantity to chunk sum
                    
                                    // Sum the quantities based on their units
                                    if (isset($quantitySums[$unit])) {
                                        $quantitySums[$unit] += $quantity;
                                    } else {
                                        $quantitySums[$unit] = $quantity;
                                    }
                                }
                            @endphp
                              <p style="margin:5px 0;">
                                {{ $PackingList['quantity_third_column_value_' . $j] ?? '' }} 
                                {{ $PackingList['quantity_unit_third_column_value_' . $j] ?? '' }}</p>
                        @endfor
                    
                        {{-- Display sum for the current chunk --}}
                      
                    
                    {{-- @php
                        // Display sum of quantities for each unit after all loops complete
                       var_dump($quantitySums);
                       die;
                    @endphp --}}
                        </p>
                    </td>
                    <td style="border-right: 1px solid; text-align: center">
                        <p style="width: 40px; word-wrap: break-word; margin-top:106px">
                            @for ($j = $start; $j <= $end; $j++)

                            @php
                            // Extract quantity and unit from current iteration
                            $price = $PackingList['price_third_column_value_' . $j] ?? '';
                            $unit = $PackingList['price_unit_third_column_value_' . $j] ?? '';
                
                            // Check if quantity is numeric
                            if (is_numeric($price)) {
                                $price = (float) $price;
                                $chunkSum += $price; // Add quantity to chunk sum
                
                                // Sum the quantities based on their units
                                if (isset($priceSums[$unit])) {
                                    $priceSums[$unit] += $price;
                                } else {
                                    $priceSums[$unit] = $price;
                                }
                            }
                        @endphp
                                <p style="margin:5px 0;">
                                    {{ $PackingList['price_third_column_value_' . $j] ?? '' }} 
                                    {{ $PackingList['price_unit_third_column_value_' . $j] ?? '' }}</p>
                            @endfor
                        </p>
                    </td>
                    <td style="text-align: center"> 
                        <p style="width: 30px; word-wrap: break-word;margin-top:106px ">
                            @for ($j = $start; $j <= $end; $j++)
                                <p style="margin:5px 0; margin-left:2px">
                                    {{ $PackingList['total_amount_third_column_value_' . $j] > 0 ? $PackingList['currency_symbol'] : '' }}
                                    
                                    {{ $PackingList['total_amount_third_column_value_' . $j] > 0 ? $PackingList['total_amount_third_column_value_' . $j] : '' }}
                                </p>
                                <?php
                                // Add to the grand total if the value exists
                                if (isset($PackingList['price_third_column_value_' . $j])) {
                                    $grandTotal += $PackingList['price_third_column_value_' . $j];
                                }
                                ?>
                            @endfor
                        </p>
                    </td>


                </tr>



                
                @if (($j - $start + 1) % 8 == 0 && $j != $end)
               
                <div style="page-break-after: always; margin-top:-60px"></div>
                {{-- Insert a page break --}}
         
            @endif



            @endfor
           
         





            <!-- ============ >>THIRD <<< =========== -->

            <!-- ============ >>THIRD<<< =========== -->


            <tr style="font-size:8px;">
                <td style=" border-right: 1px solid; border-top:1px solid #000; ">
                    <div style="width: 150px; word-wrap: break-word;">

                    </div>
                </td>

                <td style=" border-right: 1px solid; border-top:1px solid #000;" colspan="2">
                    <div style=" word-wrap: break-word; text-align: left;">
                        <table border="0" style=" border-collapse: collapse; width: 100%; border-top: 0;">
                            <tr>

                                <td>
                                    <div style="font-size:8px;"> 
                                        @php
                                        $pallets = $palltesValueSum;
                                        // $perValues = $perValueSum;
                                        $quantities = $quantitySums;
                                        // var_dump($quantities);
                                        // die;
                                    @endphp
                                    
                                    <!-- Display Pallets -->
                                    @foreach ($pallets as $key => $item)
                                        {{ $item . ' ' . $key }}
                                        @if (!$loop->last)
                                            +
                                        @endif
                                    @endforeach
                                    
                                  
                                    
                                    <!-- Display Per Values -->
                                   
                                    
                                    @if ((count($pallets) > 0 ) && count($quantities) > 0)
                                        =
                                    @endif
                                    
                                    <!-- Display Quantities -->
                                    @foreach ($quantities as $key => $item)
                                        {{ $item . ' ' . $key }}
                                        @if (!$loop->last)
                                            +
                                        @endif
                                    @endforeach
                                    
                                 </div>
                                </td>

                                <td>
                                    <div style="font-size:8px;"></div>
                                </td>



                            </tr>
                        </table>
                    </div>
                </td>
                <td style="border-right: 1px solid; border-top:1px solid #000;  text-align: center">
                   
                        {{-- @foreach ($prices as $key => $item)
                        {{ $item . ' ' . $key }}
                        @if (!$loop->last)
                            +
                        @endif
                    @endforeach --}}
                    {{  $grandTotal ?? '' }}
                    
                </td>
                <td style="border-right: 1px solid; border-top:1px solid #000; text-align: center">
                    <div style="width: 60px; word-wrap: break-word; font-size:8px;">
                        
                    </div>
                </td>
            </tr>
        </table>
        <div style="clear:both;"></div>
       
        {{-- <table border="0" style=" margin-top: 2px; border-collapse: collapse; width: 100%;font-size:8px;">
            <tr>
                <td style="width: 33.33%;">
                    <table border="0"
                        style="border: 1px solid #000; border-collapse: collapse; width: 100%;font-size:8px;">
                        <tr>
                            {{-- <td style="border-right:1px solid #000 ;">
                                <div> {{ $PackingList['heading_total_net_weight'] ?? '' }}
                                    : </div>
                            </td>
                            <td>
                                <div style="text-align: center;">{{ $netWeightTotalSecondColumn }} KGS</div>
                            </td> --}}
                        {{-- </tr>
                        <tr> --}}
                            {{-- <td style="border-right:1px solid #000 ;">
                                <div> {{ $PackingList['heading_total_gr_weight'] ?? '' }}: </div>
                            </td>
                            <td>
                                <div style="text-align: center;">{{ $grossWeightTotalSecondColumn }} KGS</div>
                            </td> --}}
                        {{-- </tr>
                        <tr> --}}
                            {{-- <td style="border-top:1px solid #000 ;" colspan="2">
                                <div>{{ $PackingList['heading_note'] ?? '' }} :
                                    {{ $PackingList['note_value'] ?? '' }} </div>
                            </td> --}}
                        {{-- </tr>
                    </table>
                </td>
                <td style="width: 33.33%; visibility: hidden;">
                    <table border="0"
                        style="border: 1px solid #000; border-collapse: collapse; width: 100%; font-size:8px; opacity: 0 ;">
                        <tr>
                            <td style="border-right:1px solid #000 ;">
                                <div>{{ $PackingList['heading_total_net_weight'] ?? '' }}: </div>
                            </td>
                            <td>
                                <div style="text-align: center;">230.00 KGS </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right:1px solid #000 ;">
                                <div>{{ $PackingList['heading_total_gr_weight'] ?? '' }}: </div>
                            </td>
                            <td>
                                <div style="text-align: center;">280.00 KGS </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top:1px solid #000 ;" colspan="2">
                                <div>{{ $PackingList['heading_note'] ?? '' }}: 51.60 KGS </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 33.33%;">
                    {{-- <table border="0"
                        style="border: 1px solid #000; border-collapse: collapse; width: 100%;font-size:8px;">
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_total_buyer_discount'] ?? '' }}</div>
                            </td>
                            <td>
                                <div style="text-align: right;">
                                    {{ isset($PackingList['value_total_buyer_discount']) ? $PackingList['currency_symbol'] : '' }}
                                    {{ $PackingList['value_total_buyer_discount'] ?? '' }} </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_total_less_commission'] ?? '' }}</div>
                            </td>
                            <td>
                                <div style="text-align: right;">
                                    {{ isset($PackingList['value_total_less_commission']) ? $PackingList['currency_symbol'] : '' }}
                                    {{ $PackingList['value_total_less_commission'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_total_add_fright'] ?? '' }}</div>
                            </td>
                            <td>
                                <div style="text-align: right;">
                                    {{ isset($PackingList['value_total_add_fright']) ? $PackingList['currency_symbol'] : '' }}
                                    {{ $PackingList['value_total_add_fright'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_total_net_amount_payable'] ?? '' }} </div>
                            </td>
                            <td>
                                <div style="text-align: right;">
                                    {{isset($PackingList['value_total_net_amount_payable']) ? $PackingList['currency_symbol'] : '' }}
                                    {{ $PackingList['value_total_net_amount_payable'] ?? '' }} </div>
                            </td>
                        </tr>

                    </table> --}}
                {{-- </td>
            </tr>
        </table>  --}}
        <p style="font-size:8px;">{{ $PackingList['heading_note'] ?? '' }} :
            {{ $PackingList['note_value'] ?? '' }} </p>
        <table border="1" style=" margin-top: 4px; border-collapse: collapse; width: 100%;font-size:8px;">
            <tr>
                <td style="width: 55%;">
                    <table border="0"
                        style="  height: 130px;  border-collapse: collapse; width: 100%;font-size:8px;">
                        <tr>
                            <td>
                                <div><b>BANK OPTION</b></div>
                            </td>
                            <td>
                                <div><b>BANK DETAIL</b></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_intermediary_bank'] ?? '' }} </div>
                            </td>
                            <td>
                                
                                <div> {{ $PackingList['value_intermediary_bank'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_intermediary_bank_swift_no'] ?? '' }} </div>
                            </td>
                            <td>
                                <div>{{ $PackingList['value_intermediary_bank_swift_no'] ?? '' }} </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_intermediary_bank_ac_no'] ?? '' }}:</div>
                            </td>
                            <td>
                                <div>{{ $PackingList['value_intermediary_bank_ac_no'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_for_onword_credit_to'] ?? '' }} :</div>
                            </td>
                            <td>
                                <div>{{ $PackingList['value_for_onword_credit_to'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_tw_ac_no'] ?? '' }} </div>
                            </td>
                            <td>
                                <div>{{ $PackingList['value_tw_ac_no'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_swift_no'] ?? '' }} : </div>
                            </td>
                            <td>
                                <div>{{ $PackingList['value_swift_no'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_iban_no'] ?? '' }} : </div>
                            </td>
                            <td>
                                <div>{{ $PackingList['value_iban_no'] ?? '' }} </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $PackingList['heading_bank_addrss'] ?? '' }} :</div>
                            </td>
                            <td>
                                <div>{{ $PackingList['value_bank_addrss'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>{{ $PackingList['value_bank_addrss_1'] ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>{{ $PackingList['value_bank_addrss_2'] ?? '' }}</div>

                            </td>
                        </tr>

                    </table>
                </td>
                <td style="width: 45%; vertical-align: top;">
                    <table border="0" style="height: 130px; border-collapse: collapse; width: 100%; font-size: 8px;">
                        <tr style="width: 30%;">
                            <td style="vertical-align: top; padding-bottom: 26px;">
                                <div style="text-align: center;">
                                    <b>“{{ $PackingList['heading_statement_origin'] ?? '' }} ” </b>
                                    <p style="text-align: center;vertical-align: top; margin-top: 5px; word-wrap: break-word;">
                                        <div style="display: inline-block; text-align: center;">
                                            {{ $PackingList['value_statement_origin'] ?? '' }}
                                        </div>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr style="width: 40%;">
                          
                        </tr>
                    </table>
                </td>
                


            </tr>

        </table>
        <table border="0" style=" margin-top: 4px; border-collapse: collapse; width: 100%;font-size:8px;">
            <tr>
                <td>
                    <div style="width: 20%; margin-left:auto; text-align: center; margin-top: 10px;">
                        <input type="text"
                            style="border: 0; border-bottom: .5px solid #000; display: block; margin: 0 auto;">
                        EXPORT MANAGER

                    </div>
                </td>
            </tr>
        </table>
        <table border="0"
            style=" border: 1px solid #000; margin-top:4px ; border-collapse: collapse; width: 100%;font-size:8px;">
            <tr>
                <td>
                    <div style="margin-left:auto; text-align: center; ">
                        THE GOODS COVERED UNDER THIS INVOICE ARE THE PROPERTY OF TOWELLERS LTD UNTIL ITS PAYMENT
                        RECEIVED. <br>
                        We hereby declare that all the particulars stated in respect of the Goods are true and correct.
                        <br>
                        CERTIFIED THAT THE ABOVE GOODS/FABRIC ARE MANUFACTURED IN PAKISTAN <br>
                    </div>
                </td>
            </tr>
        </table>

  

    <script type="text/php">
        if ( isset($pdf) ) {
            // OLD
            // $font = Font_Metrics::get_font("helvetica", "bold");
            // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(255,0,0));
            // v.0.7.0 and greater
            $x = 35;
            $y = 810;
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $font = $fontMetrics->get_font("sans-serif");
            $size = 7;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
   
      </main>
</body>

</html>
