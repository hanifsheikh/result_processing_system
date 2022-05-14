@extends('layouts.master')

@section('content')
@if(\Session::has('message'))
<div class="alert alert-success" role="alert" ref='statusMessage' onclick="this.remove()">
    {!! \Session::get('message') !!}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/store" method="POST">
    @csrf
    <div class="form-group row">
        <label for="studentsName" class="col-sm-2 col-form-label">Student's Name</label>
        <div class="col-sm-10">
            <input required value="{{old('student_name')}}" name="student_name" type="text" class="form-control" id="studentsName" placeholder="Student's full name.">
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="fathersName" class="col-sm-2 col-form-label">Father's Name</label>
        <div class="col-sm-10">
            <input required name="father_name" value="{{old('father_name')}}" type="text" class="form-control" id="fathersName" placeholder="Father's name.">
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="mothersName" class="col-sm-2 col-form-label">Mother's Name</label>
        <div class="col-sm-10">
            <input required name="mother_name" value="{{old('mother_name')}}" type="text" class="form-control" id="mothersName" placeholder="Mother's name.">
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="rollNumber" class="col-sm-2 col-form-label"> Roll No.</label>
        <div class="col-sm-10">
            <input required name="roll_no" value="{{old('roll_no')}}" type="number" class="form-control" id="rollNumber" placeholder="Roll No.">
        </div>
    </div>
    <fieldset class="form-group mt-2">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Group</legend>
            <div class="col-sm-10">
                <div class="form-check mt-2">
                    <input class="form-check-input" style="cursor: pointer;" type="radio" name="group" id="business_studies" value="Business Studies" {{old('group') == 'Business Studies' ? 'checked' : null}}>
                    <label style="cursor: pointer;" class="form-check-label" for="business_studies">
                        Business Studies
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" style="cursor: pointer;" type="radio" name="group" id="science" value="Science" {{old('group') == 'Science' ? 'checked' : null}}>
                    <label style="cursor: pointer;" class="form-check-label" for="science">
                        Science
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" style="cursor: pointer;" type="radio" name="group" id="arts" value="Arts" {{old('group') == 'Arts' ? 'checked' : null}}>
                    <label style="cursor: pointer;" class="form-check-label" for="arts">
                        Arts
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <div>
        <Dynamic-Fields />
    </div>
    <div class="form-group row mt-5">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save Result </button>
        </div>
    </div>
</form>
@endsection