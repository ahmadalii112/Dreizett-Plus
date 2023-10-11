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

<h1>{{ trans('language.tenants.tenant_contract') }}</h1>

<table class="contract-info">
    <tr>
        <th colspan="2">{{ trans('language.actions.details', ['name' => trans_choice('language.tenants.tenants', 2)]) }}</th>
    </tr>
    <tr>
        <td> {{ trans('language.name') }}</td>
        <td>{{ $tenant?->information?->fullName }}</td>
    </tr>
    <tr>
        <td>{{ trans('language.address') }}</td>
        <td>{{ $tenant?->information?->address }}</td>
    </tr>
    <tr>
        <td>{{ trans('language.tenants.level_of_care') }}</td>
        <td>{{ $tenant?->level_of_care }}</td>
    </tr>
</table>

<table class="contract-dates">
    <tr>
        <th colspan="2">{{ trans('language.tenants.contract_dates')  }}</th>
    </tr>
    <tr>
        <td>{{ trans('language.tenants.contract_start_date') }}</td>
        <td>{{ $tenant?->contract_start }}</td>
    </tr>
    @if ($tenant?->contract_end_date)
        <tr>
            <td>{{ trans('language.tenants.contract_end_date') }}</td>
            <td>{{ $tenant?->contract_end }}</td>
        </tr>
    @endif
</table>
@if(!empty($tenant?->authorizedRepresentative))
    <table class="contract-dates">
        <tr>
            <th colspan="2">{{ trans('language.authorized_representative') }}</th>
        </tr>
        <tr>
            <td> {{ trans('language.name') }}</td>
            <td>{{ $tenant?->authorizedRepresentative?->information?->fullName }}</td>
        </tr>
        <tr>
            <td>{{ trans('language.address') }}</td>
            <td>{{ $tenant?->authorizedRepresentative?->information?->address }}</td>
        </tr>
        <tr>
            <td>{{ trans('language.phone_number') }}</td>
            <td>{{ $tenant?->authorizedRepresentative?->phone_number ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>{{ trans('language.mobile_number') }}</td>
            <td>{{ $tenant?->authorizedRepresentative?->mobile_number ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>{{ trans('language.email') }}</td>
            <td>{{ $tenant?->authorizedRepresentative?->email ?? 'N/A' }}</td>
        </tr>
    </table>
@endif

</body>
</html>
