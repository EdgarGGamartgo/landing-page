<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edgar Martinez</title>
</head>
<body>
    <h1>Join my newsletter!</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('landing.store') }}">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Subscribe</button>
    </form>

    @error('email')
        <p style="color: red;">{{ $message }}</p>
    @enderror
</body>
</html>
