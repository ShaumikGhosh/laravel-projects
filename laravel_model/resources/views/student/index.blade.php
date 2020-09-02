@extends('base')

@section("title") Home @endsection


@section('body')
    <div class="container p-3">
        <h3>Student List</h3>
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Class</th>
                <th scope="col">Address</th>
                <th scope="col">Parents</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->student_name}}</td>
                <td>{{$student->student_email}}</td>
                <td>{{$student->student_class}}</td>
                <td>{{$student->student_address}}</td>
                <td>
                    <table class="table table-striped">
                        <tr>
                            <td>Father:</td>
                            <td>{{$student->student->fathers_name}}</td>
                        </tr>
                        <tr>
                            <td>Mother:</td>
                            <td>{{$student->student->mothers_name}}</td>
                        </tr>
                        <tr>
                            <td>Contact:</td>
                            <td>{{$student->student->parents_contact}}</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <a href='{{URL::to("student/edit-helper/$student->id")}}' class="btn btn-warning">Edit</a>
                    <a href='{{URL::to("student/delete/$student->id")}}' class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
