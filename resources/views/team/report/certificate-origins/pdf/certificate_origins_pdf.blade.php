<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>



<body style="font-family: sans-serif;">
    <table border="1" style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
        <tr>
            <td style="width: 40%; font-size: 9px;">
                <table border="0">
                    <tr>
                        <td>
                            <div style="border-bottom: 1px solid #000; height: 120px; width: 300px;">
                                Exporter (Name , Adderss and Country)
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;">
                                        {{ $CertificateOrigin->exporter_name ?? '' }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;">
                                        {{ $CertificateOrigin->exporter_address ?? '' }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;">
                                        {{ $CertificateOrigin->exporter_country ?? '' }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="border-bottom: 1px solid #000; height: 100px; width: 300px;">
                                Consigness Importer(Namme , Adderss and Country)
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;">
                                        {{ $CertificateOrigin->consignee_name ?? '' }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;">
                                        {{ $CertificateOrigin->consignee_address ?? '' }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;">
                                        {{ $CertificateOrigin->consignee_country ?? '' }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="border-bottom: 1px solid #000; height: 30px; width: 300px;">
                                Exporter's Membership Number
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;">
                                        {{ $CertificateOrigin->exporter_membership_number ?? '' }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="height: 50px; width: 300px;">
                                Particular of transport ( as far as known )
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;">
                                        {{ $CertificateOrigin->particular_of_transport ?? '' }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 60%; font-size:9px;">
                <table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr>
                        <td style="border-bottom: 1px solid; ">
                            <div style="height: 20px; width: 100%; font-size: 14px;">
                                REFERNCE No. {{ $CertificateOrigin->ref_number ?? '' }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="font-size: 13px; text-align: center; font-weight: 500; margin-bottom: 10px;">
                                CERTIFICATE OF ORIGIN
                            </div>
                            <div style="font-family: serif; font-size: 14px; padding: 10px; text-align: center;">
                                <b style="font-size: 13px;  ">TOWEL MANUFACTURERS' ASSOCIATION OF PAKISTAN</b><br>
                                (Recgised by Goverment of Pakistan ) <br>
                                <b> TMA House </b> <br>
                                77-A, S.M.C.H.S Karachi - 74400 (Pakistan) <br>
                                Phone (9221) 34382801-4 , <br>
                                Fax : (9221) 34551628 <br>
                                E-mail : tma@towelassociation.com <br>
                                Website : www.towelasssociation.com <br>
                            </div>
                        </td>
                    </tr>
                    <tr style="text-align: center;">
                        <td>
                            <div style="text-align: center;">
                                <img style="width: 130px;"
                                    src="https://preview.redd.it/qs89m0sjl0jc1.jpeg?auto=webp&s=c2b6f9c19e8d900f44f74dfc83b487cbc0509b14"
                                    alt="">
                            </div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <table border="0" style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0; ">
        <tr style="font-size: 10px; text-align: center; border-bottom: 1px solid;">
            <td style="width: 27%; border-right: 1px solid;">
                <div>
                    Marks and Number
                </div>
            </td>
            <td style="width: 15%; border-right: 1px solid;">
                <div>
                    Number and kind of package
                </div>
            </td>
            <td style="width: 32%; border-right: 1px solid;">
                <div>
                    Description of Goods
                </div>
            </td>

            <td style="width: 15%; border-right: 1px solid;">
                <div>
                    Gross weight or other quantity
                </div>
            </td>

            <td style="width: 10%;">
                <div>

                </div>
            </td>
        </tr>
        <tr style="font-size: 10px; text-align: center;">
            <td
                style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for ($i = 0; $i < 5; $i++)
                    @if (isset($CertificateOrigin['marks_and_numbers_' . $i]))
                        <ul style="list-style: none; padding: 10px; margin-top: 30px;">
                            <li style="list-style: none; padding: 2px 0 ;">
                                {{ $CertificateOrigin->{'marks_and_numbers_' . $i} }}</li>
                        </ul>
                    @endif
                @endfor
            </td>
            <td
                style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for ($i = 0; $i < 5; $i++)
                    @if (isset($CertificateOrigin['numbers_and_kinds_of_packges_' . $i]))
                        <ul style="list-style: none; padding: 10px; margin-top: 30px;">
                            <li style="list-style: none; padding: 2px 0 ;">
                                {{ $CertificateOrigin->{'numbers_and_kinds_of_packges_' . $i} }}</li>
                        </ul>
                    @endif
                @endfor
            </td>
            <td
                style="text-align: left; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for ($i = 0; $i <=16; $i++)
                    @if (isset($CertificateOrigin['description_of_goods_' . $i]))
                        <ul style="list-style: none; padding: 0px; margin-top: 0px;">
                            <li style="list-style: none; margin-left: 5px; padding: 0px 0 ;">
                                {{ $CertificateOrigin->{'description_of_goods_' . $i} }}</li>
                        </ul>
                    @endif
                 
                @endfor
            </td>

            <td
                style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">

                @for ($i = 0; $i < 16; $i++)
                    @if (isset($CertificateOrigin['gross_weight_or_other_quantity_' . $i]))
                        <ul style="list-style: none; padding: 0px; margin-top: 0px;">
                            <li style="list-style: none; padding: 0px 0 ;">
                                {{ $CertificateOrigin->{'gross_weight_or_other_quantity_' . $i} }}</li>
                        </ul>
                    @endif
                @endfor
            </td>

            <td style="width: 10%;">
                <div style="width: 60px; height: 300px; word-wrap: break-word;">

                </div>
            </td>
        </tr>
    </table>
    {{-- <table>
        <tr style="font-size: 12px;">
            <td style=" width: 55%;">
                Other Information
                <p> other info v1 
                    <p>
                        </p>  other info v2</p>
                <div style="margin: 20px 0;">
                    It is hereby declared that the above mentioned goods originate in Pakistan<br>
                </div>
                <!-- <div style="text-align: center;">
                    <b>
                        (PAKISTAN )
                    </b>
                </div> -->
                <div>
                    <table>
                        <tr style="padding: 4px 0;">
                            <td>Exporter's Signature: </td>
                            <td><input type="text" style=" border: 0; border-bottom: 1px dotted;"
                                value="{{ $CertificateOrigin->exporter_signature }}"> </td>
                        </tr>
                        <tr style="padding: 4px 0;">
                            <td>Name: </td>
                            <td> <input type="text" style=" border: 0; border-bottom: 1px dotted;"
                                    value="{{ $CertificateOrigin->full_name }}"></td>
                        </tr>
                        <tr style="padding: 4px 0;">
                            <td>Designnation:</td>
                            <td> <input type="text" style=" border: 0; border-bottom: 1px dotted;"
                                    value="{{ $CertificateOrigin->designnation }}"></td>
                        </tr>
                        <tr style="padding: 4px 0;">
                            <td>Company:</td>
                            <td>
                                <input type="text" style=" border: 0; border-bottom: 1px dotted;"
                                    value="{{ $CertificateOrigin->company }}">
                            </td>
                        </tr>
                        <tr style="padding: 4px 0;">
                            <td>
                                Place:
                            </td>
                            <td>
                                <input type="text" style=" border: 0; border-bottom: 1px dotted;"
                                    value="{{ $CertificateOrigin->place }}">
                            </td>
                        </tr>
                        <tr style="padding: 4px 0;">
                            <td>
                                Date:
                            </td>
                            <td><input type="text" style=" border: 0; border-bottom: 1px dotted;"
                                    value="{{ date('d/m/Y', strtotime($CertificateOrigin->date)) }}"> </td>
                        </tr>
                    </table>

                </div>

            </td>
            <td style="width: 45%;">
                <div style="">

                    It is hereby certified that to the best of my knowledge and according to the
                    documents produced before me this declaration appears to be correct

                    <div style="padding-top: 60px;">
                        Authorized Signatory &nbsp; &nbsp;  {{ $CertificateOrigin->signature_person_authorized }}
                    </div>
                    <br><br>
                    Place and date of issue &nbsp; &nbsp; {{ $CertificateOrigin->place_issue_date  }}
                    <br><br>
                    <b style="margin-top: 20px; padding-top: 20px; text-decoration: underline; font-size: 14px;">
                        Towel Manufacturers' Association of Pakistan
                    </b>
                </div>
            </td>
        </tr>
    </table> --}}
    

    <table style="width: 100%; border-collapse: collapse;">
        <tr style="font-size: 12px;">
            <td style="width: 55%; vertical-align: top; padding: 5px;">
                <span style="display: block; margin-bottom: 2px;">Other Information:  {{ $CertificateOrigin->other_info_1 ?? '' }}</span>
                <span style="margin: 2px 0;">{{ $CertificateOrigin->other_info_2 ?? '' }}</span>
    
                <div style="margin: 8px 0; font-size: 12px;">
                    It is hereby declared that the above-mentioned goods originate in Pakistan.
                </div>
    
                <div>
                    <table style="width: 80%;">
                        <tr>
                            <td>Exporter's Signature:</td>
                            <td><input type="text" style="border: 0; border-bottom: 1px dotted; width: 100%;" 
                                       value="{{ $CertificateOrigin->exporter_signature }}"></td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" style="border: 0; border-bottom: 1px dotted; width: 100%;" 
                                       value="{{ $CertificateOrigin->full_name }}"></td>
                        </tr>
                        <tr>
                            <td>Designation:</td>
                            <td><input type="text" style="border: 0; border-bottom: 1px dotted; width: 100%;" 
                                       value="{{ $CertificateOrigin->designnation }}"></td>
                        </tr>
                        <tr>
                            <td>Company:</td>
                            <td><input type="text" style="border: 0; border-bottom: 1px dotted; width: 100%;" 
                                       value="{{ $CertificateOrigin->company }}"></td>
                        </tr>
                        <tr>
                            <td>Place:</td>
                            <td><input type="text" style="border: 0; border-bottom: 1px dotted; width: 100%;" 
                                       value="{{ $CertificateOrigin->place }}"></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td><input type="text" style="border: 0; border-bottom: 1px dotted; width: 100%;" 
                                       value="{{ date('d/m/Y', strtotime($CertificateOrigin->date)) }}"></td>
                        </tr>
                    </table>
                </div>
            </td>
    
            <td style="width: 45%; vertical-align: top; padding: 5px;">
                <br>
                <br>
                <br>
                <div style="font-size: 12px;">
                    It is hereby certified that to the best of my knowledge and according to the documents 
                    produced before me this declaration appears to be correct.
                </div>
    
                <div style="padding-top: 30px; font-size: 12px;">
                    <b>Authorized Signatory:</b> {{ $CertificateOrigin->signature_person_authorized }}
                </div>
    
                <div style="padding-top: 10px; font-size: 12px;">
                    <b>Place and Date of Issue:</b> {{ $CertificateOrigin->place_issue_date }}
                </div>
    
                <div style="margin-top: 10px; font-size: 14px; text-decoration: underline; font-weight: bold;">
                    Towel Manufacturers' Association of Pakistan
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
