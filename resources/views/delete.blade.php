@extends('layouts.master')

@section('content')

<h2 class="text-center"><i class="fa-solid fa-trash-can"></i> Are you sure to delete?</h2>
<div class="py-3"></div>
<div class="d-flex justify-content-center">
    <div class="card text-center shadow rounded" style="width:25rem">
        <div class="card-body">
            <form action="/destroy" method="POST">
                @csrf
                <div class="text-center">
                    <h6>Roll No. : {{$entry->roll_no}}</h6>
                    <h6>Student Name : {{$entry->student_name}}</h6>
                    <h6>Father's Name : {{$entry->father_name}}</h6>
                    <h6>Mother's Name : {{$entry->mother_name}}</h6>
                </div>
                <div class="py-3"></div>
                <div class="d-flex justify-content-between">
                    <a href="/results" class="btn btn-light py-0"> <strong> Cancel </strong></a>
                    <button type="submit" class="btn btn-danger py-0"><strong> Delete </strong></button>
                </div>
                <input type="hidden" value="{{$entry->id}}" name="id">
            </form>
        </div>
    </div>
</div>
@endsection