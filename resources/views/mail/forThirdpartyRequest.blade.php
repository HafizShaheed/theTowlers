<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested for Third Party</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333; /* Black text */
        }

        h1 {
            color: #6d3b7a; /* Primary color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #a9a9a9; /* Secondary color */
            color: #fff; /* White text */
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div>
        <h1>Hello, Admin!</h1>

        <p>This is a request to add a third party with the following information:</p>

        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ $data['third_party_name'] }}</td>
            </tr>
            <tr>
                <td><strong>Address:</strong></td>
                <td>{{ $data['third_party_address'] }}</td>
            </tr>
            <tr>
                <td><strong>Department:</strong></td>
                <td>{{ $data['third_party_department'] }}</td>
            </tr>
            <tr>
                <td><strong>Position:</strong></td>
                <td>{{ $data['third_party_pos'] }}</td>
            </tr>
            <tr>
                <td><strong>Location:</strong></td>
                <td>{{ $data['third_party_location'] }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $data['third_party_email'] }}</td>
            </tr>
            <tr>
                <td><strong>Phone:</strong></td>
                <td>{{ $data['third_party_phone'] }}</td>
            </tr>
        </table>

        <p>Thank you!</p>
    </div>
</body>
</html>
