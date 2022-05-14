<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ResultController extends Controller
{
    public function index()
    {
        $data = Result::orderBy('roll_no', 'ASC')->get();
        return view('results', compact('data'));
    }
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'student_name' => 'required|max:255',
                'father_name' =>  'required|max:255',
                'mother_name' =>  'required|max:255',
                'roll_no' =>  'required|numeric',
                'group' =>  'required',
            ],
            [
                'student_name.required' => 'Student Name is Required',
                'student_name.max' => 'Student Name max character reached.',
                'father_name.required' => 'Father Name is Required',
                'father_name.max' => 'Father Name max character reached.',
                'mother_name.required' => 'Mother Name is Required',
                'mother_name.max' => 'Mother Name max character reached.',
                'roll_number.required' => 'Student Roll no. is required.',
                'roll_number.numeric' => 'Student Roll no. should be numeric',
                'group.required' => 'Group is required.'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $result_data = [];
        $count = $request->count;
        $grade_sum = 0;
        for ($i = 1; $i <= $count; $i++) {
            array_push($result_data, [
                'subject' => $request['subject_' . $i],
                'letter_grade' => $request['letter_grade_' . $i],
                'grade_point' => $request['grade_point_' . $i],
            ]);
            $grade_sum +=  $request['grade_point_' . $i];
        }
        $grade = $grade_sum / $count;

        Result::create([
            'student_name' => $request->student_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'group' => $request->group,
            'roll_no' => $request->roll_no,
            'grade' => $grade,
            'result_data' => json_encode($result_data),
        ]);
        return redirect()->back()->with('message', 'Result Successfully Saved.');
    }
    public function download($id)
    {
        $entry = DB::table('results')->where('id', $id)->first();
        $data = [
            'entry' => $entry
        ];
        $pdf = PDF::loadView('pdf', $data);
        return $pdf->download('Marksheet-' . $entry->student_name . '-' . $entry->roll_no . '.pdf');
    }
    public function delete($id)
    {
        $entry = Result::where('id', $id)->first();
        return view('delete', compact('entry'));
    }
    public function destroy(Request $request)
    {
        Result::where('id', $request->id)->delete();
        return redirect('/results')->with('message', 'Student Information Deleted.');
    }
}
