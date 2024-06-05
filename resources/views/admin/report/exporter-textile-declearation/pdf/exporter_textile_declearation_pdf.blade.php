<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>

<body style="font-family: sans-serif;">
    <header>
        <div style="display: flex; justify-content: end; width: 100%;">
            <div style="text-align: right;">
                <a style="display: block; color: #000; text-decoration:none;" href="tel:021 36322500">
                    Phones: 36322500
                </a>
                <a style="display: block; color: #000; text-decoration:none;" href="tel:021 36322608">
                    36322608
                </a>
                <a style="display: block; color: #000; text-decoration:none;" href="mailto:towellers@towellers.com">
                    Email: towellers@towellers.com
                </a>
            </div>
        </div>
    </header>
    <section style="position: relative;">
        <div style="width: 90%; margin:0 auto;">
            <h1 style="text-align: center; font-family: fantasy;">
                Toweller Limited</h1>
            <div style="border: 1px solid #000; width: 60%; margin: 0 auto; border-bottom: 10px solid #000;">
                <h2 style="text-align: center; font-size: 20px;">EXPORTER'S TEXTILE DECLARATION OF COUNTRY OF ORIGIN
                </h2>
            </div>

            <div style="position: absolute; width: 180px; text-align: center; right: -30px; top: 80px;">
                <p style="font-size: 12px;">OFFICE <br>
                    TOWELLERS HOUSE WS.A 30-31, BLOCK FEDERAL AREA
                    KARACHI</p>
            </div>
        </div>
    </section>
    <section style="padding: 20px 0 0 0;">
        <p style="font-size: 14px;"> 1. <input type="text"
                style="border: 0; border-bottom: 1px solid #000; width: 200px;" value="{{ $ExporterTextileDeclearation->declared }}">declared that the
            articles described below and covered by the entry to which this declaration relates are wholly growth,
            product, or manufacture of a single foreign territory of country of insular possession of the United States
            as identified below. i declare that the information set fourth in thus declaration is correct and true to
            the best of my information knowledge and beleif.</p>
    </section>
    <section>
        <div style="border: 1px solid #000;">
            <table style="height: 350px; border: 1px solid black; border-collapse: collapse;">
                <tr style="border: 1px solid black; border-collapse: collapse;">
                    <th style="font-weight: 400; border: 1px solid black; border-collapse: collapse; padding: 0 3px; text-transform: uppercase; text-align: start; width: 20%;">Invoice Number</th>
                    <th style="font-weight: 400; border: 1px solid black; border-collapse: collapse; padding: 0 3px; text-transform: uppercase; text-align: start; width: 20%;">B/L Number</th>
                    <th style="font-weight: 400; border: 1px solid black; border-collapse: collapse; padding: 0 3px; text-transform: uppercase; text-align: start; width: 70%;">Marks Or Identification Number</th>
                    <th style="font-weight: 400; border: 1px solid black; border-collapse: collapse; padding: 0 3px; text-transform: uppercase; text-align: start; width: 100%;">Description Or Procedure</th>
                    <th style="font-weight: 400; border: 1px solid black; border-collapse: collapse; padding: 0 3px; text-transform: uppercase; text-align: start; width: 20%;">Country Of Origin</th>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                        @for($i = 0; $i < 5; $i++)
                        @if(isset($ExporterTextileDeclearation["invoice_number_" . $i]))
                        <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                            <li style="list-style: none; padding: 2px 0 ;"> {{ $ExporterTextileDeclearation->{'invoice_number_' . $i} }}</li>
                        </ul>
                        @endif
                        @endfor
                    </td>
                    <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                        @for($i = 0; $i < 5; $i++)
                        @if(isset($ExporterTextileDeclearation["b_l_number_" . $i]))
                        <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                            <li style="list-style: none; padding: 2px 0 ;"> {{ $ExporterTextileDeclearation->{'b_l_number_' . $i} }}</li>
                        </ul>
                        @endif
                        @endfor
                    </td>
                    <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                        @for($i = 0; $i < 5; $i++)
                        @if(isset($ExporterTextileDeclearation["marks_or_identification_number" . $i]))
                        <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                            <li style="list-style: none; padding: 2px 0 ;"> {{ $ExporterTextileDeclearation->{'marks_or_identification_number' . $i} }}</li>
                        </ul>
                        @endif
                        @endfor
                    </td>
                    <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                        @for($i = 0; $i < 5; $i++)
                        @if(isset($ExporterTextileDeclearation["description_and_procedure_" . $i]))
                        <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                            <li style="list-style: none; padding: 2px 0 ;"> {{ $ExporterTextileDeclearation->{'description_and_procedure_' . $i} }}</li>
                        </ul>
                        @endif
                        @endfor
                    </td>
                    <td style="text-align: center; border: 1px solid black; border-collapse: collapse; height: 350px; vertical-align: top; padding-top: 10px">
                        @for($i = 0; $i < 5; $i++)
                        @if(isset($ExporterTextileDeclearation["country_of_origin_" . $i]))
                        <ul style="list-style: none; padding: 2px; margin-top: 0px;">
                            <li style="list-style: none; padding: 2px 0 ;"> {{ $ExporterTextileDeclearation->{'country_of_origin_' . $i} }}</li>
                        </ul>
                        @endif
                        @endfor
                    </td>
                </tr>
            </table>
            
        </div>
        <table>
            <tr>
                <td style="width: 400px;">
                    <p style="height: 180px;">Date: <input
                            style="width: 200px; border: 0; border-bottom: 1px solid #000;" type="text" value="{{ date('d/m/Y', strtotime($ExporterTextileDeclearation->date)) }}"></p>
                </td>
                <td>
                    <p>Signature: <input style="width: 200px; border: 0; border-bottom: 1px solid #000;" type="text">
                    </p>
                    <p>Name: <input style="width: 200px; border: 0; border-bottom: 1px solid #000;" type="text"></p>
                    <p>Title: <input style="width: 200px; border: 0; border-bottom: 1px solid #000;" type="text"></p>
                    <p>Company: <span>Towellers Limited</span></p>
                    <p>Address: <span>WS.A 30-31, BLOCK FEDERAL AREA
                            KARACHI</span></p>

                </td>
            </tr>
        </table>

    </section>

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