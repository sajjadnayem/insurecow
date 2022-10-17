@extends('master')
@section('content')
<h4>User List</h4>
    <div>
        <table class="table" id="dataTable" style="text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key=>$value)
                    <tr>
                    <th>{{$key + 1}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phoneNumber}}</td>
                    <td>{{$value->address}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="row">
            {{$user->links}}
        </div> --}}
    </div>
@endsection