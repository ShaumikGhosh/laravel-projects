@extends('base')

@section("title") Home @endsection


@section('body')
    <div class="container p-3">
        <h3>Parents List</h3>
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Father's Name</th>
                <th scope="col">Mother's Name</th>
                <th scope="col">Parent's Contact</th>
                <th scope="col">Student Name</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($sp as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->fathers_name}}</td>
                <td>{{$item->mothers_email}}</td>
                <td>{{$item->parents_contact}}</td>
                <td>{{$item->student}}</td>
                <td>
                    <a href='{{URL::to("student/edit-helper/$item->id")}}' class="btn btn-warning">Edit</a>
                    <a href='{{URL::to("student/delete/$item->id")}}' class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
