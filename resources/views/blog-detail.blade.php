<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Detail Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
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
                            <li class=" px-3 py-3 bg-gray-100 hover:bg-gray-200">List Item - 1</li>
                            <li class=" px-3 py-3 bg-gray-100 hover:bg-gray-200">List Item - 2</li>
                            <li class=" px-3 py-3 bg-gray-100 hover:bg-gray-200">List Item - 3</li>

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

                <di class="flex justify-center items-center space-x-10">
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
            </div>
            </div>



        </nav>
    </section>
    <section class="container mx-auto mt-10 pb-5">
        <div class="bg-gray-100 p-3 rounded-md">
            <div class="w-full h-[300px] bg-gray-200 flex justify-center items-center">
                <img src="https://www.shutterstock.com/image-photo/blogging-blog-word-coder-coding-260nw-520314613.jpg" alt="logo">
            </div>

            <div class="mt-3 h-[200px]">
                <h1 class="font-bold uppercase text-lg mb-3">{{$blogs->title}}</h1>
                <form action="/blogs/{{$blogs->id}}/subscribe" method="POST">
                    @csrf
                    <button>
                        {{!auth()->user()->isSubscribed($blogs) ? 'subscribe':'unsubscribe'}}
                    </button>
                </form>
                <p class="text-blue-700">
                    <a class="hover:opacity-90 font-bold font-medium" href="/blogs/{{$blogs->slug}}">
                        {{$blogs->slug}}
                    </a>
                </p>

                <div>
                    <p class="mt-2">
                        {{$blogs->body}}
                    </p>
                </div>
            </div>
            <div class="self-end flex-col">
                <p class="font-bold flex justify-end">
                    <a href="/users/{{$blogs->user->id}}" class="text-blue-800">
                        {{$blogs->user->name}}
                    </a>
                </p>
            </div>
        </div>
        </div>
        </div>
    </section>

    <!-- comment box -->
    <div class="bg-gray-500 p-6 pt-8">
        <div class="max-w-xl mx-auto bg-white rounded-md shadow-md p-4">
            <h2 class="text-lg font-semibold mb-4">Leave a Comment</h2>

            <form action="/blogs/{{$blogs->id}}/comment/store" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-600">Comment</label>
                    <textarea id="comment" name="body" rows="4" class="mt-1 p-2 w-full border rounded-md" placeholder="Your Comment">
                    </textarea>
                    @error('body')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-green-600 p-3 px-4 font-bold rounded-xl text-white">Submit</button>
            </form>



        </div>
        <!-- comment box -->
        <div class="max-w-xl mx-auto bg-white rounded-md shadow-md p-4 mt-4">
            @foreach($comments as $comment)
            <h1 class="text-lg font-semibold">{{$comment->user->name}}<span class="text-slate-600 text-sm px-3"">({{$comment->created_at->diffForHumans()}})</span></h1>
            <p>{{$comment->body}}</p>
            @endforeach
        </div>
    </div>

</body>

</html>