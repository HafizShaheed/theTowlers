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
                <div style="height: 250px; ">
                    <div style="padding-top: 0px;">
                        CERTIFICATE NO.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $CertificateOriginComDecFormIp->ref_number ?? ""  }}
                    </div>

                    <div style="text-align: center; height: 50px; font-weight: 500px;">
                        <div style="padding-top: 20px">
                           <p >
                            CERTIFICATE OF ORIGIN
                            </p>  
                            <p>
                                CHINA - PAKISTAN FTA
                            </p>
                           
                        </div>
                        
                        (Combined Declaration and Certificate) <br>
                        <br>
                        <div style="opacity: 0">
                            Form IP
                        </div>
                        <br><br>

                        Issued in <input type="text" style="width: 200px; border: 0; border-bottom: 1px dashed;" value="{{ $CertificateOriginComDecFormIp->issue_country ?? ""  }}"> <br>
                        (Country) 
                    </div>
                </div>
                <div style="float: right ; padding-bottom: 50px">
                    See Instructions Overleaf 
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
                                <br>
                                {{ $CertificateOriginComDecFormIp->transport_and_route ?? "" }}
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
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 20%;">
                <div style="width: 237px; text-align: justify;">7. Marks and number on package: Number and kinds of
                    package: description of goods ; HS code of
                    the importing country</div>
            </td>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 15%;">
                <div style="width: 80px;">8.Origin Criteron</div>
            </td>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 15%;">
                <div style="width: 80px;">9. Gross Weight Quantity and FOB Value</div>
            </td>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 15%;">
                <div style="width: 80px;">10. Number and Date of Invoices</div>
            </td>
            <td style="border-right: 1px solid #000; border-bottom: 1px solid; width: 20%;">
                <div style="width: 130px;">11. Remarks</div>
            </td>
        </tr>
        {{-- <tr style="text-align: center">
            <td style="border-right: 1px solid #000; width: 10%;">
                <div style="width: 78px; word-wrap: break-word; height: 260px;">
                    @for($i = 3; $i <= 3; $i++) @if(isset($CertificateOriginComDecFormIp["item_number_" . $i])) 
                    <ul style="list-style: none; padding: 30px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'item_number_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
              
            </td>
            <td style="border-right: 1px solid #000; width: 20%;">
                <div style="width: 237px; word-wrap: break-word; height: 260px; text-align: justify;">
                    @for($i = 3; $i <= 3; $i++) @if(isset($CertificateOriginComDecFormIp["marks_and_numbers_" . $i])) 
                    <ul style="list-style: none; padding: 0px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'marks_and_numbers_' . $i} }} | {{ $CertificateOriginComDecFormIp->{'numbers_and_kinds_of_packges_description_' . $i} }}</li>
                        
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="border-right: 1px solid #000; width: 15%;">
                <div style="width: 80px; word-wrap: break-word; height: 260px;">
                @for($i = 3; $i <= 3; $i++) @if(!isset($CertificateOriginComDecFormIp["origin_criterion_" . $i])) 
                    <ul style="list-style: none; padding: 0px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'origin_criterion_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="border-right: 1px solid #000; width: 15%;">
                <div style="width: 80px; word-wrap: break-word; height: 260px;">
                  @for($i = 1; $i <= 4; $i++) @if(isset($CertificateOriginComDecFormIp["gross_weight_or_other_quantity_" . $i])) 
                    <ul style="list-style: none; padding: 0px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'gross_weight_or_other_quantity_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="border-right: 1px solid #000; width: 15%;">
                <div style="width: 80px; word-wrap: break-word; height: 260px;">
                  @for($i = 1; $i <= 4; $i++) @if(isset($CertificateOriginComDecFormIp["number_and_dates_of_inovoices_" . $i])) 
                    <ul style="list-style: none; padding: 0px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'number_and_dates_of_inovoices_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
            <td style="border-right: 1px solid #000; width: 20%;">
                <div style="width: 130px; word-wrap: break-word; height: 260px;">
                  @for($i = 1; $i <= 4; $i++) @if(isset($CertificateOriginComDecFormIp["remarks_" . $i])) 
                    <ul style="list-style: none; padding: 0px; margin-top: 0px;">
                        <li style="list-style: none; padding: 2px 0 ;"> {{ $CertificateOriginComDecFormIp->{'remarks_' . $i} }}</li>
                        </ul>
                    @endif
                    @endfor
                </div>
            </td>
        </tr> --}}
        <tr style="text-align: center">
            <td style="border-right: 1px solid #000; width: 10%;">
                <div style="width: 78px; word-wrap: break-word; height: 260px; display: flex; align-items: center; justify-content: center;">
                    @for($i = 1; $i <= 15; $i++) 
                        @if(isset($CertificateOriginComDecFormIp["item_number_" . $i])) 
                            <ul style="list-style: none; padding: 0px; margin: 0;">
                                <li style="list-style: none; padding: 2px 0;">{{ $CertificateOriginComDecFormIp->{'item_number_' . $i} }}</li>
                            </ul>
                        @endif
                        
                    @endfor
                </div>
            </td>
{{--         
            <td style="border-right: 1px solid #000; width: 20%;">
                <div style="width: 237px; word-wrap: break-word; height: 260px; display: flex; align-items: center; justify-content: center; text-align: justify;">
                    @for($i = 3; $i <= 3; $i++) 
                        @if(isset($CertificateOriginComDecFormIp["marks_and_numbers_" . $i])) 
                            <ul style="list-style: none; padding: 10px; margin: 0;">
                                <li style="list-style: none; padding: 2px 0; text-align: center;">{{ $CertificateOriginComDecFormIp->{'marks_and_numbers_' . $i} }} | {{ $CertificateOriginComDecFormIp->{'numbers_and_kinds_of_packges_description_' . $i} }}</li>
                            </ul>
                        @endif
                    @endfor
                </div>
            </td> --}}
            <td style="border-right: 1px solid #000; width: 20%;">
                <div style="width: 237px; word-wrap: break-word; height: 260px; display: flex; align-items: center; justify-content: center; text-align: justify;">
                    <ul style="list-style: none; padding: 0px; margin: 0;">
                        <li style="list-style: none; padding: 2px 0;">
                            {{ $CertificateOriginComDecFormIp["marks_and_numbers_3"] ?? '' }} | 
                            {{ $CertificateOriginComDecFormIp["numbers_and_kinds_of_packges_description_1"] ?? '' }}
                        </li>
                        @for($i = 2; $i <= 15; $i++)
                            <li style="list-style: none; padding: 2px 0; padding-left:10px;">
                                {{ $CertificateOriginComDecFormIp["numbers_and_kinds_of_packges_description_" . $i] ?? '' }}
                            </li>
                        @endfor
                    </ul>
                </div>
            </td>
            
            
            
        
            <td style="border-right: 1px solid #000; width: 15%;">
                <div style="width: 80px; word-wrap: break-word; height: 260px; display: flex; align-items: center; justify-content: center;">
                    @for($i = 1; $i <= 15; $i++) 
                        @if(isset($CertificateOriginComDecFormIp["origin_criterion_" . $i])) 
                            <ul style="list-style: none; padding: 0px; margin: 0;">
                                <li style="list-style: none; padding: 2px 0;">{{ $CertificateOriginComDecFormIp->{'origin_criterion_' . $i} }}</li>
                            </ul>
                        @endif
                    @endfor
                </div>
            </td>
        
            <td style="border-right: 1px solid #000; width: 15%;">
                <div style="width: 80px; word-wrap: break-word; height: 260px; display: flex; align-items: center; justify-content: center;">
                    @for($i = 1; $i <= 15; $i++) 
                        @if(isset($CertificateOriginComDecFormIp["gross_weight_or_other_quantity_" . $i])) 
                            <ul style="list-style: none; padding: 0px; margin: 0;">
                                <li style="list-style: none; padding: 2px 0;">{{ $CertificateOriginComDecFormIp->{'gross_weight_or_other_quantity_' . $i} }}</li>
                            </ul>
                        @endif
                    @endfor
                </div>
            </td>
        
            <td style="border-right: 1px solid #000; width: 15%;">
                <div style="width: 80px; word-wrap: break-word; height: 260px; display: flex; align-items: center; justify-content: center;">
                    @for($i = 1; $i <= 15; $i++) 
                        @if(isset($CertificateOriginComDecFormIp["number_and_dates_of_inovoices_" . $i])) 
                            <ul style="list-style: none; padding: 0px; margin: 0;">
                                <li style="list-style: none; padding: 2px 0;">{{ $CertificateOriginComDecFormIp->{'number_and_dates_of_inovoices_' . $i} }}</li>
                            </ul>
                        @endif
                    @endfor
                </div>
            </td>
        
            <td style="border-right: 1px solid #000; width: 20%;">
                <div style="width: 130px; word-wrap: break-word; height: 260px; display: flex; align-items: center; justify-content: center;">
                    @for($i = 1; $i <= 15; $i++) 
                        @if(isset($CertificateOriginComDecFormIp["remarks_" . $i])) 
                            <ul style="list-style: none; padding: 0px; margin: 0;">
                                <li style="list-style: none; padding: 2px 0;text-align: left;">{{ $CertificateOriginComDecFormIp->{'remarks_' . $i} }}</li>
                            </ul>
                        @endif
                    @endfor
                </div>
            </td>
        </tr>
        
    </table>
    <table style="border-collapse: collapse; width: 100%; font-size: 12px; border-left: none; border-right: none;  border-bottom: 1px solid #000;">        
        <tr>
            <td>
                <div style="height: 10px;">
                    
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0; ">
        {{-- <tr style="font-size: 12px; ">
            <td style="width: 50%;">

                <div style="padding: 10px;">

                    12. Declaration by the exporter <br>
                    The under signed hereby declares that the above
                    details and <br> statements

                    are correct, that all the goods were <br> <br> produced in
                    <input type="text" style="width: 70%; border: 0; border-bottom: 1px dotted;" value="{{ $CertificateOriginComDecFormIp->produce_in_country ?? "" }}">
                    <br>
                    <div style="text-align: center;">(country)</div>
                    <div style="margin-top: 10px;">
                        and that they comply with the origin requirements specified <br> for these goods in the
                        generalized
                        System
                        of preferences for <br> goods
                        exported
                        to <br> <br> <input type="text" value="{{ $CertificateOriginComDecFormIp->importing_in_country ?? "" }}" style="width: 70%; border: 0;padding-left:100px; border-bottom: 1px solid;">
                    </div>


                    <div style="text-align: center;">(importing country)</div>
                    <br>
                    <br>
                    
                 
                 
                    <input type="text" style="width: 100%; border: 0; padding-left:10px; border-bottom: 0.5px dotted; margin-top: 2px;" value="{{ $CertificateOriginComDecFormIp->place ?? "" }} {{ $CertificateOriginComDecFormIp->date ?? "" }}"> 
                    place and date ,signature of authorized signatory
                     &nbsp; &nbsp;&nbsp; 
                </div>
            </td>
            <td style="width: 50%; border-left: 1px solid #000;">

                <div style="height: 0px; padding: 10px; margin-bottom: 0px;">
                    13. Certificate <br>

                    It is hereby certified, on the basis of control<br>carried out, that the declaration by the<br>
                    exporter is
                    correct <br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <input type="text"
                        style="border: 0; border-bottom: 1px dotted #000; margin-top: 10px; width: 250px;"><br>
                    Place and date,signature and stamp of certifying body
                </div>
            </td>
        </tr> --}}

        <tr style="font-size: 12px;">
            <td style="width: 50%; vertical-align: top; padding: 10px;">
        
                <div>
                    12. Declaration by the exporter <br>
                    The under signed hereby declares that the above details and statements are correct, 
                    that all the goods were produced in
                    <br>
                    <br>
                    <input type="text" style="width: 100%; border: 0; border-bottom: 1px dotted; text-align: center" value="{{ $CertificateOriginComDecFormIp->produce_in_country ?? '' }}">
                    <div style="text-align: center;">(country)</div>
                    <br>
                   
                    <div style="margin-top: 10px;">
                        and that they comply with the origin requirements specified for these goods in the
                        generalized System of preferences for goods exported to
                    <br>
                    <br>
                  

                        <input type="text" value="{{ $CertificateOriginComDecFormIp->importing_in_country ?? '' }}" style="width: 100%; border: 0; border-bottom: 1px solid; text-align: center;">
                    </div>
                    <div style="text-align: center;">(importing country)</div>
                    <br>
                    <br>
                    
                    <input type="text" style="width: 94%; border: 0; border-bottom: 0.5px dotted; margin-top: 5px; padding-left:30px;" value="{{ $CertificateOriginComDecFormIp->place ?? '' }} {{ $CertificateOriginComDecFormIp->date ?? '' }}"> 
                    <div style="text-align: center;">Place and date, signature of authorized signatory</div>
                </div>
            </td>
        
            <td style="width: 50%; border-left: 1px solid #000; vertical-align: top; padding: 10px;">
                <div>
                    13. Certificate <br>
                    It is hereby certified, on the basis of control carried out, that the declaration by the exporter is correct.
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <input type="text" style="border: 0; border-bottom: 1px dotted #000; margin-top: 16px; width: 250px;">
                    <div style="text-align: center;">Place and date, signature and stamp of certifying body</div>
                </div>
            </td>
        </tr>
        

    </table>
    <div style="page-break-before: always;"></div>


    {{-- =============second page start============ --}}

 <br><br>
 <br><br>
 <br><br>
 <br><br>
    <div class="form-container">
        <h1 style="text-align: center; font-size: 18px; margin-bottom: 20px;">China-Pakistan FTA Certificate of Origin Instruction</h1>

        <!-- Box 1 -->
        <table style="width: 100%; border-collapse: separate; border-spacing: 0 7px;">
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 1.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">State the full legal name, address (including country) of the exporter.</td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 2.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">State the full legal name, address (including country) of the consignee.</td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 3.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">State the full legal name, address (including country) of the producer. If more than one producer's good is included in the certificate, list the additional producers, including name, address (including country). If the exporter or the producer wishes the information to be confidential, it is acceptable to state "Available to Customs upon request". If the producer and the exporter are the same, complete field with "SAME".</td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 4.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">Complete the means of transport and route and specify the departure date, transport vehicle No. port of loading and discharge. </td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 5.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">The Custom Authority of the importing Party must indicate in the relevant boxes whether or not preferential treatment is accorded. </td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 6.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;"> State the item number. </td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 7.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">Provide a full description of each good. The description should be sufficiently detailed to enable the products to be identified by the Customs Officers examining them and relate it to the invoice description and to the HS description of the good. Shipping Marks and numbers on the Packages, number and kind of packages shall also be specified. For each good, identify the HS tariff classification to 6 digits, using the HS tariff ciassification of the country into whose territory the good is imported. </td>
               
                
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 8.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500; padding-bottom:10px;"> For export from one Party to the other Party to be eligible for preferential treatment under China-Pakistan FTA, the requirement is that either:(to be adjusted according to the specific rules of origin)
                <br>
                <ul style="margin: 0; padding-left: 20px; list-style-type: lower-roman; padding-top:10px;">
                    <li style="padding-bottom:10px;font-size: 10px;">The product wholly obtained in the exporting party as defined in China-Pakistan FTA Rules of Origin:</li>
                    <li style="padding-bottom:10px;font-size: 10px;">Subject to sub-paragraph (i)above, for the purpose of implementing the provisions of China-Pakistan FTA Rules of Origin, products worked
                        on and processed as a result of which the total value of materlal originating from non China-Pakistan FTA member states or of undetermined
                        origin used is less than 60% of the FOB value of the product produced or obtained and the final process of the manufacture is performed within territory of the exporting Party;</li>
                    <li style="padding-bottom:10px;font-size: 10px;"> Products which comply with origin requirements provided for in Articie 16 of this Agreement; and which are used in a Party as inputs for a finished product eligible for preferential treatment in the other Party shall be considered as a product originating in the Party where working or processing of the finished product has taken place provided that the aggregate China-Pakistan FTA content of the final product is not less than 40%; or </li>
                    <li style="padding-bottom:10px;font-size: 10px;"> Products that satisfy the Product Specific Rules provided for in Attachment B of the China-Pakistan FTA Rules of Origin shall be considered as goods in which sufficlent transformation has been carried out in a Party. 
                        <br> 
                        <br>
                        If the goods qualify under the above criteria, the exporter must indicate in Field 8 of this form the origin criteria on the basis of which he claims that his goods qualify for preferential treatment, in the manner shown in the following table:
                        <br>
                        <br>
                        <table style="width: 90%; border-collapse: collapse; font-size: 10px; border: 1px solid black;">
                            <tr>
                                <th style="border: 1px solid black; padding: 5px; text-align: left;">Circumstances of production or manufacture in the first country named in Field 12 of this form</th>
                                <th style="border: 1px solid black; padding: 5px; text-align: left; text-align: center;">Insert in Field 8</th>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; padding: 5px;">(a) Products wholly produced in the country of exportation (see paragraph 8 (i) above)</td>
                                <td style="border: 1px solid black; padding: 5px;text-align: center;">"P"</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; padding: 5px;">(b) Products worked upon but not wholly produced in the exporting Party which were produced in conformity with the provisions of paragraph 8 (ii) above</td>
                                <td style="border: 1px solid black; padding: 5px;text-align: center;">Percentage of single country content, example 40%</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; padding: 5px;">(c) Products worked upon but not wholly produced in the exporting Party which were produced in conformity with the provisions of paragraph 8 (ii) above</td>
                                <td style="border: 1px solid black; padding: 5px;text-align: center;">Percentage of China-Pakistan FTA cumulative content, example 40%</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; padding: 5px;">(d) Products satisfied the Products Specific Rules</td>
                                <td style="border: 1px solid black; padding: 5px;text-align: center;">"PSR"</td>
                            </tr>
                        </table>
                    </li>
                    
                </ul>    
                </td>
               
            </tr>
            
        </table>
        
        
   

    


     

        <table style="width: 100%; border-collapse: separate; border-spacing: 0 7px;">
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 9.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">Gross weight in Kilos should be shown here. Other units of measurement e.g. Volume or number of ilems which would indicate exact quantities may be used when customary; the FOB value shall be the invoiced value declared by exporter to the issuing authority..</td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 10.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">Involce number and date of Invoices should be shown here.</td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 11.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">Customer's Order Number, Letter of Credit Number, and etc. may be included if required. </td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 12.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">The filed must be completed, signed and dated by the exporter, insert the place, date of signature. </td>
            </tr>
            <tr>
                <td style="width: 50px; vertical-align: top; padding: 0px; font-size: 10px; font-weight: 500;"><strong>Box 13.</strong></td>
                <td style="padding: 0px 0px 0px 2px; font-size: 10px; font-weight: 500;">The filed must be completed, signed, dated and stamped by the authorized person of the certifying authority. </td>
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

</html>

