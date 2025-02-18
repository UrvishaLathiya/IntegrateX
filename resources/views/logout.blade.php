<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>
<body>
    <h2>Hii</h2>
    @if(Session::has('student'))
    <?php $student = Session::get('student'); ?>
    <p>{{ $student->firstname }}</p>
    <div id="rotate" class="text-rotate">
    </div>
   
    @endif
    
</body>
</html>
