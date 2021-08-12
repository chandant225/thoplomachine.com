<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Mail</title>
</head>

<body>
    <div>
        <p>
            <b>Name</b>: {{ $data['name'] }}
        </p>
        <p>
            <b>Phone</b>: {{ $data['phone'] }}
        </p>
        <p>
            <b>Email</b>: {{ $data['email'] }}
        </p>
        <p>
            <b>Message</b>: {{ $data['message'] }}
        </p>
    </div>
</body>

</html>
