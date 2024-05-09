<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>sd
        @csrf
        <button type="submit">POST</button>
    </form>
    <form action="/home" method="post">
        @csrf
        @method('put')
        <button type="submit">put</button>
    </form>
    <br>
    <form action="/home" method="post">
    @csrf
    @method('delete')
    <button type="submit">delete</button>
    </form>
</body>
</html>