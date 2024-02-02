<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        .bigBox {
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <div class="container-fluid bigBox bg-dark ">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 15vh;">
            <i class="fa-sharp fa-solid fa-heading fa-flip " style="color: #198754; font-size:50px;"></i>
        </div>
        <div class="container d-flex flex-column align-items-center justify-content-around" style="width: 80%;">
            <form method="POST" action="{{ route('register') }}" class="bg-secondary  rounded d-flex flex-column  justify-content-around" style="width: 50%;">
                @csrf

                <!-- First Name -->
                <div class="d-flex flex-column align-items-center justify-content-around">
                    <x-input-label for="firstName" :value="__('First Name')" />
                    <input type="text" id="firstName" class= " block mt-1 w-full form-control" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" />
                    <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                </div>

                <!-- Last Name -->
                <div class="d-flex flex-column align-items-center justify-content-around">
                    <x-input-label for="lastName" :value="__('Last Name')" />
                    <input type="text"  id="lastName" class="block mt-1 w-full form-control" type="text" name="lastName"
                        :value="old('lastName')" required autofocus autocomplete="lastName" />
                    <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="d-flex flex-column align-items-center justify-content-around">
                    <x-input-label for="email" :value="__('Email')" />
                    <input type="text" id="email" class="block mt-1 w-full form-control" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <!-- Role -->
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <p class="">Role</p>
                    <div class="container d-flex flex-column align-items-start justify-content-center">
                        <label for="admin">admin</label>
                        <input type="radio" name="role" id="admin" value="admin">
                        <x-input-label for="user" :value="__('user')" />
                        <input type="radio" name="role" id="user" value="user" checked >
                    </div>

                </div>

                <!-- Password -->
                <div class="d-flex flex-column align-items-center justify-content-around">
                    <x-input-label for="password" :value="__('Password')" />

                    <input type="password"  id="password" class="block mt-1 w-full form-control" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="d-flex flex-column align-items-center justify-content-around">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <input type="password"  id="password_confirmation" class="block mt-1 w-full form-control" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-flex justify-content-around  mt-4">
                    <a class="text-warning"
                        href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </form>
            <div style="height: 10vh;"></div>
        </div>
    </div>
</body>

</html>
