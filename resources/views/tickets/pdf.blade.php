<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .ticket-info {
            margin-bottom: 20px;
        }
        .ticket-info h2 {
            margin: 0;
            font-size: 20px;
        }
        .ticket-info p {
            margin: 0;
            font-size: 14px;
        }
        .ticket-details {
            margin-top: 30px;
        }
        .ticket-details table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .ticket-details th, .ticket-details td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<div class="ticket-info">
    <h2>Ticket Information</h2>
    <p><strong>Location:</strong> {{ $ticket->location }}</p>
    <p><strong>Ticket Type:</strong> {{ $ticket->ticket_type }}</p>
    <p><strong>User:</strong> {{ $ticket?->user?->full_name }}</p>
    <!-- Add other ticket information here -->
</div>

<div class="ticket-details">
    <h2>Additional Details</h2>
    <table>
        <tr>
            <th>Dimensions</th>
            <td>{{ $ticket->dimensions }}</td>
        </tr>
        <tr>
            <th>Why Needed</th>
            <td>{{ $ticket->why_needed }}</td>
        </tr>
        <tr>
            <th>Solution Suggestion</th>
            <td>{{ $ticket->solution_suggestion }}</td>
        </tr>
        <tr>
            <th>Trade</th>
            <td>{{ $ticket->trade }}</td>
        </tr>
        <tr>
            <th>Problem Location</th>
            <td>{{ $ticket->problem_location }}</td>
        </tr>
        <tr>
            <th>Tried to Solve</th>
            <td>{{ $ticket->tried_to_solve }}</td>
        </tr>
        <tr>
            <th>Proposed Solution</th>
            <td>{{ $ticket->proposed_solution }}</td>
        </tr>
        <tr>
            <th>Expense Reason</th>
            <td>{{ $ticket->expense_reason }}</td>
        </tr>
        <tr>
            <th>Notes</th>
            <td>{{ $ticket->notes }}</td>
        </tr>
        <tr>
            <th>Ticket Status</th>
            <td>{{ $ticket->ticket_status }}</td>
        </tr>
        {{--<tr>
            <th>Notes</th>
            <td>
                @foreach($notes as $key => $note)
                    <div class="note">
                        <strong>Status:</strong> {{ $note->status }}<br>
                        {{ $note->note }}<br>
                        {{ $note->create_date }}<br><br>
                    </div>
                    @if (($key + 1) % 10 === 0)
                        <div class="page-break"></div>
                    @endif
                @endforeach
            </td>
        </tr>--}}
    </table>
</div>
<div class="ticket-details">
    <h2>Notes</h2>
    <table>
        <tr>
            <th>Status</th>
            <th>Note</th>
            <th>Create Date</th>
        </tr>
        @foreach($notes as $key => $note)
            <tr>
                <td>{{ $note->status }}</td>
                <td>{{ $note->note }}</td>
                <td>{{ $note->create_date }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
