<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-4 text-center bg">
                <a href="{{ route('dashboard')}}">
                    <button class="btn bg-dark text-white w-50 my-2">Profile</button>
                </a>
                <a href="{{ route('admin#list')}}">
                    <button class="btn bg-dark text-white w-50 my-2">Admin List</button>
                </a>
                <a href="{{ route('admin#category')}}">
                    <button class="btn bg-dark text-white w-50 my-2">Category</button>
                </a>
                <a href="{{ route('admin#post')}}">
                    <button class="btn bg-dark text-white w-50 my-2">Post</button>
                </a>
                <a href="{{ route('admin#trendPost')}}">
                    <button class="btn bg-dark text-white w-50 my-2">Trend Post</button>
                </a>
                <form method="POST" action="{{ route('logout')}}">
                    @csrf
                    <button class="btn bg-danger text-white w-50 my-2" type="submit">Log Out</button>
                </form>
            </div>
            <div class="col">@yield('content')</div>
        </div>
    </div>
</body>
    {{-- Bootstrap Link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
