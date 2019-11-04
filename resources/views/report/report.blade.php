<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Transaction report</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>User Name</th>
            <td>{{$data['name']}}</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>User ID</th>
            <td>{{$data['id_account']}}</td>
        </tr>
        <tr>
            <th>Receiver ID</th>
            <td>{{$data['account_id']}}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{number_format($data['amount'], 0, ',', '.').' VND'}}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{$data['transfer_date']}}</td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>
