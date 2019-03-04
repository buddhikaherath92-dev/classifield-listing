@extends('admin.layouts.default')

@section('child-content')
    {{--<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">--}}
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Visit via link</th>
            <th scope="col">Registered</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
        </tr>
        </thead>
        <tbody style="font-size: 16px; color: white">
        <tr style="color: #9fcdff">
            <td></td>
            <td></td>
            <td></td>
            <td style="color: green"></td>
            {{--<td><a type="submit" href="" class="btn btn-success">Preview</a></td>--}}
        </tr>
        </tbody>
    </table>

    {{--</table>--}}
@endsection