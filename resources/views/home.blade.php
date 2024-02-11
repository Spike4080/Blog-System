<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="pb-32">
    <section>
        <!-- nav  -->
        <nav class="container h-16 bg-[#f4f4f4] mx-auto px-10">
            <div class="h-full flex justify-between items-center">
                <div class="flex items-center space-x-10">
                    <div>
                        <img src="https://www.freeiconspng.com/thumbs/blogger-logo-icon-png/black-square-blogger-logo-icon-png-8.png" class="w-14" alt="">
                    </div>
                    <div>
                        <div class="flex items-center space-x-2 cursor-pointer" onclick="document.getElementById('dropdown').classList.toggle('hidden')">
                            <span>Categories</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>

                        </div>
                        <ul id="dropdown" class="w-52 max-h-[400px] absolute bg-gray-100 border shadow overflow-auto mt-4 hidden">
                            @foreach ($blogs as $blog)
                            <a href="/categories/{{$blog->category->id}}">
                                <li class=" px-3 py-3 bg-gray-100 hover:bg-gray-200">{{$blog->category->name}}</li>
                            </a>
                            @endforeach
                        </ul>
                    </div>

                    <form action="/" class="w-[60%] mx-auto">
                        <div class="flex justify-center items-center">
                            <input value="{{request('search')}}" type="search" name="search" class="w-full outline-none focus:ring-2 rounded-l-md border  py-2 px-3" placeholder="Search...">
                            <button type="submit" class="bg-gray-300 rounded-r-md py-2 px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>

                            </button>
                        </div>
                    </form>
                </div>

                <div class="flex justify-center items-center space-x-10">
                    @if(!auth()->user())

                    <a href="" class="bg-indigo-500 px-4 py-2 flex justify-center items-center rounded-md space-x-3 hover:opacity-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>


                        <span class="text-white">Log In</span>
                    </a>

                    <a href="/register/create" class="bg-indigo-500 px-4 py-2 flex justify-center items-center rounded-md space-x-3 hover:opacity-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>


                        <span class="text-white">Register</span>
                    </a>
                    @else
                    <a href="" class="bg-indigo-500 px-4 py-2 flex justify-center items-center rounded-md space-x-3 hover:opacity-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>


                        <span class="text-white">Write</span>
                    </a>
                    <form action="/logout" method="POST" class="bg-indigo-500 px-4 py-2 flex justify-center items-center rounded-md space-x-3 hover:opacity-90">
                        @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>


                        <button class="text-white" type="submit">Log Out</button>
                    </form>
                    @endif
                </div>
            </div>



        </nav>
    </section>

    <section class="container mx-auto mt-10">

        <div class="grid grid-cols-3 gap-4">
            @forelse ($blogs as $blog)
            <div class="bg-gray-100 p-3 rounded-md">
                <div class="w-full h-[300px] bg-gray-200 flex justify-center items-center">
                    <img src="https://www.shutterstock.com/image-photo/blogging-blog-word-coder-coding-260nw-520314613.jpg" alt="logo">
                </div>

                <div class="mt-3 h-[200px]">
                    <h1 class="font-bold uppercase text-lg mb-3">{{$blog->title}}</h1>
                    <p class="text-blue-700">
                        <a class="hover:opacity-90 font-bold font-medium" href="{{$blog->slug}}">
                            {{$blog->slug}}
                        </a>
                    </p>

                    <div>
                        <p class="mt-2">
                            {{$blog->body}}
                        </p>
                    </div>
                </div>
                <div class="self-end flex-col">
                    <p class="font-bold flex justify-end">
                        <a href="/users/{{$blog->user->username}}" class="text-blue-800">
                            {{$blog->user->name}} {{$blog->user->username}}
                        </a>
                    </p>
                </div>
            </div>
            @empty
            <div class="w-100">
                <img src="https://media.istockphoto.com/id/1669979297/photo/cartoon-button-icon-on-white-background-blue-button-with-white-question-mark-graphic.jpg?s=2048x2048&w=is&k=20&c=9SekuLpd76ogSO4CJN7MtXDaDz57plTIWY8y5il72Qw=" alt="error">
                <p class="text-2xl font-bold mt-5 text-red-900">Oops! something went wrong!</p>
            </div>
            @endforelse
        </div>

        </div>
        {{$blogs->links()}}





    </section>

    <body>


    </body>

</body>

</html>