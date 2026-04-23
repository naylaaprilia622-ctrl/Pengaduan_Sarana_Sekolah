<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pengaduan Sarana Sekolah')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#102C57',
                        brown: '#5D4037',
                        'light-brown': '#C4A484',
                        gold: '#D4AF37',
                        cream: '#F5F0EB'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-gradient-to-br from-navy via-[#1a3a6e] to-brown flex items-center justify-center p-4">
    @yield('content')
</body>

</html>