<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Suara Lumajang</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-suara.png') }}">
    @vite('resources/css/app.css')
</head>
<body class="h-screen bg-gray-100">

    <div class="flex h-screen">
        <!-- Left Side -->
        <div class="hidden md:flex w-1/2 relative">
            
                <img src="{{ asset('images/login.jpg') }}" alt="Login Background"
                 class="absolute inset-0 w-full h-full object-cover">
            

            <div class="absolute inset-0 bg-gradient-to-br from-red-900/80 to-red-700/60 z-10"></div>

            <div class="relative z-20 flex flex-col justify-center items-center text-white text-center px-8 h-full w-full">
                <img src="{{ asset('images/logo-suara.png') }}" class="w-36 mb-6 drop-shadow-lg" alt="Logo">
                <h1 class="text-xl mb-1 font-light text-center">Selamat Datang di</h1>
                <h2 class="text-3xl font-extrabold text-center mb-2">Radio Suara Lumajang</h2>
                <p class="text-lg italic text-lime-300 text-center">Informasi Cerdas Menginspirasi</p>
            </div>
        </div>

        <!-- Right Side -->
        <div class="w-full md:w-1/2 bg-white flex items-center justify-center">
            <div class="w-full max-w-md px-6 py-10">
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-2">Log in</h2>
                <p class="text-sm text-gray-500 text-center mb-6">Masukkan detail akun Anda</p>

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="form-input" required>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" class="form-input" required>
                    </div>

                    <button type="submit" class="btn-primary w-full">Log in</button>
                    
                    <div class="text-sm text-center mt-4 space-y-1">
                        <p>Belum punya akun? <a href="#" class="text-blue-600 hover:underline">Sign up</a></p>
                        <p><a href="#" class="text-blue-600 hover:underline">Lupa password?</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
