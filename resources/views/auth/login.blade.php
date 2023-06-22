<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
    </script>
    <style>
        body {
            background: rgba(58, 211, 253, 1);
            background: -moz-linear-gradient(left, rgba(58, 211, 253, 1) 0%, rgba(13, 189, 253, 1) 43%, rgba(13, 189, 253, 1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(58, 211, 253, 1)), color-stop(43%, rgba(13, 189, 253, 1)), color-stop(100%, rgba(13, 189, 253, 1)));
            background: -webkit-linear-gradient(left, rgba(58, 211, 253, 1) 0%, rgba(13, 189, 253, 1) 43%, rgba(13, 189, 253, 1) 100%);
            background: -o-linear-gradient(left, rgba(58, 211, 253, 1) 0%, rgba(13, 189, 253, 1) 43%, rgba(13, 189, 253, 1) 100%);
            background: -ms-linear-gradient(left, rgba(58, 211, 253, 1) 0%, rgba(13, 189, 253, 1) 43%, rgba(13, 189, 253, 1) 100%);
            background: linear-gradient(to right, rgba(58, 211, 253, 1) 0%, rgba(13, 189, 253, 1) 43%, rgba(13, 189, 253, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3ad3fd', endColorstr='#0dbdfd', GradientType=1);
        }
    </style>
</head>
<body>
    {{-- <div class="container h-screen flex m-auto">
        <form action="" method="post"
            class="w-[65%] p-14 pb-20 border border-slate-400 rounded-lg shadow-lg m-auto relative bg-sky-200">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h1 class="text-xl mb-5 uppercase">Login Here!</h1>
            @csrf
            <input type="email" name="email"
                class="w-full placeholder:text-slate-700 focus:placeholder:text-white text-slate-800 px-4 py-2 border rounded mb-5 shadow-md focus:outline-sky-600"
                placeholder="Email">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <input type="password" name="password"
                class="w-full placeholder:text-slate-700 focus:placeholder:text-white text-slate-800 px-4 py-2 border rounded mb-5 shadow-md focus:outline-sky-600"
                placeholder="Password">
            <button type="submit"
                class="text-slate-800 hover:bg-slate-100 px-4 py-2 border border-slate-300 rounded-md shadow-md absolute bottom-5 right-12 transition-all">submit</button>
        </form>
    </div> --}}
    <div class="h-screen flex">
        <div class="flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center">
            <div>
                <h1 class="text-white font-bold text-4xl font-sans">Register Now!</h1>
                <p class="text-white mt-1">Not registered? Create Free Account here</p>
                <button type="submit"
                    class="block w-28 bg-white text-indigo-800 mt-4 py-2 rounded-2xl font-bold mb-2 hover:opacity-75 transition-all">Register</button>
            </div>
        </div>
        <div class="flex w-1/2 justify-center items-center bg-white">
            <form class="bg-white" action="login" method="POST">
                @csrf
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Welcome Back</p>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="email" id="" value="{{ old('email')
                        }}" placeholder="Email Address" />
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="password" name="password" id=""
                        value="{{ old('password') }}" placeholder="Password" />
                </div>
                <button type="submit"
                    class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
                <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password ?</span>
            </form>
        </div>
    </div>
</body>
</html>