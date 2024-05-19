<!-- resources/views/welcome.blade.php -->
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM System</title>
    @viteReactRefresh
</head>

<body>
    <div id="app">
        <customer-list></customer-list>
        <interaction-list></interaction-list>
        <sale-list></sale-list>
    </div>
    @vite('resources/js/app.js')
</body>

</html> -->

<!DOCTYPE html>
<html>

<head>
    <title>CRM System</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
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
</head>

<body>
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>