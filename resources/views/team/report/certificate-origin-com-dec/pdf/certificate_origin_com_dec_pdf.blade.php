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
    <table border="0" style="width:100%; border: 1px solid #000; border-collapse: collapse;">

        <tr>
            <td style="font-size: 12px; width: 50%; border-right: 1px solid;">
                <table>
                    <tr>
                        <td style="border-bottom: 1px solid #000; width: 100%;">
                            <div style="height: 75px; width: 342px;">
                                1.Goods consigned from (Exporter's business name, <br> address, country)
                                <ul style="list-style: none; padding: 2px; margin-top: 2px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->exporter_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->exporter_address ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->exporter_country ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="height: 75px;">
                                2.Goods consigned to (consignee's name,address(country)
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->consignee_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->consignee_address ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->consignee_country ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>

            </td>
            <td style="font-size: 12px; width: 50%;">
                <div style="height: 150px; ">
                    <div style="margin-bottom: 20px;">
                        Refernce No. {{ $CertificateOriginComDec->ref_number ?? ""  }}
                    </div>

                    <div style="text-align: center; height: 60px; font-weight: 500px;">
                        PREFERENTIAL ARRANGEMENTS AMONG DEVELOPING<br>
                        COUNTRIES NEGOTIATED IN GATT<br>CERTIFICATE OF ORIGIN<br>

                        (Combined Declaration and Certificate) <br>

                        Issued in <input type="text" style="width: 200px; border: 0; border-bottom: 1px solid;" value="{{  $CertificateOriginComDec->issue_in ?? ""  }}"> <br>
                        (Country)
                    </div>
                </div>

            </td>

        </tr>
    </table>

    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr style="font-size: 12px;">
            <td style="width: 50%; border-right: 1px solid #000;">
                <div style="height: 100px;">
                    3.Means of transport and route (as far as known)
                    <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->transport_and_route ?? "" }}</li>
                      
                    </ul>
                </div>
            </td>
            <td style="width: 50%; ">
                <div style="height: 100px;">
                    4.for officail use
                </div>
            </td>
        </tr>

    </table>



    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr style="font-size: 12px;">
            <td style="border-left: 1px solid; width: 10%;">
                <div style=" text-align: center; width: 70px;">
                    5.Item number
                </div>

            </td>

            <td style="border-left: 1px solid; width: 10%;">
                <div style=" text-align: center; width: 100px;">
                    6.Marks and number of packages
                </div>

            </td>

            <td style="border-left: 1px solid; width: 45%;">
                <div style=" text-align: center; width: 230px;">
                    7.number and kind of packages description
                </div>

            </td>

            <td style="border-left: 1px solid; width: 10%;">
                <div style=" text-align: center; width: 80px;">
                    8.Origin criterion
                </div>

            </td>

            <td style="border-left: 1px solid; width: 10%;">
                <div style=" text-align: center; width: 80px;">
                    9.Gross weight or other quantity
                </div>

            </td>

            <td style="border-left: 1px solid; width: 15%;">
                <div style=" text-align: center; width: 85px;">
                    10.Number and dates of inovoices
                </div>

            </td>

        </tr>
        {{-- <tr style="border-top: 1px solid; font-size: 12px ">
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDec["item_number_" . $i])) <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->{'item_number_' . $i} }}</li>
                    </ul>
                @endif
                @endfor
            </td>
              <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDec["marks_and_numbers_" . $i])) <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->{'marks_and_numbers_' . $i} }}</li>
                    </ul>
                @endif
                @endfor
            </td>
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDec["numbers_and_kinds_of_packges_description_" . $i])) <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->{'numbers_and_kinds_of_packges_description_' . $i} }}</li>
                    </ul>
                @endif
                @endfor
            </td>
              <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDec["origin_criterion_" . $i])) <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->{'origin_criterion_' . $i} }}</li>
                    </ul>
                @endif
                @endfor
            </td>
              <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDec["gross_weight_or_other_quantity_" . $i])) <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->{'gross_weight_or_other_quantity_' . $i} }}</li>
                    </ul>
                @endif
                @endfor
            </td>
              <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDec["number_and_dates_of_inovoices_" . $i])) <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDec->{'number_and_dates_of_inovoices_' . $i} }}</li>
                    </ul>
                @endif
                @endfor
            </td>
        </tr> --}}
        <tr style="border-top: 1px solid; font-size: 12px ">
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                @for($i = 1; $i <= 15; $i++) 
                    @if(isset($CertificateOriginComDec["item_number_" . $i])) 
                        <ul style="list-style: none; padding: 2px; margin: 0;">
                            <li style="list-style: none; padding: 0;"> 
                                {{ $CertificateOriginComDec->{'item_number_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
            
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                @for($i = 1; $i <= 15; $i++) 
                    @if(isset($CertificateOriginComDec["marks_and_numbers_" . $i])) 
                        <ul style="list-style: none; padding: 2px; margin: 0;">
                            <li style="list-style: none; padding: 0;"> 
                                {{ $CertificateOriginComDec->{'marks_and_numbers_' . $i} }}
                            </li>
                            
                        </ul>
                    @endif
                @endfor
            </td>
            
            <td style="text-align: left; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                @for($i = 1; $i <= 15; $i++) 
                    @if(isset($CertificateOriginComDec["numbers_and_kinds_of_packges_description_" . $i])) 
                        <ul style="list-style: none;  padding: 2px; margin: 0;">
                            <li style="list-style: none; margin-left: 5px; padding: 0;"> 
                                {{ $CertificateOriginComDec->{'numbers_and_kinds_of_packges_description_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
        
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                @for($i = 1; $i <= 15; $i++) 
                    @if(isset($CertificateOriginComDec["origin_criterion_" . $i])) 
                        <ul style="list-style: none; padding: 2px; margin: 0;">
                            <li style="list-style: none; padding: 0;"> 
                                {{ $CertificateOriginComDec->{'origin_criterion_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
        
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                @for($i = 1; $i <= 15; $i++) 
                    @if(isset($CertificateOriginComDec["gross_weight_or_other_quantity_" . $i])) 
                        <ul style="list-style: none; padding: 2px; margin: 0;">
                            <li style="list-style: none; padding: 0;"> 
                                {{ $CertificateOriginComDec->{'gross_weight_or_other_quantity_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
        
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                @for($i = 1; $i <= 15; $i++) 
                    @if(isset($CertificateOriginComDec["number_and_dates_of_inovoices_" . $i])) 
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="list-style: none; padding: 0;"> 
                                {{ $CertificateOriginComDec->{'number_and_dates_of_inovoices_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
        </tr>
        

        {{-- <tr style="border-top: 1px solid; font-size: 12px">
            @php $fields = ['item_number_', 'marks_and_numbers_', 'numbers_and_kinds_of_packges_description_', 'origin_criterion_', 'gross_weight_or_other_quantity_', 'number_and_dates_of_inovoices_']; @endphp
            
            @foreach($fields as $field)
                <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding: 0px;">
                    <ul style="list-style: none; padding: 0px; margin: 0px;">
                        @for($i = 1; $i <= 15; $i++)
                            @if(isset($CertificateOriginComDec[$field . $i]))
                                <li style="list-style: none; padding: 0px; margin: 0px;">
                                    {{ $CertificateOriginComDec->{$field . $i} }}
                                </li>
                            @endif
                        @endfor
                    </ul>
                </td>
            @endforeach
        </tr> --}}
        


    </table>

    {{-- <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0; ">
        <tr style="font-size: 12px; ">
            <td style="width: 45%;">
                <div style="height: 140px; padding: 10px;">
                    11. Certificate

                    It is hereby certified, on the basis of control<br>carried out, that the declaration by the<br>
                    exporter is
                    correct <br>
                    <input type="text"
                        style="border: 0; border-bottom: 1px dotted #000; margin-top: 75px; width: 250px;"><br>
                    Place and date,signature and stamp of certifying body
                </div>
            </td>
            <td style="width: 55%;">
                <div style="padding-bottom: 5px;">

                    12. Declaration by the exporter  <br>
                    The under signed hereby declares that the above
                    details and <br> statements

                    are correct, that all the goods were produced in
                    <br><input type="text" value="{{ $CertificateOriginComDec->declaration_by_the_exporter_country ?? "" }}" style="width: 150px; border: 0; font-weight: 500; text-align: center; border-bottom: 1px solid;"> 
                

                    and that they comply with the <br> origin requirements specified for these goods in the Preferential
                    <br>
                    Arrangements Among developing countries for goods
                    exported <br>
                    to <input type="text" style="width: 85%; border: 0; font-weight: 500; text-align: center; border-bottom: 1px solid;" value=" {{ $CertificateOriginComDec->declaration_by_the_exporter_country ?? "" }}"> <br>
                    <input type="text" style="width: 50%; border: 0; border-bottom: 1px dotted; margin-top: 43px;" value=" {{ $CertificateOriginComDec->place ?? "" }}  {{ $CertificateOriginComDec->date?? "" }}"> <br>
                    place and date ,signature of authorized signatory
                </div>
            </td>
        </tr>

    </table> --}}
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr style="font-size: 12px;">
            <td style="width: 45%; vertical-align: top;">
                <div style=" padding: 10px; display: flex; flex-direction: column; justify-content: space-between;">
                    <span>
                        11. Certificate <br>
                        It is hereby certified, on the basis of control carried out, that the declaration by the exporter is correct.
                    </span>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input type="text" style="border: 0; border-bottom: 1px dotted #000; width: 100%;">
                    
                    <span>Place and date, signature, and stamp of certifying body</span>
                </div>
            </td>
            <td style="width: 55%; vertical-align: top;">
                <div style=" padding: 10px; display: flex; flex-direction: column; justify-content: space-between;">
                    <span>
                        12. Declaration by the exporter <br>
                        The undersigned hereby declares that the above details and statements are correct, that all the goods were produced in:
                    </span>
                    <input type="text" value="{{ $CertificateOriginComDec->declaration_by_the_exporter_country ?? '' }}" style="width: 150px; border: 0; font-weight: 500; text-align: center; border-bottom: 1px solid;">
                    <span>
                        and that they comply with the origin requirements specified for these goods in the Preferential Arrangements Among developing countries for goods exported
                        <br> to:
                        <input type="text" style="width: 85%; border: 0; font-weight: 500; text-align: center; border-bottom: 1px solid;" value="{{ $CertificateOriginComDec->to_country ?? '' }}">
                    </span>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input type="text" style="width: 100%; border: 0; border-bottom: 1px dotted; text-align: left;" value="{{ $CertificateOriginComDec->place ?? '' }}  {{ $CertificateOriginComDec->date ?? '' }}">
                    <span>Place and date, signature of authorized signatory</span>
                </div>
            </td>
        </tr>
    </table>
    
    <table>
        <tr style="font-size: 12px;">
            <td style="width: 50%;">
                <div>Trade Development Authority of Pakistan, Goverment of Pakistan</div>
            </td>
            <td style="width: 340px; text-align: right;">
                <div>(See Instruction Overleaf)</div>
            </td>
        </tr>
    </table>



    <div class="page-break"></div>
    <div style="page-break-after:auto;"></div>
    <!-- ------------- BACK PAGE ------------------ -->
    <table style="margin-top: 150px; width: 80%; margin:0px auto 0 auto;">
        <tr style="font-size: 12px;">
            <td colspan="3">
                List of countries signatories to Preferential Arrangements Among Developing Countries
            </td>

        </tr>
        <tr style="font-size: 12px;">
            <td>
                <ul style="list-style: none;">
                    <li>Bangladesh</li>
                    <li>Brazil</li>
                    <li>Chile</li>
                    <li>Egypt</li>
                </ul>
            </td>
            <td>
                <ul style="list-style: none;">
                    <li>Mexico</li>
                    <li>Pakistan</li>
                    <li>Peru</li>
                    <li>Republic of korea</li>
                    <li>Romania</li>
                </ul>
            </td>
            <td>
                <ul style="list-style: none;">
                    <li>Turkey</li>
                    <li>Tunisia</li>
                    <li>Uruguay</li>
                    <li>Yugoslavia</li>
                </ul>
            </td>
        </tr>
        <tr style="font-size: 16px;">
            <td colspan="3" style="font-weight: 600; text-align: center; margin-top: 20px;">
                INSTRUCTION FOR FILLING IN THE FORM
            </td>
        </tr>
        <tr style="font-size: 12px;">
            <td colspan="3" style="margin-top: 20px;">
                <ol>
                    <li> The main condition for admission to preference are that goods sent to any of the <br>
                        countries participating in the Preferential Arrangements Among Developing Countries <br>
                        negotiated in GATT
                        <ol style="width: 80%; margin: 10px auto; list-style-type: lower-roman;">
                            <li>
                                must fall within a description of good eligible for <br>
                                preference in the country of destination, and <br>
                            </li>
                            <li>
                                must comply with the origin criteria specified for <br>
                                those goods by the countries of destination<br>
                            </li>
                        </ol>
                    </li>
                    <li>If the good qualify under the origin criteria of the country of destination, the exporter
                        <br>must indicate in box 8 of the form as below:
                    </li>
                    <div style="margin-top: 20px;">
                        <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; font-size: 12px;">
                            <tr style="border-right: 1px solid;">
                                <td style="width: 50%; border-right: 1px solid;">
                                    <div style="padding: 5px;">
                                        Classification of goods by types of origin <br>
                                        Criteria complied with
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div style="padding: 5px;">Indication to be made in Box 8 of the <br> form</div>
                                </td>

                            </tr>
                            <tr style="border-top: 1px solid;">
                                <td style="width: 50%; border-right: 1px solid;">
                                    <div style="padding: 5px;">
                                        Goods wholly produced in the exporting <br> country
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div style="padding: 5px;">-P-</div>
                                </td>

                            </tr>
                            <tr style="border-top: 1px solid;">
                                <td style="width: 50%; border-right: 1px solid;">
                                    <div style="padding: 5px;">
                                        Goods not wholly produced in the <br> exporting country
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div style="padding: 5px;"></div>
                                </td>
                            </tr>

                            <tr style="border-top: 1px solid;">
                                <td style="width: 50%; border-right: 1px solid;">
                                    <div style="padding: 5px;">
                                        Goods satisfying the origin criterion based <br>on added value
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div style="padding: 5px;">
                                        -Y- Followed by the value of materials <br>
                                        imported or of undetermined origin <br>
                                        expressed as a percentage of the <br>
                                        value of the exported goods. <br>
                                        Example: Y less than 50%
                                    </div>
                                </td>
                            </tr>
                            <tr style="border-top: 1px solid;">
                                <td style="width: 50%; border-right: 1px solid;">
                                    <div style="padding: 5px;">
                                        Goods satisfying the origin criterion based on <br>
                                        a change in BTN heading or other origin criteria
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div style="padding: 5px;">
                                        -X- followed by the BTN heading No.<br>
                                        of the exported goods <br>
                                        example -X-97 05
                                    </div>
                                </td>
                            </tr>
                            <tr style="border-top: 1px solid;">
                                <td style="width: 50%; border-right: 1px solid;">
                                    <div style="padding: 5px;">
                                        Goods satisfying two origin criteria
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div style="padding: 5px;">
                                        Example: -X- 84 05 <br>
                                        -Y- less than 40%
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <li style="margin-top: 15px;">Each article must qualify, it should be noted that all the goods in a
                        consignment must
                        qualify <br> separately in their own right.
                    </li>
                    <li style="margin-top: 15px;">Language, description of goods, etc, in making out the form, it is
                        recommended that <br>
                        English, French or Spanish be used, taking into account the acceptability of the language in
                        <br>
                        the importing country. Entries on the form should be typed or hand written: In the latter case
                        <br>
                        use ink and capital letters. Any unused space should be struck through in such a manner as <br>
                        to make any later addition impossible. Any alteration must be endorsed by the certifying <br>
                        authority or body. The description of goods must be sufficiently detailed to enable the goods
                        <br>
                        to be indentified by the Custom officer examining them.
                    </li>
                    <li style="margin-top: 15px;">Procedure for claiming preference. A declaration on the certificate of
                        origin forrn must be <br>
                        prepared by the exporter of the goods and submitted in duplicate to the certifying authority or
                        <br>
                        body of the country of exportation, which will, if satisfied, certify the top copy of the
                        certificate <br>
                        of origin and return it to the exporter for transmission to the importer in the cOuntry of
                        desti- <br>
                        natíon. The certifying authority or body will itself keep the second copy duly completed and
                        <br>
                        signed by the exporter.
                    </li>
                </ol>
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

</body>

</html>