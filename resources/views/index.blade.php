<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
</head>
<body>
    <h1>This is the news page demo</h1>
    <form action="/sub" method="post">
        @csrf
    <input type="text"
    name="email"
    class="px-4 py-2 shadow-xl">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold
    py-2 px-4 ml-4 rounded-full" type="submit">Subscribe</button>
    </form>
</body>
</html>