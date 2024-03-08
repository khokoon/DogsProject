<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport"
 content="width=device-width, initial-scale=1.0">
 @vite('resources/css/app.css')
</head>
<body class="p-4">
 @if (Route::has('login'))
 <div class="text-right">
 @auth
 <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
 @else
 <a href="{{ route('login') }}" class="">Log in</a>
 @if (Route::has('register'))
 <a href="{{ route('register') }}" class="ml-4">
 Register</a>
 @endif
 @endauth
 </div>
 @endif
 <h1 class="pb-2 mb-3 font-bold border-b border-b-gray-300">
 Dogs
 </h1>
 <ul>
 @forelse ($dogs as $dog)
 <li class="flex mb-1">
 <span class="flex-1">{{ $dog->name }}</span>
 @auth
 <form action="{{ route('dog.delete', $dog->id) }}"
 method="POST">
 @csrf
 @method('DELETE')
 <button type="submit"
 class="p-1 bg-gray-200 border border-black">
 Delete</button>
 </form>
 @endauth
 </li>
 @empty
 <p>No dogs yet</p>
 @endforelse
 </ul>
 @auth
 <form method="post" action="{{ route('dog.create') }}">
 @csrf
 <h3 class="pb-2 mt-4 mb-3 font-bold border-b
 border-b-gray-300">Add a new dog</h3>
 <div class="flex">
 <div class="flex-1">
 <label>Name</label>
 <input type="text" name="name" id="name"
 class="p-1 border border-gray-200 ">
 </div>
 <input type="submit" name="send" value="Submit"
 class="p-1 bg-gray-200 border border-black
 cursor-pointer">
 </div>
 </form>
 @endauth
</body>
</html>