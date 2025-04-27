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
            <td style="width: 50%; font-size: 9px;">
                <table border="0">
                    <tr>
                        <td>
                            <div style="border-bottom: 1px solid #000; height: 120px; width: 337px;">
                                Exporter (Name , Adderss and Country)
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginNo627120->exporter_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginNo627120->exporter_address ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginNo627120->exporter_country ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="border-bottom: 1px solid #000; height: 100px; width: 337px;">
                                Consigness Importer(Namme , Adderss and Country)
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginNo627120->consignee_name ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginNo627120->consignee_address ?? "" }}</li>
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginNo627120->consignee_country ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="border-bottom: 1px solid #000; height: 30px; width: 337px;">
                                Exporter's Membership Number:  <b>{{ $CertificateOriginNo627120->exporter_membership_number ?? "" }}</b>
                                {{-- <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginNo627120->exporter_membership_number ?? "" }}</li>
                                </ul> --}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="height: 50px; width: 337px;">
                                Particular of transport ( as far as known )
                                <ul style="list-style: none; padding: 2px; margin-top: 8px;">
                                    <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginNo627120->particular_of_transport ?? "" }}</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%; font-size:9px;">
                <table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr>
                        <td colspan="2" style="border-bottom: 1px solid; ">
                            <div style="height: 20px; width: 100%; font-size: 14px; font-weight: 500;">
                                REFERNCE NUMBER {{ $CertificateOriginNo627120->ref_number ?? ""  }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <img style="width: 130px;"
                                    src="https://preview.redd.it/ai33uiqsczic1.jpeg?auto=webp&s=e9b3511aef0157d5840257a0c6d48c83204b22e8"
                                    alt="">
                            </div>
                        </td>
                        <td>
                            <div style="width: 220px;">
                                <div style="font-size: 16px; text-align: center; font-weight: 500;">
                                    CERTIFICATE OF ORIGIN
                                </div>
                                <div style="font-size: 16px; text-align: center;opacity: 0">
                                    627120
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-family: serif; font-size: 14px; padding: 10px;">
                                <b style="font-size: 17px;  ">Karachi Chamber of Commerce &
                                    Industry</b><br>
                                P.O Box No. 4158, Aiwan-e-Tijarat Road, <br>
                                Off : Shahrah-e-Liaquat , karchi-74000,Pakistan <br>
                                T:+92 21 99218001-09 <br>
                                F:+92 21 99218010 <br>
                                E:attestation@kcci.com.pk <br>
                                &nbsp; &nbsp; info@kcci.com.pk <br>
                                U:www.kcci.com.pk <br>
                            </div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

    </table>
    <table border="0" style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0; ">
        <tr style="font-size: 10px; text-align: center; border-bottom: 1px solid;">
            <td style="width: 15%; border-right: 1px solid;">
                <div>
                    Marks and Number
                </div>
            </td>
            <td style="width: 10%; border-right: 1px solid;">
                <div>
                    Number and kind of package
                </div>
            </td>
            <td style="width: 45%; border-right: 1px solid;">
                <div>
                    Description of Goods
                </div>
            </td>

            <td style="width: 15%; border-right: 1px solid;">
                <div>
                    Gross weight or other quantity
                </div>
            </td>

            <td style="width: 15%;">
                <div>
                    Country of origin
                </div>
            </td>
        </tr>
      
        <tr style="font-size: 10px; text-align: center;">
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 330px; vertical-align: top; padding: 0;">
        
                @for($i = 3; $i <= 3; $i++) 
                    @if(isset($CertificateOriginNo627120["marks_and_numbers_" . $i])) 
                        <ul style="list-style: none; padding: 0; margin: 30;">
                            <li style="list-style: none; padding: 0; margin: 0;"> 
                                {{ $CertificateOriginNo627120->{'marks_and_numbers_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
        
            </td>
        
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 330px; vertical-align: top; padding: 0;">
        
                @for($i = 3; $i <= 3; $i++) 
                    @if(isset($CertificateOriginNo627120["numbers_and_kinds_of_packges" . $i])) 
                        <ul style="list-style: none; padding: 0; margin: 30;">
                            <li style="list-style: none; padding: 0; margin: 0;"> 
                                {{ $CertificateOriginNo627120->{'numbers_and_kinds_of_packges' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
        
            </td>
        
            <td style="text-align: left; border: 1px solid black; border-collapse: collapse; height: 330px; vertical-align: top; padding: 0;">
        
                @for($i = 1; $i <= 15; $i++) 
                    @if(isset($CertificateOriginNo627120["description_of_goods_" . $i])) 
                        <ul style="list-style: none; padding: 0; margin: 5;">
                            <li style="list-style: none;margin-left: 5px; padding: 0; margin: 0;"> 
                                {{ $CertificateOriginNo627120->{'description_of_goods_' . $i} }}
                            </li>
                        </ul>
                    @endif
               
                @endfor
        
            </td>
        
            <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 330px; vertical-align: top; padding: 0;">
        
                @for($i = 1; $i <= 15; $i++) 
                    @if(isset($CertificateOriginNo627120["gross_weight_or_other_quantity_" . $i])) 
                        <ul style="list-style: none; padding: 0; margin: 5;">
                            <li style="list-style: none; padding: 0; margin: 0;"> 
                                {{ $CertificateOriginNo627120->{'gross_weight_or_other_quantity_' . $i} }}
                            </li>
                        </ul>
                    @endif
               
                @endfor
        
            </td>
        
            <td style="text-align: start; border: 1px solid black; border-collapse: collapse; height: 330px; vertical-align: top; padding: 0;">
        
                @for($i = 3; $i <= 3; $i++) 
                    @if(isset($CertificateOriginNo627120["county_of_origin_" . $i])) 
                        <ul style="list-style: none; padding: 0; margin: 30;">
                            <li style="list-style: none; padding: 0; margin: 0;"> 
                                {{ $CertificateOriginNo627120->{'county_of_origin_' . $i} }}
                            </li>
                        </ul>
                    @endif
                @endfor
        
            </td>
        </tr>
        
    </table>
    {{-- <table>
        <tr style="font-size: 12px;">

            <td style=" width: 55%; border-right: 1px solid;">
                Other Information <br>
                
                <input type="text" value="{{ $CertificateOriginNo627120->other_information ?? ""  }} " style="width: 90%; border: 0; margin-top: 0px; padding-left:20px;" >
                <input type="text" value="{{ $CertificateOriginNo627120->other_information)2 ?? ""  }} " style="width: 90%; border: 0; margin-top: 0px; padding-left:20px;" >
                <input type="text" style="width: 90%; border: 0; border-bottom: 1px solid; margin-top: 45px;" >
                <br>
                It is hereby declared that the above mentioned goods originate in <br>
                <div style="text-align: center;">
                    <b>
                        (PAKISTAN )
                    </b>
                </div>
                <div>
                    <table>
                        <tr style="padding: 2px 0;">
                            <td>Exporter's Signature: </td>
                            <td><input type="text" style=" border: 0; border-bottom: 1px solid;"> </td>
                        </tr>
                        <tr style="padding: 2px 0;">
                            <td>Name: </td>
                            <td><input type="text" style=" border: 0; border-bottom: 1px solid;" value=" {{ $CertificateOriginNo627120->full_name ?? ""  }}"> </td>
                        </tr>
                        <tr style="padding: 2px 0;">
                            <td>Designnation:</td>
                            <td><input type="text" style=" border: 0; border-bottom: 1px solid;" value=" {{ $CertificateOriginNo627120->designnation ?? ""  }}"> </td>
                        </tr>
                        <tr style="padding: 2px 0;">
                            <td>Company:</td>
                            <td><input type="text" style=" border: 0; border-bottom: 1px solid;" value=" {{ $CertificateOriginNo627120->company ?? ""  }}"> </td>
                        </tr>
                        <tr style="padding: 2px 0;">
                            <td>Place: <span style="text-decoration: underline;">Karachi</span> &nbsp; &nbsp; Date:
                               
                            </td>
                            <td><input type="text" style=" border: 0; border-bottom: 1px solid;" value=" {{ date('d-m-Y', strtotime($CertificateOriginNo627120->date)) ?? ""  }}"> </td>
                        </tr>
                    </table>

                </div>

            </td>
            <td style="width: 45%;">
                <div style="height: 220px; padding: 5px;">

                    It is hereby certified that to the best of my knowledge and according to the
                    documents produced before me this declaration appears to be <br>
                    <input type="text" style="width: 50%; border: 0; border-bottom: 1px solid; margin-top: 25px;">
                    <br>
                    Authorized Signatory <br><br>
                    <b style="padding: 10px 0; font-size: 14px; padding-top: 20px;">
                        Attestation Officer <br>
                        karachi Chamber of commerce & Industry <br><br>

                    </b>
                    <span style="text-decoration: underline; font-size: 14px;">
                        KARACHI PAKISTAN
                    </span><br>
                    Place and date of issue &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <span style="font-weight: 500;">  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Emboss</span>
                    <br><br>

                    <b style="margin-top: 20px; padding-top: 20px; text-decoration: underline; font-size: 14px;">
                        Karachi Chamber of
                        Commerce & Industry
                    </b>
                    <span style="font-size: 12px;">
                        Certifying body
                    </span>
                </div>
            </td>
        </tr>
    </table> --}}
    <table style="width: 100%; border-collapse: collapse;">
        <tr style="font-size: 12px;">
            <td style="width: 55%; border-right: 1px solid; padding: 0px; vertical-align: top;">
                <b style="display: block; margin: 0; padding: 0;">Other Information</b>

                <input type="text" value="{{ $CertificateOriginNo627120->other_information ?? '' }}" 
                       style="width: 90%; border: 0; padding-left: 5px; margin: 2px 0;">
                <input type="text" value="{{ $CertificateOriginNo627120->other_information_2 ?? '' }}" 
                       style="width: 90%; border: 0; padding-left: 5px; margin: 2px 0;">
                <input type="text" style="width: 90%; border: 0; border-bottom: 1px solid; margin: 2px 0;">
                
                <p style="margin: 5px 0; font-size: 12px;">It is hereby declared that the above mentioned goods originate in</p>
                
                <div style="text-align: center; font-weight: bold; font-size: 14px;">PAKISTAN</div>
                
    
                <table style="">
                    <tr>
                        <td>Exporter's Signature:</td>
                        <td><input type="text" style="border: 0; border-bottom: 1px solid; width: 100%;"></td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" style="border: 0; border-bottom: 1px solid; width: 100%;" 
                                   value="{{ $CertificateOriginNo627120->full_name ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Designation:</td>
                        <td><input type="text" style="border: 0; border-bottom: 1px solid; width: 100%;" 
                                   value="{{ $CertificateOriginNo627120->designnation ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Company:</td>
                        <td><input type="text" style="border: 0; border-bottom: 1px solid; width: 100%;" 
                                   value="{{ $CertificateOriginNo627120->company ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Place: <span style="text-decoration: underline;">Karachi</span> &nbsp; Date:</td>
                        <td><input type="text" style="border: 0; border-bottom: 1px solid; width: 100%;" 
                                   value="{{ date('d-m-Y', strtotime($CertificateOriginNo627120->date)) ?? '' }}"></td>
                    </tr>
                </table>
            </td>
    
            <td style="width: 45%; padding: 6px;">
                <div style="font-size: 12px; margin: 0; padding: 0;">
                    It is hereby certified that to the best of my knowledge and according to the documents produced before me, this declaration appears to be:
                    <br>
                    <br>
                    <input type="text" style="width: 50%; border: 0; border-bottom: 1px solid; margin-top: 10px;">
                    
                    <p><b>Authorized Signatory</b></p>
                    
                    <b style="font-size: 14px;">Attestation Officer</b><br>
                    Karachi Chamber of Commerce & Industry
                    
                    <p style="text-decoration: underline; font-size: 14px; ">
                        KARACHI, PAKISTAN
                    </p>
                    
                    <p><b>Place and Date of Issue:</b> <span style="font-weight: 500;">Emboss</span></p>
    
                    <b style="text-decoration: underline; font-size: 14px;">Karachi Chamber of Commerce & Industry</b>
                    <p style="font-size: 12px;">Certifying body</p>
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