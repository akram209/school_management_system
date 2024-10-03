<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $assignment->title }} for {{ $student->user->first_name }}</title>
</head>

<body>
    <h1>{{ $assignment->name }}</h1>
    <iframe src="{{ asset('storage/assignments/' . $path) }}"
        style="position: absolute; left: 0; top: 0; width: 100%; height: 100vh"></iframe>
</body>

</html>
