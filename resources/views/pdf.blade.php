<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet-{{$entry->student_name}}-{{$entry->roll_no}} </title>
</head>
<style type="text/css">
    @font-face {
        font-family: "Inter";
        src: url(<?php echo storage_path("fonts/Inter-Regular.ttf"); ?>) format("truetype");
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: "Inter";
        src: url(<?php echo storage_path("fonts/Inter-Bold.ttf"); ?>) format("truetype");
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: "Inter";
        src: url(<?php echo storage_path("fonts/Inter-ExtraBold.ttf"); ?>) format("truetype");
        font-weight: 800;

    }

    @font-face {
        font-family: "Ten";
        src: url(<?php echo storage_path("fonts/ten.ttf"); ?>) format("truetype");

    }

    body {
        font-family: "Inter";
        font-weight: 400;
    }

    .page {
        margin: 0 auto;
        width: 100%;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .float-left {
        float: left;
    }

    .float-right {
        float: right;
    }

    .d-inline {
        display: inline;
    }

    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 0;
        padding: 5px;
        text-align: center;

    }

    table#bordered tr td,
    table#bordered tr th {
        border: 1px solid;
        font-size: 11pt;
        padding: 5px 10px;
        text-align: center;
        font-weight: 700;
    }
</style>

<body>
    <div class="page">
        <div style="padding:15pt; position:relative;">

            <h2 style="font-size: 18pt; font-weight:800; text-align:center;"> ABC School & College</h2>
            <div style="padding-top:10pt;"></div>
            <h2 style="font-size: 16pt; font-weight:400; text-align:center; text-decoration:underline;"> Academic Transcript</h2>
            <table>
                <tr>
                    <td style="padding-right:10px; position:relative; height: 20pt; width:8rem;"><strong style="position:absolute; bottom:0; font-weight: 700;">Name of Student</strong> </td>
                    <td style="font-family: Ten; font-size:18pt; position:relative; height: 20pt; width:20rem;"><span style="position:absolute; top:0;">{{$entry->student_name}}</span></td>
                </tr>
                <tr>
                    <td style="padding-right:10px; position:relative; height: 20pt; width:8rem;"><strong style="position:absolute; bottom:0; font-weight: 700;">Father's Name</strong> </td>
                    <td style="font-family: Ten; font-size:18pt; position:relative; height: 20pt; width:20rem;"><span style="position:absolute; top:0;">{{$entry->father_name}}</span></td>
                </tr>
                <tr>
                    <td style="padding-right:10px; position:relative; height: 20pt; width:8rem;"><strong style="position:absolute; bottom:0; font-weight: 700;">Mother's Name</strong> </td>
                    <td style="font-family: Ten; font-size:18pt; position:relative; height: 20pt; width:20rem;"><span style="position:absolute; top:0;">{{$entry->mother_name}}</span></td>
                </tr>
                <tr>
                    <td style="padding-right:10px; text-align:left;"><strong style="font-weight: 700;">Roll No.</strong> </td>
                    <td style="font-size:12pt; text-align:left;"><strong style=" font-weight: 800;">{{$entry->roll_no}}</span></td>
                </tr>
                <tr>
                    <td style="padding-right:10px; position:relative; height: 20pt; width:8rem;"><strong style="position:absolute; bottom:0; font-weight: 700;">Group</strong> </td>
                    <td style="font-family: Ten; font-size:18pt; position:relative; height: 20pt; width:20rem;"><span style="position:absolute; top:0;">{{$entry->group}}</span></td>
                </tr>
            </table>
            <div style="padding-top:10pt;"></div>
            <table id="bordered">
                <tr>
                    <th>Sl. no.</td>
                    <th style="width: 20rem;">Name of Subjects</th>
                    <th>Letter Grade</th>
                    <th>Grade Point</th>
                    <th>Total GPA</th>
                </tr>
                @php $i = 1;
                $results = json_decode($entry->result_data);
                @endphp

                @foreach($results as $result_data)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$result_data->subject}}</td>
                    <td>{{$result_data->letter_grade}}</td>
                    <td>{{$result_data->grade_point}}</td>
                    @if($i == 1)
                    <td rowspan="{{count($results)}}">{{$entry->grade}}</td>
                    @endif
                </tr>
                @php $i++; @endphp
                @endforeach
            </table>

            <div style="position:absolute; bottom:10pt; right:10pt;">
                <img src="<?php echo storage_path("images/signature.webp"); ?>" style="height:60pt;">
                <p>Controller of Examinations</p>
            </div>
        </div>
    </div>
</body>

</html>