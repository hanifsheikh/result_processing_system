@extends('layouts.master')

@section('content')

<h2><i class="fa-solid fa-square-poll-horizontal"></i> All Students Results</h2>
@if(\Session::has('message'))
<div class="alert alert-success" role="alert" ref='statusMessage' onclick="this.remove()">
    {!! \Session::get('message') !!}
</div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Roll No.</th>
            <th scope="col">Student Name</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($data as $entry)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$entry->roll_no}}</td>
            <td>{{$entry->student_name}}</td>
            <td class="text-center">
                <a data-toggle="tooltip" data-placement="top" title="Download PDF" href="/download/{{$entry->id}}" target="_blank" style="margin-right: 5px;" class="text-dark"><i class="fa-solid fa-file-pdf"></i></a>
                <a data-toggle="tooltip" data-placement="top" title="Delete" href="/delete/{{$entry->id}}" class="text-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        @php $i++; @endphp
        @endforeach
    </tbody>
</table>
@endsection