<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
        }
        .header img {
            max-width: 150px;
        }
        h1 {
            font-size: 24px;
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .contract-info th {
            background-color: #f2f2f2;
        }
        .contract-dates th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="{{ public_path('images/logo.png') }}" alt="Logo">
</div>

<h1>Tenant Contract</h1>

<table class="contract-info">
    <tr>
        <th colspan="2">Tenant Details</th>
    </tr>
    <tr>
        <td>Name</td>
        <td>{{ $tenant?->fullName }}</td>
    </tr>
    <tr>
        <td>Salutation</td>
        <td>{{ $tenant?->salutation }}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td>{{ $tenant?->address }}</td>
    </tr>
    <tr>
        <td>Level of Care</td>
        <td>{{ $tenant?->level_of_care }}</td>
    </tr>
</table>

<table class="contract-dates">
    <tr>
        <th colspan="2">Contract Dates</th>
    </tr>
    <tr>
        <td>Start Date</td>
        <td>{{ $tenant?->contract_start }}</td>
    </tr>
    @if ($tenant?->contract_end_date)
        <tr>
            <td>End Date</td>
            <td>{{ $tenant?->contract_end }}</td>
        </tr>
    @endif
</table>
@if(!empty($tenant?->authorizedRepresentative))
    <table class="contract-dates">
        <tr>
            <th colspan="2">Authorized Representatives</th>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>{{ $tenant?->authorizedRepresentative?->phone_number ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Mobile Number</td>
            <td>{{ $tenant?->authorizedRepresentative?->mobile_number ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $tenant?->authorizedRepresentative?->email ?? 'N/A' }}</td>
        </tr>
    </table>
@endif

<!-- Add more tables and styles as needed -?->
</body>
</html>
