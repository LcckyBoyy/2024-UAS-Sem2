<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Rasa Sulawesi</title>
    @vite('resources/css/app.css')
    <style>
        /* Inline CSS for demonstration purposes */
        @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;700&display=swap');
        .font-eb-garamond {
            font-family: 'EB Garamond', serif;
        }
    </style>
</head>

<body>

    <!-- nav bar -->
    <nav class="backdrop-blur-md bg-emerald-950/80 text-white w-full fixed top-0 z-10 border-b border-white/5">
        <div class="container mx-auto py-4">
            <div class="flex justify-between items-center">
                <!-- icon rasul -->
                <div class="flex-shrink-0">
                    <a href="#">
                        <img src="{{ asset('images/rasulicon.png') }}" class="h-9" alt="Rasa Sulawesi Icon">
                    </a>
                </div>
                <!-- nav items -->
                <div class="hidden md:flex space-x-6 text-sm font-extralight">
                    <a href="{{ route('mainView') }}" class=" hover:text-yellow-100 hover:font-mediume {{ request()->routeIs('mainView') ? 'font-bold' : '' }}">Home</a>
                    <a href="{{ route('/') }}" class="hover:text-yellow-100 hover:font-medium">Our Menus</a>
                    <a href="#" class="hover:text-yellow-100 hover:font-medium">Our Location</a>
                    <a href="#" class="hover:text-yellow-100 hover:font-medium">About Us</a>
                </div>
                <!-- CTA -->
                <div class="hidden md:flex items-center">
                    <a href="https://instagram.com/resto.rasasulawesi" target="_blank" rel="noopener noreferrer" class="bg-yellow-100 px-5 py-1.5 rounded-3xl text-sm text-zinc-900 font-medium hover:px-6" style="transition: color 0.3s ease;">
                        Visit Us
                    </a>
                </div>
            </div>
        </div>
    </nav>


    <!-- hero -->
    <!-- <div class=" flex-col items-center justify-center bg-emerald-950 h-screen">
        <div class=" flex-col justify-start items-center">
            <p class=" text-center font-serif text-8xl text-white">
                Celebes cuisine<br>like never before.
            </p>
            <p class=" my-10 text-center text-l text-white font-light">
                Welcome to Rasa Sulawesi restaurant<br>Discover the No. 1  Celebes Culinary in Indonesia.
            </p>

            <div class=" md:flex items-center w-full">
                <div class=" bg-yellow-100 rounded-full">
                    <p class=" py-4 px-8 text-center text-l font-medium text-zinc-900">
                        Show me your foods!
                    </p>
                </div>
            </div>
        </div>
    </div> -->

    <div class="flex flex-col items-center justify-center bg-emerald-950 h-screen">
        <div class="flex flex-col items-center">
            <p class="text-center font-serif text-8xl text-white font-eb-garamond">
                Celebes cuisine<br>like never before.
            </p>
            <p class="my-10 text-center text-l text-white font-light">
                Welcome to Rasa Sulawesi restaurant<br>Discover the No. 1 Celebes Culinary in Indonesia.
            </p>
            <!-- CTA -->
            <div class="flex justify-center w-full">
                <div class="bg-yellow-100 rounded-full">
                    <a href="{{ route('/') }}" class=" block py-3 px-8 text-center text-l font-medium text-zinc-900">
                        Show me your foods!
                    </a>
                </div>
            </div>
        </div>
    </div>



    <div class=" flex items-center justify-center bg-white h-screen">
        <a>Hello</a>
    </div>

    <div class=" bg-emerald-950 h-screen">
        
    </div>

    <div class=" bg-zinc-900 h-screen">
        
    </div>

    <div class=" bg-yellow-100 h-screen">
        
    </div>

    <div class=" bg-emerald-950 h-[450px]">
        
    </div>
</body>
</html>