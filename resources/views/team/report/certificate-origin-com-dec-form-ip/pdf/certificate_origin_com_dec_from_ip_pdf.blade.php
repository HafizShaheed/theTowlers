<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>




</html>

<body style="font-family: sans-serif;">
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; font-size: 12px;">
        <tr>
            <td style="font-size: 12px; width: 50%; border-right: 1px solid;">
                <table>
                    <tr>
                        <td style="border-bottom: 1px solid #000; width: 100%;">
                            <div style="height: 65px; width: 342px;">
                                1. Exporter Name and Address
                                <ul style="list-style: none; padding: 2px; margin-top: 2px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->exporter_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->exporter_address ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #000; width: 100%;">
                            <div style="height: 65px;">
                                2. Consignee's Name and Address
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->consignee_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->consignee_address ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="height: 65px;">
                                3. Producer's Name and Address
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->Producer_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->Producer_address ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>

            </td>
            <td style="font-size: 12px; width: 50%;">
                <div style="height: 195px; ">
                    <div style="margin-bottom: 20px;">
                        Refernce No. {{ $CertificateOriginComDecFormIp->ref_number ?? ""  }}
                    </div>

                    <div style="text-align: center; height: 60px; font-weight: 500px;">
                        <div style=" text-decoration: underline">
                            INDONESIA - PAKISTAN<br>
                            PREFERENTIAL TRADE AGREEMENT (IPPTA)<br>CERTIFICATE OF ORIGIN<br>
                        </div>

                        (Combined Declaration and Certificate) <br>
                        <br>
                        <div>
                            Form IP
                        </div>
                        <br><br>

                        Issued in <input type="text" style="width: 200px; border: 0; border-bottom: 1px dashed;" value="{{ $CertificateOriginComDecFormIp->issue_country ?? ""  }}"> <br>
                        (Country) 
                    </div>
                </div>
                <div>
                    See Overleaf Notes
                </div>

            </td>

        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; font-size: 12px; border-top: 0;">
        <tr>
            <td style="font-size: 12px; width: 50%; border-right: 1px solid;">
                <table>
                    <tr>
                        <td style="width: 100%;">
                            <div style="height: 100px; width: 342px;">
                                4.Means of transport and route ( as far as known )
                                <div> Departure date : {{ $CertificateOriginComDecFormIp->departture_dae ?? "" }}  </div>
                                <div> Vessel name : {{ $CertificateOriginComDecFormIp->vessel_name_ip ?? "" }}  </div>
                                <div> Port of loading : {{ $CertificateOriginComDecFormIp->port_of_loading ?? "" }}  </div>
                                <div> Port of discharge :{{ $CertificateOriginComDecFormIp->port_of_discharge ?? "" }}  </div>

                                {{-- {{ $CertificateOriginComDecFormIp->transport_and_route ?? "" }} --}}
                            </div>
                        </td>
                    </tr>
                </table>

            </td>
            <td style="font-size: 12px; width: 50%;">
                <div style="height: 110px; ">
                    <div style="margin-bottom: 10px;">
                        5. For Official Use
                    </div>

                    <div style="text-align: center; height: 60px; font-weight: 500px;">
                        <div style="margin-left:20px;">
                            <table>
                                <tr>
                                    <td><input type="checkbox" name="" id="" {{ $CertificateOriginComDecFormIp->yes_or_no_preferential_treatment == 1 ? 'checked' :  "" }}></td>
                                    <td style="text-decoration: underline;" >Preferential Treatment Given Under IPPTA
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="" id="" {{ $CertificateOriginComDecFormIp->yes_or_no_preferential_treatment == 0 ? 'checked' :  "" }}></td>
                                    <td style="text-decoration: underline;">Preferential Treatment Not Given Under IPPTA
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="text-align: center; margin-top: 10px;">
                        Signature of Authorized Signatory of the Importing
                    </div>
                </div>

            </td>

        </tr>
    </table>

    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; font-size: 10px; border-top: 0;">
        <tr>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 10%;">
                <div style="width: 78px;">6.Item number</div>
            </td>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 30%;">
                <div style="width: 267px; text-align: justify;">7. Marks and number on package: Number and kinds of
                    package: description of goods ; HS code of
                    the importing country</div>
            </td>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 15%;">
                <div style="width: 80px;">8.Origin Criteron</div>
            </td>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 20%;">
                <div style="width: 100px;">9. Gross Weight Quantity and FOB Value</div>
            </td>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 20%;">
                <div style="width: 100px;">10. Number and Date of Invoices</div>
            </td>
        </tr>
        <tr style="text-align: center">
            <td style="border-right: 1px solid #000; width: 10%;">
                <div style="width: 78px; word-wrap: break-word; height: 250px;">
                    @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDecFormIp["item_number_" . $i])) 
                    <ul style="list-style: none;  padding: 0; margin: 0;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'item_number_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
              
            </td>
            <td style="border-right: 1px solid #000; width: 30%;">
                <div style="width: 267px; word-wrap: break-word; height: 250px; text-align: justify;">
                    @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDecFormIp["marks_and_numbers_" . $i])) 
                    <ul style="list-style: none;  padding: 0; margin: 0;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'marks_and_numbers_' . $i} }} | {{ $CertificateOriginComDecFormIp->{'numbers_and_kinds_of_packges_description_' . $i} }}</li>
                        
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="border-right: 1px solid #000; width: 15%;">
                <div style="width: 80px; word-wrap: break-word; height: 250px;">
                    @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDecFormIp["origin_criterion_" . $i])) 
                    <ul style="list-style: none;  padding: 0; margin: 0;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'origin_criterion_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="border-right: 1px solid #000; width: 20%;">
                <div style="width: 100px; word-wrap: break-word; height: 250px;">
                  @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDecFormIp["gross_weight_or_other_quantity_" . $i])) 
                    <ul style="list-style: none;  padding: 0; margin: 0;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'gross_weight_or_other_quantity_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="border-right: 1px solid #000; width: 20%;">
                <div style="width: 100px; word-wrap: break-word; height: 250px;">
                  @for($i = 1; $i <= 15; $i++) @if(isset($CertificateOriginComDecFormIp["number_and_dates_of_inovoices_" . $i])) 
                    <ul style="list-style: none;  padding: 0; margin: 0;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'number_and_dates_of_inovoices_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; font-size: 12px; border-top: 0;">
        <tr>
            <td>
                <div style="height: 40px;">
                    11.Remarks {{ $CertificateOriginComDecFormIp->remarks??  "" }}
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr style="font-size: 12px;">
            <td style="width: 50%; vertical-align: top; padding: 10px;">
                <div style="display: flex; flex-direction: column; justify-content: space-between; min-height: 250px;">
                    <div>
                        <span>12. Declaration by the exporter</span> <br>
                        The undersigned hereby declares that the above details and statements are correct, that all the goods were  
                        <input type="text" style="width: 100%; border: 0; border-bottom: 1px dotted;" value="{{ $CertificateOriginComDecFormIp->declaration_by_the_exporter_country ?? '' }}">
                    </div>
                    <div style="margin-top: 20px;">
                        and that they comply with the origin requirements specified for these goods in the Generalized System of Preferences for goods exported to:
                        <br> <br>
                        <input type="text" style="width: 100%; border: 0;text-align: center; border-bottom: 1px solid;" value="{{ $CertificateOriginComDecFormIp->importing_in_country ?? '' }}">
                    </div>
                    <div style="text-align: center;">(importing country)</div>
                    <br>
                    <br>
                    <br>
                    <div style="margin-top: auto;">
                        <input type="text" style="width: 100%; border: 0; border-bottom: 0.5px dotted; text-align: left;" value="{{ $CertificateOriginComDecFormIp->place ?? '' }} {{ $CertificateOriginComDecFormIp->date ?? '' }}">
                        <div style="text-align: left; margin-top: 1px;">Place and date, signature of authorized signatory</div>
                    </div>
                </div>
            </td>
            <td style="width: 50%; border-left: 1px solid #000; vertical-align: top; padding: 10px;">
                <div style="display: flex; flex-direction: column; justify-content: space-between; min-height: 250px;">
                    <span>13. Certificate</span> <br>
                    It is hereby certified, on the basis of control carried out, that the declaration by the exporter is correct.
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br><br>
                    <br>
                    <br>
                    <br><br>
                    <br>
                    <br>
                    <div style="margin-top: 9px; text-align: left;">
                        <input type="text" style="border: 0; border-bottom: 1px dotted #000; width: 100%;">
                        <div style="margin-top: 1px;">Place and date, signature, and stamp of certifying body</div>
                    </div>
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

</body>

</html>