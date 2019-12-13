@extends('admin.layouts.default')

@section('child-content')
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">User Name</th>
            <th scope="col">User Email</th>
            <th scope="col">Earned Visits</th>
            <th scope="col">Earned Registrations</th>
        </tr>
        </thead>
        <tbody style="font-size: 16px; color: white">
        @foreach($referrals as $index => $referrer)
            <tr style="color: #9fcdff">
                <td>{{ $referrer->user_id  }}</td>
                <td>{{ $referrer->name  }}</td>
                <td>{{ $referrer->email  }}</td>
                <td>{{ $referrer->visited_count  }}</td>
                <td>{{ $referrer->registered_count  }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
