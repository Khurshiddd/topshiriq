<!doctype html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <title>Malumot qo'shish</title>

</head>
<body>
<div style="background: linear-gradient(90deg,rgba(131,58,180,1) 0%, rgba(253,29,29,1)46%,rgba(252,176,69,1)100%)!important;" class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <a href="{{ route('read') }}" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
            Ortga qaytish
        </a>
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
         aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
             style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Malumot yaratish formasi</h2>
    </div>
    <form action="{{ route('store-new')}}" method="POST" enctype="multipart/form-data"
          class="mx-auto mt-16 max-w-xl sm:mt-20">
        @csrf
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div>
                <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Nomi</label>
                <div class="mt-2.5">
                    <input type="text" name="title" id="first-name" autocomplete="given-name"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Narxi</label>
                <div class="mt-2.5">
                    <input type="number" name="price" id="last-name" autocomplete="family-name"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="malumot" class="block text-sm font-semibold leading-6 text-gray-900">Qisqa malumot</label>
                <div class="mt-2.5">
                    <input type="text" name="shortcontent" id="malumot"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">Batafsil
                    malumot</label>
                <div class="mt-2.5">
                    <textarea name="body" id="message" rows="4"
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Rasmi</label>
                <div class="mt-2.5">
                    <input type="file" name="image" id="image">
                </div>
            </div>
        </div>
        <div class="mt-10">
            <button type="submit" id="btn"
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                YUBORISH
            </button>
        </div>
    </form>
</div>
<script>
    const title = document.getElementById('first-name'),
        btn = document.getElementById('btn'),
        price = document.getElementById('last-name'),
        shortcontent = document.getElementById('malumot'),
        body = document.getElementById('message'),
        image = document.getElementById('message');

    btn.addEventListener('click',()=>{
        if (title.value === '' || price.value === '' || shortcontent.value === '' || body.value === '' || image.value === ''){
            alert('Barcha qatorlarni to\'ldirish shart!!!');
        }
    })
</script>

</body>
</html>