<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>


<style>


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
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->exporter_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->exporter_address ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->exporter_country ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="height: 75px;">
                                2.Goods consigned to (consignee's name,address(country)
                                <ul style="list-style: none; padding: 2px; margin-top: 2px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->consignee_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->consignee_address ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->consignee_country ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>

            </td>
            <td style="font-size: 12px; width: 50%;">
                <div style="height: 150px; ">
                    <div style="margin-bottom: 20px;">
                        Refernce No. {{ $CertificateOriginComDecFormA->ref_number ?? "" }}
                    </div>

                    <div style="text-align: center; height: 60px; font-weight: 500px;">
                        PREFERENTIAL ARRANGEMENTS AMONG DEVELOPING<br>
                        COUNTRIES NEGOTIATED IN GATT<br>CERTIFICATE OF ORIGIN<br>

                        (Combined Declaration and Certificate) <br>
                        <span style="font-weight: 500; font-size: 14px;"> Form A</span> <br>

                        Issued in <input type="text" style="width: 200px; border: 0; border-bottom: 1px solid;" value="{{ $CertificateOriginComDecFormA->issue_country ?? "" }}"> <br>
                        (Country)
                    </div>
                </div>
                <div style="text-align: right; padding-right: 10px;">
                    See Notes Overleaf
                </div>

            </td>

        </tr>
    </table>

    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr style="font-size: 12px;">
            <td style="width: 50%; border-right: 1px solid #000;">
                <div style="height: 100px;">
                    3.Means of transport and route (as far as known) <br>
                   
                    <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->transport_and_route ?? "" }}</li>
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->bl_date ?? "" }}</li>
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormA->bl_no ?? "" }}</li>
                      
                    </ul>
                </div>
            </td>
            <td style="width: 50%; ">
                <div style="height: 100px;">
                    4.For officail use
                </div>
            </td>
        </tr>

    </table>



    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr style="font-size: 12px;">
            <td style="border-left: 1px solid; width: 10%;">
                <div style="width: 50px;">
                    5.Item number
                </div>

            </td>

            <td style="border-left: 1px solid; width: 10%;">
                <div style="width: 80px;">
                    6.Marks and number of packages
                </div>

            </td>

            <td style="border-left: 1px solid; width: 45%;">
                <div style="width: 260px;">
                    7.Number and kind of packages description
                </div>

            </td>

            <td style="border-left: 1px solid; width: 10%;">
                <div style="width: 50px;">
                    8.Origin criterion
                </div>

            </td>

            <td style="border-left: 1px solid; width: 10%;">
                <div style="width: 80px;">
                    9.Gross weight or other quantity
                </div>

            </td>

            <td style="border-left: 1px solid; width: 15%;">
                <div style="width: 95px;">
                    10.Number and dates of inovoices
                </div>

            </td>

        </tr>
        <tr style="border-top: 1px solid; font-size: 12px">
            <td style="border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 0px; text-align: center;">
                @for($i = 1; $i <= 14; $i++) 
                    @if(isset($CertificateOriginComDecFormA["item_number_" . $i])) 
                        <ul style="list-style: none; padding: 0px; margin: 0px;">
                            <li style="list-style: none; padding: 0px;"> 
                                {{ $CertificateOriginComDecFormA->{'item_number_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
            <td style="border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 0px; text-align: center;">
                @for($i = 1; $i <= 14; $i++) 
                    @if(isset($CertificateOriginComDecFormA["marks_and_numbers_" . $i])) 
                        <ul style="list-style: none; padding: 0px; margin: 0px;">
                            <li style="list-style: none; padding: 0px;"> 
                                {{ $CertificateOriginComDecFormA->{'marks_and_numbers_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
            <td style="border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 0px; padding-left:10px;">
                @for($i = 1; $i <= 14; $i++) 
                    @if(isset($CertificateOriginComDecFormA["numbers_and_kinds_of_packges_description_" . $i])) 
                        <ul style="list-style: none; padding: 0px; margin: 0px;">
                            <li style="list-style: none; padding: 0px;"> 
                                {{ $CertificateOriginComDecFormA->{'numbers_and_kinds_of_packges_description_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
            <td style="border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 0px; text-align: center;">
                @for($i = 1; $i <= 14; $i++) 
                    @if(isset($CertificateOriginComDecFormA["origin_criterion_" . $i])) 
                        <ul style="list-style: none; padding: 0px; margin: 0px;">
                            <li style="list-style: none; padding: 0px;"> 
                                {{ $CertificateOriginComDecFormA->{'origin_criterion_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
            <td style="border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 0px; text-align: center;">
                @for($i = 1; $i <= 14; $i++) 
                    @if(isset($CertificateOriginComDecFormA["gross_weight_or_other_quantity_" . $i])) 
                        <ul style="list-style: none; padding: 0px; margin: 0px;">
                            <li style="list-style: none; padding: 0px;"> 
                                {{ $CertificateOriginComDecFormA->{'gross_weight_or_other_quantity_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
            <td style="border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 0px; text-align: center;">
                @for($i = 1; $i <= 14; $i++) 
                    @if(isset($CertificateOriginComDecFormA["number_and_dates_of_inovoices_" . $i])) 
                        <ul style="list-style: none; padding: 0px; margin: 0px;">
                            <li style="list-style: none; padding: 0px;"> 
                                {{ $CertificateOriginComDecFormA->{'number_and_dates_of_inovoices_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
            </td>
        </tr>
         


    </table>

    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0; ">
        <tr style="font-size: 12px; ">
            <td style="width: 45%; border-right: 1px solid;">
                <div style="height: 250px; padding: 10px;">
                    11. Certification
                    <br>
                    <div style="padding: 10px;">
                        It is hereby certified, on the basis of control<br>carried out, that the declaration by the<br>
                        exporter is
                        correct <br>
                    </div>
                    <input type="text"
                        style="border: 0; border-bottom: 1px dotted #000; margin-top: 145px; width: 250px;"><br>
                    Place and date,signature and stamp of certifying body
                </div>
            </td>
            <td style="width: 55%;">
                <div style="padding: 10px;">

                    12. Declaration by the exporter <br>
                    The under signed hereby declares that the above
                    details and <br> statements

                    are correct, that all the goods were <br> <br> produced in
                    <input type="text" style="width: 70%; border: 0; border-bottom: 1px dotted;" value="{{ $CertificateOriginComDecFormA->produce_in_country ?? "" }}">
                    <br>
                    <div style="text-align: center;">(country)</div>
                    <div style="margin-top: 10px;">
                        and that they comply with the origin requirements specified <br> for these goods in the
                        generalized
                        System
                        of preferences for <br> goods
                        exported
                        to <br> <br> <input type="text" style="width: 85%; border: 0; border-bottom: 1px solid;"  value="{{ $CertificateOriginComDecFormA->importing_in_country ?? "" }}">
                    </div>


                    <div style="text-align: center;">(importing country)</div>
                    <br>

                    <input type="text" style="width: 50%; border: 0; border-bottom: 1px dotted; margin-top: 20px;" value="{{ $CertificateOriginComDecFormA->place ?? "" }}  {{ $CertificateOriginComDecFormA->date ?? "" }}  "> <br>     
                    place and date ,signature of authorized signatory
                </div>
            </td>
        </tr>

    </table>
    <table>
        <tr style="font-size: 12px;">
            <td style="width: 50%;">
                <div>Trade Development Authority of Pakistan, Goverment of Pakistan</div>
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