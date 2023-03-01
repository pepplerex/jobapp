@php
if(!session('message')){
    $title = "";
    $message = "";
}elseif(!session('error')){
    $title = "";
    $message = "";
}
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                        orange: "#f97316",
                    },
                },
            },
        };
    </script>
    <title>Lara Jobs - By PeppleRex 2023</title>
</head>
<body class="mb-48">


    <nav class="flex justify-between items-center mb-4 mx-5">
        <a href="/"
            ><img class="w-24" src="images/logo.png" alt="" class="logo"
        /></a>
        @auth

        <h3>Welcome back <b> {{auth()->user()->name}}</b></h3>

        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="/manage" class="hover:text-laravel"
                    ><i class="fa-solid fa-gear"></i> Manage Listings</a
                >
            </li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" href="login.html" class="hover:text-laravel"
                    ><i class="fa-solid fa-door-closed"></i>
                    Logout</button
                >
                </form>
            </li>
        </ul>

        @else
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="/register" class="hover:text-laravel"
                    ><i class="fa-solid fa-user-plus"></i> Register</a
                >
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>
        </ul>
        @endauth
    </nav>


    <main class="mx-5">

        @yield('content')

        <x-alert />

    </main>

    

    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-4 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; {{date('Y')}}, All Rights reserved</p>

    <a
        href="/post"
        class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
        >Post Job</a
    >
</footer>

<script src="js/sweetalert2.min.js"></script>

<script>
    let alert = document.getElementById('message');
    let erralert = document.getElementById('error');

    if(alert){
        swal.fire(
            '{{session('title')}}',
            '{{session('message')}}',
            'success'
        )
    }

    if(erralert){
        swal.fire(
            '{{session('title')}}',
            '{{session('error')}}',
            'error'
        )
    }
</script>

</body>
</html>