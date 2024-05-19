<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
    </style>
</head>

<body class="bg-gray-200 h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col w-96">
        <h2 class="text-2xl font-semibold mb-2 text-center">Register</h2>
        <div id="alert-content" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-2" role="alert">
            <span class="block sm:inline" id="alert-message">Invalid email or password.</span>
        </div>
        <form id="formRegister" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Email">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="***********">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password2">
                    Confirm Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password2" name="password2" type="password" placeholder="***********">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Sign Up
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ url('/login') }}">
                    Have an account?
                </a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#formRegister").submit(function(e) {
                e.preventDefault();

                const name = $("#name").val();
                const email = $("#email").val();
                const password = $("#password").val();
                const password2 = $("#password2").val();
                const alertContent = $("#alert-content");
                const alertMessage = $("#alert-message");
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!name) {
                    alertContent.removeClass("hidden");
                    alertMessage.text("Name is required!");
                    return false;
                }
                if (!email) {
                    alertContent.removeClass("hidden");
                    alertMessage.text("Email is required!");
                    return false;
                }
                if (!emailRegex.test(email)) {
                    alertContent.removeClass("hidden");
                    alertMessage.text("Invalid email format!");
                    return false;
                }
                if (!password) {
                    alertContent.show(200);
                    alertMessage.text("Password is required!");
                    return false;
                }
                if (password !== password2) {
                    alertContent.show(200);
                    alertMessage.text("Password doesn't match!");
                    return false;
                }

                var formData = $(this).serialize();

                $.ajax({
                    method: "POST",
                    url: "{{ env('APP_URL').'/api/auth/register' }}",
                    data: formData,
                    success: function(data) {
                        if (!data.status) {
                            alertContent.show(200);
                            alertMessage.text(data.message);
                            return false;
                        }
                        window.location.href = '/';
                    }
                })
            })
        })
    </script>
</body>

</html>