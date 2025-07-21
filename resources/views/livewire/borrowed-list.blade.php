<div class="container p-4">
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Books</th>
                <th>Borrow Date</th>
                <th>Due Dates</th>
                   <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $row = 1; @endphp
            @foreach ($borrowedGroups as $createdAt => $group)
                <tr>
                    <td>{{ $row++ }}</td>
                    <td>
                        @foreach ($group as $borrowed)
                        {{ $borrowed->book->name ?? 'Unknown' }}
                        @endforeach
                    </td>
                    <td>{{ $group->first()->borrow_date }}</td>
                    
                    <td>
                        {{ $borrowed->due_date ?? 'N/A' }}
                    </td>
                    <td>
                        {{ $borrowed->return_date ?? 'N/A' }}
                    </td>
                    <td>
                        {{ ucfirst($borrowed->status) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
