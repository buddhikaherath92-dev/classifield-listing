@extends('admin.layouts.default')

@section('child-content')
    {{--<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">--}}
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Link shared count</th>
            <th scope="col">Visit via link</th>
            <th scope="col">Registered</th>
            <th scope="col">Date & Time</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody style="font-size: 16px; color: white">
            <tr style="color: #9fcdff">
                <td>{{ $view_data[0]->id }}</td>
                <td>{{ count($view_data) }}</td>
                <td>{{ count($view_data)}}</td>
                <td>{{ $register }}</td>
                <td >{{$view_data[0]->created_at}}</td>
                <td></td>
            </tr>

        </tbody>
    </table>

    {{--</table>--}}
@endsection
{{--//\App\Invitaion::where('user_id',$viewreferals->id)->count()--}}
{{--App\SuccessReferal::count()--}}