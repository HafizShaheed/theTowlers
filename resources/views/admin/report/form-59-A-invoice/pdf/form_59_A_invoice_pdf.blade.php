<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head> 
<style>
    .page-break {
    page-break-before: always; /* or page-break-after: always; */
}

</style>

<body style="font-family: sans-serif;">
    <header>
        <table>
            <tr>
                <td style="font-size:14px ;">
                    Form 59 A

                </td>
                <td style="text-align: center; font-weight: 400; font-size: 12px; padding: 0px 10px;">
                    INVOICE AND COMBINED CERTIFICATE OF VALUE AND ORIGN FOR EXPORT TO NEW ZEALAND
                </td>
            </tr>
        </table>
        </div>
    </header>
    <span id='rotate'
        style="text-transform: capitalize; transform: rotate(-90deG) translate(-120px, -20px); font-size: 10px;">
        Developing Countries
    </span>

    <table border="1" style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
        <tr>
            <td style="width: 50%; font-size: 9px;">
                <div style="height: 100px;">

                    <span>Exporter</span>
                    <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $Form59AInvoice->exporter ?? "" }}</li>
                    </ul>
                </div>
            </td>
            <td style="width: 50%; font-size:9px;">
                <table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr>
                        <td style="border-right: 1px solid; ">
                            <div style="height: 80px; width: 100%;  transform: translateY(-10px);">
                                <h5 style="height: 10px;">Status of Seller</h5>
                                <ul style="list-style: none; padding: 0; margin-top: -8px;">
                                    <li style="list-style: none; padding: 2px 0 ;">({{ $Form59AInvoice->delete_terms_inapplicable ?? "" }})</li>
                                    <li style="list-style: none; padding: 2px 0 ;">{{ $Form59AInvoice->manufacturer ?? "" }} </li>
                                    <li style="list-style: none; padding: 2px 0 ;">{{ $Form59AInvoice->grower ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;">{{ $Form59AInvoice->producer ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;">{{ $Form59AInvoice->supplier ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div style="border-bottom:1px solid; text-align: center;">
                                _____________________
                            </div>
                            <div style="height: 40px;">

                            </div>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <div style="height: 40px; width: 100%;">

                                <span>3. Date of direct shipment to Canada - Date d'expedition directle vers le
                                    Canada</span>
                            </div>
                        </td>
                    </tr> -->
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; font-size: 9px;">
                <div style="height: 100px;">

                    <span>Sold to</span>
                    <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $Form59AInvoice->sold_to ?? "" }}</li>
                    </ul>
                </div>
            </td>
            <td>
                <table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr style="border-bottom: 0.5px solid #000;">
                        <td style=" width: 50%; font-size: 9px;">
                            <div style="height: 70px;">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%; font-size: 9px;">
                            <div style="height: 20px;">

                                <span>Country of Origin</span>
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $Form59AInvoice->country_of_Origin ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <!-- <tr>
                        <table border="0" style="width: 100%; border-collapse: collapse; ">
                            <tr>
                                <td style="width: 50%; font-size: 6px; border-right: 0.5px solid #000;">7. Country
                                    of
                                    origin of goods<br>Pays dongine
                                    des marchandises
                                </td>
                                <td style="width: 50%; font-size: 6px; font-weight: 500;"> IF SHIPLENT INCLUDES
                                    GOCIOS
                                    OF OFFERENT CROS
                                    ENTER ORIGINS AGAINST TEMEIND L'EXPEDITION COMPREND DES MACHANCHIES D'ORIGINES
                                    DIFFERENTER, PRECIE LEUR PROVENANCE EN 12
                                </td>
                            </tr>
                        </table>
                    </tr> -->

                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; font-size: 9px;">
                <div style="height: 30px;">

                </div>
                <table table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr style="border-top:0.5px solid #000 ;">
                        <td style="border-right: .5px solid;">
                            <div style="height: 20px;">

                                Ship/Airline, etc : {{ ' '.$Form59AInvoice->ship_airline_etc ?? "" }}
                            </div>
                        </td>
                        <td>
                            <div style="height: 20px;">

                                Sea/Airport of loading : {{ ' '.$Form59AInvoice->sea_airport_of_loading ?? "" }}
                            </div>
                        </td>
                    </tr>
                    <tr style="border-top:0.5px solid #000 ;">
                        <td style="border-right: .5px solid;">
                            <div style="height: 20px;">

                                Sea/Airport of discharge : {{ ' '.$Form59AInvoice->sea_airport_of_discharge ?? "" }}
                            </div>
                        </td>
                        <td>
                            <div style="height: 20px;">

                                final destination of goods : {{ ' '.$Form59AInvoice->final_destination_of_goods ?? "" }}
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr>
                        <td style="width: 50%; font-size: 6px;">
                            <div style="height: 70px;">


                            </div>
                        </td>
                    </tr>



                </table>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%;">

        <tr>
            <td style="text-align: center; width: 35%; font-size: 9px;">
                <div style="height: 270px; overflow: auto;">
                    Marks And numbers
                    @for($i = 0; $i < 5; $i++)
                    @if(isset($Form59AInvoice["marks_and_numbers_" . $i]))
                    <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $Form59AInvoice->{'marks_and_numbers_' . $i} }}</li>
                    </ul>
                    @endif
                    @endfor
                </div>
    
            </td>
    
            <td style="text-align: center; width: 35%; font-size: 9px;">
                <div style="height: 270px; overflow: auto; border-right: 1px solid;">
                    Quantity and description of goods (including any discounts)
                    @for($i = 0; $i < 5; $i++)
                    @if(isset($Form59AInvoice["marks_and_numbers_" . $i]))
                    <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $Form59AInvoice->{'quantity_' . $i} .' '. $Form59AInvoice->{'description_of_goods_' . $i} .' '. $Form59AInvoice->{'including_any_discounts_' . $i} }}</li>
                    </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="width: 10%; font-size: 9px;">
                <div style="height: 270px; overflow: auto; border-right: 1px solid;">
                    Current domestic<br>value in currency<br>of exporting<br>country
                    @for($i = 0; $i < 5; $i++)
                    @if(isset($Form59AInvoice["marks_and_numbers_" . $i]))
                    <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $Form59AInvoice->{'current_domestic_value_currency_of_exporting_' . $i} }}</li>
                    </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="text-align: center; width: 20%; font-size: 9px;">
                <div style="height: 270px; overflow: auto;">
                    Selling Price to Purchaser-State <br>currency and whether <br>FOB, CIF, etc
                    <div style="border-top: 1px solid;">
                        <table>
                            <tr>
                                <td style="width: 45px; text-align: center;">@</td>
                                <td style="width: 45px; text-align: center;">Amount</td>
                            </tr>
                        </table>
                        @for($i = 0; $i < 5; $i++)
                        @if(isset($Form59AInvoice["marks_and_numbers_" . $i]))
                        <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                            <li style="list-style: none; padding: 2px 0 ;"> {{ $Form59AInvoice->{'amount_' . $i} }} </li>
                        </ul>
                        @endif
                        @endfor
                    </div>
                </div>
            </td>
        </tr>
    
    </table>
    
    <table style="border: 0px solid #000; border-collapse: collapse; width: 100%; border-left: 1px solid">
        <tr>
            <td style="width: 50%; font-size: 10px; border-right: 1px solid;">
                <div style="height: 254px;">
                    <table style="border-bottom: 1px solid;">
                        <tr>
                            <td style="width: 50%;">
                                <div style="height: auto; width: 180px;">
                                    Enumerate the following charges and state <br>
                                    if amount has been included in the <br>
                                    current domestic value : {{ ' '.$Form59AInvoice->if_amount_has_been_inciuded_in_the_current_domestic_value ?? "" }}
                                </div>
                            </td>
                            <td style="width: 35%;">
                                <div style="height: auto; width: 100px;">
                                    Amount in currency of <br>
                                    exporting country
                                </div>
                            </td>
                            <td style="width: 15%;">
                                <div style="height: auto; width: 75px;">
                                    State if <br>
                                    included
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="3" style="border-top: 1px solid #000; ">
                                <div style="height: 30px; width: 200px;">
                                    Drawback or remission of duty : {{ ' '.$Form59AInvoice->drawback_or_remission_of_duty ?? "" }}

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border-top: 1px solid #000; ">
                                <div style="height: 120px;">
                                    Daclaration of Packing Material Used
                                    <ol style="margin-top: 5px;">
                                        <li>No packing material of any kind is used for the goods on this invoice.</li>
                                        <li>I hereby certify that the material(s) used as packing for the goods on this
                                            invoice is (are)
                                        </li>
                                        <li>No hay, straw, chaff flax rug or rife husks have been used as packing
                                            material for the goods on this invoice.
                                        </li>
                                        <li>I hareby declare that all timber used for the packing of goods listed in
                                            this invoice has beed inspected and was to the best of my knowledge
                                            free of bark and visible signs of insect and fungal attack when goods
                                            were shipped to new zealand
                                        </li>
                                    </ol>
                                </div>
                                <div style="text-align: center;">
                                    SIGNED</div>
                            </td>
                        </tr>
                    </table>

                </div>
            </td>
            <td style="width: 45%; font-size: 10px;">
                <div style="height: 215px;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 50px;">
                                    1.
                                </div>
                            </td>
                            <td>
                                <div style="text-align: justify;">
                                    the undersigned, being the seller of the goods
                                    enumerated in this invoice (or manager, chief clerk, or other
                                    responsible person in the sole empoly of and authorised
                                    by the seller to make and sign this certificate) have the
                                    means of knowing and hereby certify that this invoice,
                                    including continuation sheets if any is MADE IN
                                    ACCORADANCE WITH THE VALUE CLAUSE PRINTED
                                    OVERLEAF and the goods
                                    <br>
                                    <div style="display: inline-table; margin: 4px 0; text-align: justify;"">
                                        <span style=" border: 1px solid; width: 100px; padding: 3px; margin-bottom:
                                        3px;">
                                        DO or DO NOT
                                        </span>
                                        (strike out as appropriate) <br>
                                        quality to be entered into New Zealand under Tariff
                                        preference in accordance with the provisions of the New
                                        Zealand Customs Regulations 1968, the relevant detaiis of
                                        which are printed overleaf.
                                    </div>
                                </div>
                                <div>
                                    <div style="padding: 4px 0;">
                                        <label for="">FULL NAME : {{ $Form59AInvoice->full_name ?? "" }}</label>
                                        
                                    </div>
                                    <div style="padding: 4px 0;">
                                        <label for="">STATUS : {{ $Form59AInvoice->form59_status ?? "" }}</label>
                                        
                                    </div>
                                    <div style="padding: 4px 0;">
                                        <label for="">SIGNATURE : {{ $Form59AInvoice->signature_person ?? "" }}</label>
                                    </div>
                                    <div style="padding: 4px 0;">
                                        <label for="">DATE : {{ $Form59AInvoice->date ?? "" }}</label>
                                    </div>

                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </td>
        </tr>
    </table>

    <div class="page-break"></div>
    <div style="page-break-after:auto;">
    <!-- BACK PAGE  -->


    <table style="width: 100%; margin-top: 0px;">
        <br>
        <tr>
            <th style="text-align: center; font-size: 14px;">
                VALUE CLAUSES
            </th>
        </tr>
        <tr>
            <td style="font-size: 10px;">
                <div>
                    <ol>
                        <li style="text-align: justify; padding: 4px 0;">That this invoice is in all respects Correct,
                            and contains a
                            true and full statement of the price actually paid or to be paid tor the
                            said goods, and of the actual quantity and description there of.
                        </li>
                        <li style="text-align: justify; padding: 4px 0;">No different invoice of these goods has been or
                            will be
                            furnished to anyone.</li>
                        <li style="text-align: justify; padding: 4px 0;">No arrangement or understanding affecting the
                            purchase price of
                            these goods, by way of discount, rebate, compensation, or Of any Other nature whatsoever
                            which is not fully shown in this invoice, has been or.will be made or
                            entered into by the said seller and the purchaser or by anyone on behalf of either of them
                        </li>
                        <li style="text-align: justify; padding: 4px 0;">The said invoice exhibits, in the column headed
                            "Current Domestic Value in Currency of Exporting Country', Tthe current
                            domestic value of identically similar goods when sold for
                            home consumption for cash in equal
                            quantities in the ordinary Course of business in the principal markets of the country from
                            which the said goods are exported to New Zealand at the time when they are so expoted.
                        </li>
                        <li style="text-align: justify; padding: 4px 0;">The said current domestic value includes import
                            or excise duty to the amount shown against the item "drawback or remission of duty"
                            overleaf: <ol style="list-style-type: lower-alpha;">
                                <li>which has been paid on any parts, materials or ingredients used in making the goods,
                                    and in respects of which drawback has been or will be paid or allowed by the revenue
                                    authorities in the country of exportation: or
                                </li>
                                <li>which has been actually paid on the goods in the country from which they are
                                    exported, or would have been payable on the goods in that country if they had
                                    there been entered for home
                                    consumption instead of being exported therefrom</li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </td>
        </tr>

        <tr>
            <th style="text-align: center; font-size: 14px;">
                ORIGIN INFORMATION

            </th>
        </tr>
        <tr>
            <td style="font-size: 10px;">
                <div style="text-align: justify; padding: 4px 0;">
                    The New Zealand Customs Regulations 1968
                    provide for tariff preference to be allowed to goods of Developing Country origin under one
                    or other of the following categries:
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
        <tr>
            <th style="width: 50%; font-size: 14px; border-bottom: 1px solid;">
                GOODS WHOLLY OBTAINED
            </th>
            <th style="width: 50%; border-left: 1px solid; font-size: 14px; border-bottom: 1px solid;">
                GOODS PARTLY MANUFACTURED
            </th>
        </tr>
        <tr>
            <td style="width: 50%; font-size: 10px;">
                <div style="height: 300px; padding: 10px;">
                    <span>The follwing products are considered to be wholly obained in a preference
                        reciveing country:</span>
                    <ol style="list-style-type: lower-alpha;">
                        <li style="text-align: justify; padding: 4px 0;"> Mineral products extracted from its soil or
                            from its sea bed:</li>
                        <li style="text-align: justify; padding: 4px 0;"> vegetable products harvested here:</li>
                        <li style="text-align: justify; padding: 4px 0;">live animals born and raised there:</li>
                        <li style="text-align: justify; padding: 4px 0;">products obtained there from live animals:</li>
                        <li style="text-align: justify; padding: 4px 0;">products obtained by hunting or fishing
                            conducted there</li>
                        <li style="text-align: justify; padding: 4px 0;">products of sea fishing and other products
                            taken from the sea by its
                            vessels.</li>
                        <li style="text-align: justify; padding: 4px 0;">products made on board its factory ships
                            exclusively from the products
                            referred to in (f):</li>
                        <li style="text-align: justify; padding: 4px 0;"> used articles collected there fit only for the
                            recovery of raw materiasls:</li>
                        <li style="text-align: justify; padding: 4px 0;">waste and scrap resulting from operations
                            conducted there:</li>
                        <li style="text-align: justify; padding: 4px 0;">products obtained there exclusively from
                            products specified in (a) to (1)</li>
                    </ol>
                </div>
            </td>
            <td style="width: 50%; border-left: 1px solid; font-size: 10px;">
                <div style="height: 300px; padding: 10px;">
                    <ol style="list-style-type: lower-alpha;">
                        <span>
                            These are goods which do not quality for preference under the foregoing
                            category Such goods will nevrtheless quality for pretreference provided:
                        </span>
                        <li style="text-align: justify; padding: 4px 0;">That the final process of manufacture has been
                            performed in that country:
                            and</li>
                        <li style="text-align: justify; padding: 4px 0;">That in respect of each article the
                            expenditure-
                            <ol style="list-style-type: upper-alpha;">
                                <li style="text-align: justify; padding: 4px 0;">in material that is the produce of one
                                    or more developing countries or
                                    of New Zealand: or</li>
                                <li style="text-align: justify; padding: 4px 0;">In other items of factory or works
                                    costs incurred in one or more
                                    developing countries or in New Zealand: or</li>
                                <li style="text-align: justify; padding: 4px 0;">Partly in such material and parlty in
                                    such other items as aforesaid,</li>
                                <span>is not less than half of the factory or works cost of the article in its finished.
                                    state.</span>
                            </ol>
                        </li>
                    </ol>
                </div>
            </td>
        </tr>

        <!-- --  -->
        <tr>
            <th
                style="width: 50%; font-size: 14px; border-bottom: 1px solid; border-top: 1px solid; border-right: 1px solid;">
                NOTES
            </th>
            <th style="width: 50%; font-size: 14px; border-bottom: 1px solid; border-top: 1px solid;">

            </th>
        </tr>
        <tr>
            <td style="width: 50%; font-size: 10px;">
                <div style="height: 300px; padding: 10px;">

                    <ol style="list-style-type: lower-alpha;">
                        <li style="text-align: justify; padding: 4px 0;"> if the goods enumerated in this invoice are
                            manufactured in the preferance
                            receiving country concerned but do not meet any of the above criteria they
                            will Not quality for preferential entry into New Zealand.</li>
                        <li style="text-align: justify; padding: 4px 0;"> In all cases preference qualification is
                            dewpendent upon the goods being
                            shipped directly from the preference receiving country conerned to new
                            Zealand. Goods will however. retain preference qualification where
                            shipment to New Zealand is made from any other preference reciving
                            country.</li>

                    </ol>
                </div>
            </td>
            <td style="width: 50%; border-left: 1px solid; font-size: 10px;">
                <div style="height: 300px; padding: 10px;">

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
            $x = 460;
            $y = 70;
            $text = "Page {PAGE_NUM} of {PAGE_COUNT} page";
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

</html>