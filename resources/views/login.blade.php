<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .bg-gray-100 {
            width: 550px;
            height: 600px;
            margin-top: 5%;
        }
    </style>
</head>

<body class="bg-white">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-gray-100 flex justify-center rounded shadow-2xl" style="position: absolute; z-index: 2;">
            <h1 class="text-5xl text-slate-100">
                <img src="/assets/logoal.png" class="rounded" alt="">
            </h1>
            <div class="bg-red-500 p-8 rounded shadow-2xl shadow" style="position: absolute; z-index: 2; margin:25%;">
                <h2 class="text-2xl mb-4 text-3xl text-white text-center">
                 Login
                </h2>
                @if (session('success'))
                <div class="bg-green-300 text-green-800 p-4 mb-4 rounded" id="success-alert">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function () {
                        var successAlert = document.getElementById('success-alert');
                        if (successAlert) {
                            successAlert.style.display = 'none';
                        }
                    }, 4000);
                </script>
                @endif

                <form method="POST" action="{{ route('login')  }}">
                    {{csrf_field()}}

                    <div class="mb-4">
                        <label for="name" class="block text-black">
                            <i class="fas fa-user mr-2"></i> Name:
                        </label>
                        <input type="name" id="name" name="name" required required maxlength="20" pattern="^[A-Za-z\s]+$"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-red-600">
                        @error('name')
                        <span class="text-black">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-black">
                            <i class="fas fa-lock mr-2"></i> Password:
                        </label>
                        <input type="password" id="password" name="password" required required minlength="8"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-red-600">
                        @error('password')
                        <span class="text-black">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class='justify-center'>
                        <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-red-400 font-sans">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </button>
                    </div>
                </form>
                 @if (session('logout'))
            <div class="bg-red-300 text-red-800 p-4 mb-4 rounded" id="logout-alert">
                {{ session('logout') }}
            </div>
            <script>
                setTimeout(function(){
                    var logoutAlert = document.getElementById('logout-alert');
                    if (logoutAlert) {
                        logoutAlert.style.display = 'none';
                    }
                }, 4000);
            </script>
                  @endif
            </div>
        </div>
    </div>
</body>

</html>
