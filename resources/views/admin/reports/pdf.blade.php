<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Borrowed List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 40px;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        p.date-range {
            text-align: center;
            margin-top: 0;
            font-size: 13px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        thead {
            background-color: #f4f4f4;
        }

        th,
        td {
            border: 1px solid #bbb;
            padding: 10px 8px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            font-weight: bold;
            font-size: 13px;
            text-transform: uppercase;
            color: #222;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #888;
            font-style: italic;
        }
    </style>
</head>

<body>

    <h1>Borrowed List</h1>
    <p class="date-range">
        Date: {{ \Carbon\Carbon::parse($startMonth)->format('F j, Y') }}
        to {{ \Carbon\Carbon::parse($endMonth)->format('F j, Y') }}
    </p>

    @if ($borrowed->count())
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Book Title</th>
                    <th>Student No.</th>
                    <th>Student Name</th>
                    <th>Borrowed Date</th>
                    <th>Returned Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowed as $index => $borrow)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ $borrow->user->student_number }}</td>
                        <td>{{ $borrow->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($borrow->borrow_date)->format('M d, Y') }}</td>
                        <td>
                            {{ $borrow->return_date 
                                ? \Carbon\Carbon::parse($borrow->return_date)->format('M d, Y') 
                                : 'N/A' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-data">No borrowed books found in the selected date range.</p>
    @endif

</body>

</html>
