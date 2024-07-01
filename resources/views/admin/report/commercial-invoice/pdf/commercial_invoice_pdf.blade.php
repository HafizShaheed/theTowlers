<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<style>
    @page {
        margin: 0px;
    }

    body {
        margin: 40px;
    }

    .header {
        position: fixed;
        top: 12px;
        left: 0px;
        right: 0px;
        height: 20px;
        /* background-color: #f2f2f2; */
        text-align: center;
        line-height: 20px;
    }

    .content {
        margin-top: 60px;
        padding: 20px;
        margin-bottom: 0px;
    }
    .page-break {
    page-break-before: always; /* or page-break-after: always; */
}
</style>

</html>

<body style="font-family: sans-serif;">
    <div class="header">

        <table style="text-align: center; margin: 0 auto;">
            <tr>
                <td>
                    <img style="width: 70px; " src="data:image/jpeg;base64,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" alt="">
                </td>
                <td>
                    <h1 style="font-family: serif; margin:0;">Towellers Limited</h1>
                </td>
            </tr>
            <tr>
                <td style="margin-top:-30px;padding-left:80px;" colspan="2">
                    <b style="font-family: serif; text-decoration: underline; display:block; margin:-20px 0;">COMMERCIAL INVOICE</b>
                    <b style="font-family: serif; text-decoration: underline; display:block; margin:-10px 0; font-size:10px;">{{ $CommercialInvoice['heading_f_i_no'] ?? "" }} &nbsp;&nbsp;{{ $CommercialInvoice['value_f_i_no'] ?? "" }} </b>
                </td>
            </tr>
        </table>
    </div>
    <div class="content">
        <!-- @yield('content') -->

        <table border="1" style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
            <tr>
                <td style="width: 50%; font-size:8px;">
                    <table border="0">
                        <tr>
                            <td>
                                <div style="border-bottom: 1px solid #000; height: 60px; width:370px;">
                                    <b style="margin: 2px; text-decoration: underline">{{ $CommercialInvoice['heading_shipper'] ?? "" }}</b>
                                    <p style="margin: 2px; ">{{ $CommercialInvoice['name_shipper'] ?? "" }}</p>
                                    <p style="margin: 2px; ">{{ $CommercialInvoice['address_shipper'] ?? "" }}</p>
                                    <p style="margin: 2px; ">{{ $CommercialInvoice['city_shipper'] ?? "" }}&nbsp;&nbsp;{{ $CommercialInvoice['country_shipper'] ?? "" }}  </p>
                                    <p style="margin: 2px; ">{{ $CommercialInvoice['phone_shipper'] ?? "" }}</p>
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
                                                    <b style="margin: 2px; text-decoration: underline">{{ $CommercialInvoice['heading_buyer'] ?? "" }}</b>
                                                    <p style="margin: 2px; ">{{ $CommercialInvoice['name_buyer'] ?? "" }}</p>
                                                    <p style="margin: 2px; ">{{ $CommercialInvoice['address_buyer'] ?? "" }}</p>
                                                    <p style="margin: 2px; ">{{ $CommercialInvoice['city_buyer'] ?? "" }}&nbsp;&nbsp;{{ $CommercialInvoice['country_buyer'] ?? "" }}  </p>
                                                    <p style="margin: 2px; ">{{ $CommercialInvoice['phone_buyer'] ?? "" }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 150px;">
                                                    <b style="margin: 2px; text-decoration: underline">{{ $CommercialInvoice['heading_ship_to'] ?? "" }}</b>
                                                    <p style="margin: 2px; ">{{ $CommercialInvoice['name_ship_to'] ?? "" }}</p>
                                                    <p style="margin: 2px; ">{{ $CommercialInvoice['address_ship_to'] ?? "" }}</p>
                                                    <p style="margin: 2px; ">{{ $CommercialInvoice['city_ship_to'] ?? "" }}&nbsp;&nbsp;{{ $CommercialInvoice['country_ship_to'] ?? "" }}  </p>
                                                    <p style="margin: 2px; ">{{ $CommercialInvoice['phone_ship_to'] ?? "" }}</p>
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
                                    <b style="border-bottom:.5px solid #000; display:block; margin:0;">{{ $CommercialInvoice['heading_invioce'] ?? "" }}</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['commercial_invoice'] ?? "" }} </p>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_total_pkg'] ?? "" }}</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['total_pkg_value'] ?? "" }}  </p>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_lc'] ?? "" }}#</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['lc_value'] ?? "" }}
                                    </p>

                                </div>
                            </td>
                            <td style="border-right:.5px solid #000;">
                                <div style=" width: 100%; text-align:center;">
                                    <b style="border-bottom:.5px solid #000; display:block; margin:0;">{{ $CommercialInvoice['heading_vessel'] ?? "" }}</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['vessel_value'] ?? "" }}
                                    </p>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_contract_no'] ?? "" }}</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['contract_no_value'] ?? "" }}</p>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_issue_date_lc'] ?? "" }}</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['lc_issue_date_value'] ?? "" }}</p>

                                </div>
                            </td>
                            <td>
                                <div style=" width: 100%; text-align:center;">
                                    <b style="border-bottom:.5px solid #000; display:block; margin:0;">{{ $CommercialInvoice['heading_dated'] ?? "" }}</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['dated'] ?? "" }}</p>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_contract_date'] ?? "" }}</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['contract_date_value'] ?? "" }}   </p>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_pyment_terms'] ?? "" }}</b>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                        {{ $CommercialInvoice['pyment_terms_value'] ?? "" }} </p>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right:.5px solid #000;">
                                <div style=" width: 100%; text-align:center;">
                                    <b style="border-bottom:.5px solid #000; display:block; margin:0;">{{ $CommercialInvoice['heading_drawn_at'] ?? "" }}</b>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_drawn_under'] ?? "" }}</b>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_part_of_loading'] ?? "" }}</b>
                                    <b style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">{{ $CommercialInvoice['heading_part_of_discharge'] ?? "" }}</b>
                                </div>
                            </td>

                            <td colspan="2">
                                <div style=" width: 100%; text-align:center;">
                                    <p style="border-bottom:.5px solid #000; display:block; margin:0;"> {{ $CommercialInvoice['drawn_at_value'] ?? "" }}</p>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                     {{ $CommercialInvoice['drawn_under_value'] ?? "" }}</p>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                         {{ $CommercialInvoice['port_of_loading_value'] ?? "" }}</p>
                                    <p style="border:.5px solid #000; display:block; margin:0; border-left: 0; border-right:0;">
                                         {{ $CommercialInvoice['port_of_discharge_value'] ?? "" }}</p>

                                </div>
                            </td>
                        </tr>



                    </table>
                    <table border="0" style="width: 100%; border-collapse: collapse; ">
                        <tr>
                            <td style="width: 130px;"><b style="display: block; border-right:.5px solid #000 ; border-bottom:.5px solid #000; text-align: center; ">{{ $CommercialInvoice['heading_container_no'] ?? "" }}</b></td>
                            <td style="width: 60px;"><b style="display: block; border-right:.5px solid #000 ; border-bottom:.5px solid #000; text-align: center; width: 60px;">{{ $CommercialInvoice['heading_currency'] ?? "" }}</b>
                            </td>
                            <td><b style="display: block;  border-bottom:.5px solid #000; text-align: center;">{{ $CommercialInvoice['heading_term_of_delivery'] ?? "" }}</b></td>
                        </tr>
                        <tr>
                            <td>
                                <p style="border-right:.5px solid #000 ;  margin: 0px; text-align: center; width: 130px;">
                                 {{ $CommercialInvoice['container_no_value'] ?? "" }}</p>
                            </td>
                            <td>
                                <p style="border-right:.5px solid #000 ;  margin: 0px; text-align: center; width: 60px; ">
                                     {{ $CommercialInvoice['currency_value'] ?? "" }}</p>
                            </td>
                            <td>
                                <p style="  margin: 0px; text-align: center;">{{ $CommercialInvoice['term_of_delivery_value'] ?? "" }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table border="0" style="border: 1px solid #000; border-collapse: collapse; width: 100%; ">
            <!-- ---------- THIS IS HEADING  TABLE ----------- -->
            <tr style="font-size:8px; text-align: center;">
                <th style="width: 20%; border-right: 1px solid;">
                    <div style="text-transform: uppercase;">
                        {{ $CommercialInvoice['heading_marks_no'] ?? "" }}
                    </div>
                </th>

                <th style="width: 40%; border-right: 1px solid;">
                    <div style="text-transform: uppercase;">
                        {{ $CommercialInvoice['heading_discription_of_goods'] ?? "" }}
                    </div>
                </th>

                <th style="width: 8%; border-right: 1px solid;">
                    <div style="text-transform: uppercase;">
                        {{ $CommercialInvoice['heading_quantity'] ?? "" }}
                    </div>
                </th>
                <th style="width: 9%; border-right: 1px solid;">
                    <div style="text-transform: uppercase; ">
                        {{ $CommercialInvoice['heading_prices'] ?? "" }}
                    </div>

                </th>
                <th style="width: 10%; border-right: 1px solid;">
                    <div style="text-transform: uppercase; ">
                        {{ $CommercialInvoice['heading_total_amount'] ?? "" }}
                    </div>
                </th>
            </tr>
            <!-- ---------- THIS IS HEADING  TABLE ----------- -->
            <?php 
            $grandTotal = 0;
            ?>
            @for ($i=1; $i<=5; $i++)
                @php
                $start = ($i - 1) * 10 + 1;
                $end = $i * 10;
                @endphp


 


                
            <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid;">
                    <div style="width: 150px; word-wrap: break-word;">

                    </div>
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 260px ; word-wrap: break-word; text-align: left;">
                        <b style="text-decoration: underline;">                        {{ $CommercialInvoice['heading_performa_invioce_no'] ?? "" }}
                            : {{ $CommercialInvoice['performa_invioce_no_value'] ?? "" }}</b>
                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td>
                    <div style="width: 30px; word-wrap: break-word;">

                    </div>
                </td>


            </tr>
            <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid; border-bottom:.5px solid #000;">
                    <div style="width: 150px; word-wrap: break-word;">
                        {{$CommercialInvoice["heading_long_side_" . $i] ?? ''}}
                      
                    </div>
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 200px ; word-wrap: break-word; text-align: left;">
                        <b style="text-decoration: underline;"> {{$CommercialInvoice["heading_po_" . $i] ?? ''}} &nbsp;&nbsp; {{$CommercialInvoice["value_po_" . $i] ?? ''}}</b>
                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td>
                    <div style="width: 30px; word-wrap: break-word;">

                    </div>
                </td>


            </tr>
            <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid;">
                    <div style="width: 150px; word-wrap: break-word;">
                        {{$CommercialInvoice["heading_po_number_" . $i] ?? ''}} &nbsp;&nbsp; {{$CommercialInvoice["heading_po_number_value_" . $i] ?? ''}}
                    </div>
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 200px ; word-wrap: break-word; text-align: left;">
                        <b style="text-decoration: underline;"> {{$CommercialInvoice["heading_cotton_" . $i] ?? ''}} </b>
                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td>
                    <div style="width: 30px; word-wrap: break-word;">

                    </div>
                </td>

            </tr>
            <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid;">
                    <div style="width: 150px; word-wrap: break-word;">
                        {{$CommercialInvoice["heading_style_name_" . $i] ?? ''}} &nbsp;&nbsp; {{$CommercialInvoice["heading_style_name_value_" . $i] ?? ''}}
                    </div>
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 200px ; word-wrap: break-word; text-align: left;">
                        <b style="text-decoration: underline;"> {{$CommercialInvoice["heading_seahorse_" . $i] ?? ''}}  </b>

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>

                <td>
                    <div style="width: 30px; word-wrap: break-word;">

                    </div>
                </td>


            </tr>
            <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid;">
                    <div style="width: 150px; word-wrap: break-word;">
                        {{$CommercialInvoice["heading_style_number_" . $i] ?? ''}} &nbsp;&nbsp; {{$CommercialInvoice["heading_style_number_value_" . $i] ?? ''}}

                    </div>
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 200px ; word-wrap: break-word; text-align: left;">
                        {{$CommercialInvoice["heading_terry_" . $i] ?? ''}}


                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>

                <td>
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>


            </tr>
            <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid;">
                    <div style="width: 150px; word-wrap: break-word;">
                        {{$CommercialInvoice["heading_color_left_column_" . $i] ?? ''}} &nbsp;&nbsp;  {{$CommercialInvoice["heading_color_left_column_value" . $i] ?? ''}} 
                    </div>
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 200px ; word-wrap: break-word; text-align: left;">
                        {{$CommercialInvoice["carron_bales_pallets_value_" . $i] ?? ''}} &nbsp;&nbsp;  {{$CommercialInvoice["heading_carron_bales_pallets_" . $i] ?? ''}} &nbsp;&nbsp;  {{$CommercialInvoice["pcs_pack_pallet_per_value_" . $i] ?? ''}} &nbsp;&nbsp; {{$CommercialInvoice["heading_pcs_pack_pallet_per_" . $i] ?? ''}}
                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>

                <td>
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>


            </tr>
            <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid;">
                    <div style="width: 150px; word-wrap: break-word;">
                        {{$CommercialInvoice["heading_size_break_down_" . $i] ?? ''}} &nbsp;&nbsp;  {{$CommercialInvoice["heading_size_break_down_value_" . $i] ?? ''}} 
                    </div>
                    <div style="width: 150px; word-wrap: break-word;">
                        {{$CommercialInvoice["heading_carton_count_" . $i] ?? ''}} &nbsp;&nbsp;  {{$CommercialInvoice["heading_carton_count_value_" . $i] ?? ''}} 
                    </div>
                    <div style="width: 150px; word-wrap: break-word; opacity:0;">
                        Desc:
                    </div>
                    <div style="width: 150px; word-wrap: break-word; opacity:0;">
                        LOT
                    </div>
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 200px ; word-wrap: break-word; text-align: left;">
                        <table>
                               

                            <tr>
                                <th style="width: 25%;">
                                    <div style="text-decoration: underline; width: 60px; text-align: left;"> {{$CommercialInvoice["heading_color_" . $i] ?? ''}}</div>
                                </th>
                                <th style="width: 15%;">
                                    <div style="text-decoration: underline; width: 60px; text-align: left;">{{$CommercialInvoice["heading_sku_no_" . $i] ?? ''}}</div>
                                </th>
                                <th style="width: 8%;">
                                    <div style="text-decoration: underline; width: 60px; text-align: left;">{{$CommercialInvoice["heading_ean_no_" . $i] ?? ''}}</div>
                                </th>
                                <th style="width: 18%;">
                                    <div style="text-decoration: underline; width: 60px; text-align: left;">{{$CommercialInvoice["heading_sku_hash_" . $i] ?? ''}}</div>
                                </th>
                                <th style="width: 15%;">
                                    <div style="text-decoration: underline; width: 60px; text-align: left;">{{$CommercialInvoice["heading_style_" . $i] ?? ''}}</div>
                                </th>
                                <!-- <th style="width: 25%;">
                                <div style="text-decoration: underline; width: 60px; text-align: left;">PCS</div>
                            </th> -->
                            </tr>
                            @for ($j = $start; $j <= $end; $j++)
                            <tr>
                                <td>
                                    <div style=" width: 60px;">
                                        <p style="margin: 0;">{{$CommercialInvoice["color_name_second_column_value_" . $j] ?? ''}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div style=" width: 60px;">
                                        <p style="margin: 0;">{{$CommercialInvoice["sku_no_second_column_value_" . $j] ?? ''}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div style=" width: 60px;">
                                        <p style="margin: 0;">{{$CommercialInvoice["ean_no_second_column_value_" . $j] ?? ''}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div style=" width: 60px;">
                                        <p style="margin: 0;">{{$CommercialInvoice["sku_hash_no_second_column_value_" . $j] ?? ''}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div style=" width: 60px;">
                                        <p style="margin: 0;">{{$CommercialInvoice["style_no_second_column_value_" . $j] ?? ''}}</p>
                                    </div>
                                </td>
                                <!-- <td>
                                <div style=" width: 60px; text-align: right;">8,000</div>
                            </td> -->
                            </tr>
                            @endfor
                            
                        </table>
                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 60px; word-wrap: break-word;">
                        @for ($j = $start; $j <= $end; $j++)
                        <p style="margin:5px 0; opacity:0;">512 PCS</p>
                        <p style="margin:5px 0;">{{$CommercialInvoice["quantity_third_column_value_" . $j] ?? ''}} PCS</p>
                        @endfor

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 60px; word-wrap: break-word;">
                        @for ($j = $start; $j <= $end; $j++)
                        <p style="margin:5px 0; opacity:0;">512 PCS</p>
                        <p style="margin:5px 0;">{{$CommercialInvoice["currency_symbol"] ?? ''}} &nbsp;&nbsp; {{$CommercialInvoice["price_third_column_value_" . $j] ?? ''}} </p>
                        @endfor
                    </div>
                </td>

                <td>
                    <div style="width: 80px; word-wrap: break-word;">
                        @for ($j = $start; $j <= $end; $j++)
                        <p style="margin:5px 0; opacity:0;">512 PCS</p>
                        <p style="margin:5px 0;">{{$CommercialInvoice["currency_symbol"] ?? ''}} &nbsp;&nbsp; {{$CommercialInvoice["total_amount_third_column_value_" . $j] ?? ''}} </p>
                        <?php
                        // Add to the grand total if the value exists
                        if (isset($CommercialInvoice["total_amount_third_column_value_" . $j])) {
                            $grandTotal += $CommercialInvoice["total_amount_third_column_value_" . $j];
                        }
                        ?>
                        @endfor
                    </div>
                </td>


            </tr>
     

           <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid;">
                  
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 200px ; word-wrap: break-word; text-align: left;">
                        <div style="width: 150px; word-wrap: break-word;">
                            GR WEIGHT: &nbsp; &nbsp; &nbsp; 155.00 KGS2
                        </div>
                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td>
                    <div style="width: 30px; word-wrap: break-word;">

                    </div>
                </td>

            </tr> 
            
      
           

            <tr style="font-size:8px; ">
                <td style=" border-right: 1px solid;">
                 
                </td>

                <td style=" border-right: 1px solid;">
                    <div style="width: 200px ; word-wrap: break-word; text-align: left;">
                        <div style="width: 150px; word-wrap: break-word;">
                            GROSS WEIGHT:2
                        </div>
                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td style="border-right: 1px solid;">
                    <div style="width: 40px; word-wrap: break-word;">

                    </div>
                </td>
                <td>
                    <div style="width: 30px; word-wrap: break-word;">

                    </div>
                </td>

            </tr>
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
                                    <div style="font-size:8px;">200 CRTNS +</div>
                                </td>
                                <td>
                                    <div style="font-size:8px;">200 BALES +</div>
                                </td>
                                <td>
                                    <div style="font-size:8px;">200 PALLETS +</div>
                                </td>
                                <td>
                                    <div style="font-size:8px;">1536 PCS + </div>
                                </td>
                                <td>
                                    <div style="font-size:8px;">1536 PACKS +</div>
                                </td>
                                <td>
                                    <div style="font-size:8px;">60 SETS </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="border-right: 1px solid; border-top:1px solid #000;">
                    <div style="width: 40px; word-wrap: break-word;">
                        TOTAL
                    </div>
                </td>
                <td style="border-right: 1px solid; border-top:1px solid #000;">
                    <div style="width: 60px; word-wrap: break-word; font-size:8px;">
                        {{$CommercialInvoice["currency_symbol"] ?? ''}} {{$grandTotal}}
                    </div>
                </td>
            </tr>
        </table>
        <div class="page-break"></div>
        <div style="page-break-after:auto; margin-top:100px">
        <table border="0" style=" margin-top: 2px; border-collapse: collapse; width: 100%;font-size:8px;">
            <tr>
                <td style="width: 33.33%;">
                    <table border="0" style="border: 1px solid #000; border-collapse: collapse; width: 100%;font-size:8px;">
                        <tr>
                            <td style="border-right:1px solid #000 ;">
                                <div>                        {{ $CommercialInvoice['heading_total_net_weight'] ?? "" }}
                                    : </div>
                            </td>
                            <td>
                                <div style="text-align: center;">230.00 KGS </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right:1px solid #000 ;">
                                <div> {{ $CommercialInvoice['heading_total_gr_weight'] ?? "" }}: </div>
                            </td>
                            <td>
                                <div style="text-align: center;">280.00 KGS </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top:1px solid #000 ;" colspan="2">
                                <div>{{ $CommercialInvoice['heading_note'] ?? "" }}: 51.60 KGS </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 33.33%; visibility: hidden;">
                    <table border="0" style="border: 1px solid #000; border-collapse: collapse; width: 100%; font-size:8px; opacity: 0 ;">
                        <tr>
                            <td style="border-right:1px solid #000 ;">
                                <div>{{ $CommercialInvoice['heading_total_net_weight'] ?? "" }}: </div>
                            </td>
                            <td>
                                <div style="text-align: center;">230.00 KGS </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right:1px solid #000 ;">
                                <div>{{ $CommercialInvoice['heading_total_gr_weight'] ?? "" }}: </div>
                            </td>
                            <td>
                                <div style="text-align: center;">280.00 KGS </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top:1px solid #000 ;" colspan="2">
                                <div>{{ $CommercialInvoice['heading_note'] ?? "" }}: 51.60 KGS </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 33.33%;">
                    <table border="0" style="border: 1px solid #000; border-collapse: collapse; width: 100%;font-size:8px;">
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_total_buyer_discount'] ?? "" }}</div>
                            </td>
                            <td>
                                <div style="text-align: right;">US$220.44</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_total_less_commission'] ?? "" }}</div>
                            </td>
                            <td>
                                <div style="text-align: right;">US$59.00</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_total_add_fright'] ?? "" }}</div>
                            </td>
                            <td>
                                <div style="text-align: right;">US$150.00</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_total_net_amount_payable'] ?? "" }} </div>
                            </td>
                            <td>
                                <div style="text-align: right;">US$10,892.56</div>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <table border="1" style=" margin-top: 4px; border-collapse: collapse; width: 100%;font-size:8px;">
            <tr>
                <td style="width: 55%;">
                    <table border="0" style="  height: 130px;  border-collapse: collapse; width: 100%;font-size:8px;">
                        <tr>
                            <td>
                                <div><b>BANK OPTION </b></div>
                            </td>
                            <td>
                                <div><b>BANK DETAIL</b></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_intermediary_bank'] ?? "" }} </div>
                            </td>
                            <td>
                                <div>HABIB AMERICAN BANK,N /Y BRANCH // FW026007362</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_intermediary_bank_swift_no'] ?? "" }} </div>
                            </td>
                            <td>
                                <div>: HANYUS33XXX</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_intermediary_bank_ac_no'] ?? "" }}:</div>
                            </td>
                            <td>
                                <div>BANK AL HABIB LIMITED & / 20729933</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_for_onword_credit_to'] ?? "" }} :</div>
                            </td>
                            <td>
                                <div>TOWELLERS LIMITED, KARACHI-PAKISTAN</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_tw_ac_no'] ?? "" }} </div>
                            </td>
                            <td>
                                <div>5001-0081-018265-01-1</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_swift_no'] ?? "" }} : </div>
                            </td>
                            <td>
                                <div>BAHLPKKAXXX</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_iban_no'] ?? "" }}  : </div>
                            </td>
                            <td>
                                <div>PK46BAHL5001008101826501</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{ $CommercialInvoice['heading_bank_addrss'] ?? "" }} :</div>
                            </td>
                            <td>
                                <div>BANK AL HABIB LTD ISLAMIC BANKING</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>SHAHRA-E-FAISAL BRANCH S # 4 & 5 BUSINESS CENTER, PLOT # 19-1-A</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>BLOCK-6 PECHS SHAHRA-E- FAISAL, KARACHI-PAKISTAN</div>
                            </td>
                        </tr>

                    </table>
                </td>
                <td style="width: 45%;">
                    <table border="0" style="  height: 130px;  border-collapse: collapse; width: 100%;font-size:8px;">
                        <tr style="width: 50%;">
                            <td>
                                <div style="text-align: center;"><b>“{{ $CommercialInvoice['heading_statement_origin'] ?? "" }} ” </b></div>
                            </td>

                        </tr>
                        <tr style="width: 50%;">
                            <td>
                                <div style="text-align: center;">THE EXPORTER M/S. TOWELLERS LIMITED ,<br>
                                    WSA – 30 & 31, BLOCK-1, FEDERAL ‘B’ AREA,<br>
                                    KARACHI-75950, PAKISTAN. (REX NO: PKREXPK06768890)<br>
                                    OF THE PRODUCTS COVERED BY THIS DOCUMENT<br>
                                    DECLARES THAT, EXCEPT WHERE OTHERWISE <br>
                                    CLEARLY INDICATED, THESE PRODUCTS ARE OF <br>
                                    PAKISTAN PREFERENTIAL ORIGIN ACCORDING TO <br>
                                    RULES OF ORIGIN OF THE GENERALIZED SYSTEM OF<br>
                                    PREFERENCES OF THE EUROPEAN UNION AND <br>
                                    THAT THE ORIGIN CRITERION MET IS “P”.
                                </div>
                            </td>

                        </tr>

                    </table>
                </td>


            </tr>

        </table>
        <table border="0" style=" margin-top: 4px; border-collapse: collapse; width: 100%;font-size:8px;">
            <tr>
                <td>
                    <div style="width: 20%; margin-left:auto; text-align: center; margin-top: 10px;">
                        <input type="text" style="border: 0; border-bottom: .5px solid #000; display: block; margin: 0 auto;">
                        EXPORT MANAGER

                    </div>
                </td>
            </tr>
        </table>
        <table border="0" style=" border: 1px solid #000; margin-top:4px ; border-collapse: collapse; width: 100%;font-size:8px;">
            <tr>
                <td>
                    <div style="margin-left:auto; text-align: center; ">
                        THE GOODS COVERED UNDER THIS INVOICE ARE THE PROPERTY OF TOWELLERS LTD UNTIL ITS PAYMENT RECEIVED. <br>
                        We hereby declare that all the particulars stated in respect of the Goods are true and correct. <br>
                        CERTIFIED THAT THE ABOVE GOODS/FABRIC ARE MANUFACTURED IN PAKISTAN <br>
                    </div>
                </td>
            </tr>
        </table>
    </div>

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
</body>