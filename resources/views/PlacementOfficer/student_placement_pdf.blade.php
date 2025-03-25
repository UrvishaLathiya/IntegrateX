<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Placement Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">🎓 Student Placement Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year</th>
                <th>Branch</th>
                <th>Skills</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                    <td>{{ $student->year }}</td>
                    <td>{{ $student->branch->branch_name ?? 'N/A' }}</td>
                    <td>
                        @foreach ($student->skillSubsets as $subset)
                            {{ $subset->name }} ({{ $subset->skill->name }})<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
