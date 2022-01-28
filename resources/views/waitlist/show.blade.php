<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>waitlist</title>
</head>
<body>
    <h2>Please fill the form</h2>
    <form action="{{ route('submitwaitlist') }}" method="POST">
        @csrf
        <div>
            Name: <input type="text" name="name" id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            Email: <input type="email" name="email" id="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>