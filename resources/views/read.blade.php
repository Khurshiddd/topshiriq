<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>factory name</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    
    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }
        
        #menu-toggle:checked + #menu {
            display: block;
        }
        
        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
        
        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }
        
        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }
        
        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }
        
        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }
        
        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>
    
</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    
    <!--Nav-->
    <nav style="background: linear-gradient(90deg,rgba(131,58,180,1) 0%, rgba(253,29,29,1)46%,rgba(252,176,69,1)100%)!important;"
    id="header" class="w-full z-30 top-0 py-1">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">
        
        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
            viewBox="0 0 20 20">
            <title>menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg>
        </label>        
        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav class="flex">
                <a href="{{ route('index') }}"
                class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">Bosh sahifa</a>
                @auth
                @else
                <a href="{{route('login')}}" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">Kirish</a>
                @endauth
            </nav>
        </div>
        
        <div class="order-1 md:order-2">
            <span class="flex mr-10 items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
            href="#"><svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z"/></svg>Korxona nomi</span>
            </div>
            
            <div class="order-2 md:order-3 flex items-center" id="nav-content">
                <div class="flex">
                    @auth
                    <a href="{{ route('create-page') }}" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
                        Malumot qo'shish
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">Chiqish</button>
                    </form>
                    @else
                    <input type="hidden">
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <section
    style="background: linear-gradient(90deg,rgb(167,181,217) 0%, rgb(252,184,184)46%,rgb(229,209,140)100%)!important;"
    class="bg-white py-8">
    
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        
        <nav id="store" class="w-full z-30 top-0 px-6 py-1">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                
                <div class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    Mahsulotlar
                </div>
                <div class="flex items-center" id="store-nav-content">
                    <p>Bugun: {{ $date->format('Y-m-d') }}</p>
                </div>
            </div>
        </nav>
        @foreach($products as $product)
        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
            <img class="hover:grow hover:shadow-lg" src="storage/{{ $product->image }}">
            <div class="pt-3 flex items-center justify-between">
                <div>
                    <h4 class="text-blue-700">Nomi: {{ $product->title }}</h4>
                    <h5>{{ $product->shortcontent }}</h5>
                </div>
                <div>
                    @auth
                    <form action="{{ route('delete',['id'=>$product->id]) }}" method="POST"
                        onsubmit="return confirm('Rostdan ham o\'chirishni xoxlaysizmi')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                    @endauth
                    <a href="{{ route('show', ['id'=>$product->id]) }}">
                        <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </a>
                    @auth
                    <a href="{{ route('edit',['id'=>$product->id]) }}">
                        <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </a>
                    @endauth
                </div>
            </div>
            <p class="pt-1 text-green-500">Narxi: {{ $product->price }} So'm</p>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
    
</section>


</body>

</html>
