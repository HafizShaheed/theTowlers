@extends('admin.includes.master')
@section('addStyle')
<style>
    .ct-chart .ct-series.ct-series-b .ct-slice-donut {
        stroke: #000000;
    }

    .ct-chart .ct-series.ct-series-a .ct-slice-donut {
        stroke: #9da09e;
    }

</style>
@endsection
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Interactive Form</title>
<style>
    /* Your CSS styles here */
    .hidden {
        display: none;
    }
</style>
</head>
<body style="font-family: sans-serif;">

    <table border="1" style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
        <!-- Your existing HTML content here -->
    </table>

    <table border="0" style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0; ">
        <!-- Your existing HTML content here -->
    </table>

    <table>
        <tr style="font-size: 12px;">
            <td style=" width: 55%;">
                Other Information <br>
                <div style="margin: 20px 0;">
                    It is hereby declared that the above mentioned goods originate in Pakistan<br>
                </div>
                <div>
                    <table>
                        <!-- Modify your input fields to be hidden initially -->
                        <tr style="padding: 4px 0;">
                            <td>Exporter's Signature: </td>
                            <td><input type="text" style=" border: 0; border-bottom: 1px dotted;" class="hidden"> </td>
                        </tr>
                        <!-- Repeat this pattern for other input fields -->
                    </table>

                </div>

            </td>
            <td style="width: 45%;">
                <div style="height: 200px;">

                    It is hereby certified that to the best of my knowledge and according to the
                    documents produced before me this declaration appears to be correct

                    <div style="padding-top: 60px;">
                        Authorized Signatory &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; stamp
                    </div>
                    <br><br>
                    Place and date of issue &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <br><br>
                    <b style="margin-top: 20px; padding-top: 20px; text-decoration: underline; font-size: 14px;">
                        Towel Manufacturers' Association of Pakistan
                    </b>
                </div>
            </td>
        </tr>
    </table>

    <script>
        // JavaScript to toggle visibility of input fields on click
        const inputFields = document.querySelectorAll('input');
        inputFields.forEach(input => {
            input.addEventListener('click', () => {
                input.classList.toggle('hidden');
            });
        });
    </script>

</body>
</html>



<!-- firm background tab start -->

<!-- firm background tab End -->















@endsection

@section('addScript')





@endsection
