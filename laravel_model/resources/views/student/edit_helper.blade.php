@extends('base')

@section("title") Home @endsection


@section('body')
    <div class="container p-3">
        <h3>Edit Student</h3>
        <form method="post" action='{{url("student/update/$student->id")}}'>
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Student Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Student name" name="student_name" value="{{$student->student_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Student Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Student email" name="student_email" value="{{$student->student_email}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Student Class</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Student class" name="student_class" value="{{$student->student_class}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Student Address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Student Address" name="student_address" value="{{$student->student_address}}">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
