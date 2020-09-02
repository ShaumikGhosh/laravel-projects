@extends('base')

@section('title') Add Parents @endsection


@section('body')
    <div class="container p-3">
        <h3>Add Parents</h3>
        <form method="post" action="{{route('parent.add_parent')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Father's Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Father's name" name="fathers_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mother's Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Mother's name" name="mothers_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Parent's Contact</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Parents contact" name="parents_contact">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Student Name</label>
                <select class="form-control" id="exampleInputEmail1" name="student_name">
                    <option value="">-- Select Student --</option>
                    @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->student_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Parents</button>
        </form>
    </div>
@endsection
