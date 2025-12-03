<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Fake Blog Post</h2>
    @auth
    
    <h3>Hello </h3>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>

    @else
    <div style="border:2px solid #444; padding:10px; border-radius:10px">
        <h3>Register Here</h3>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" id="name" placeholder="username"><br>
            <input type="email" name="email" id="email" placeholder="email"><br>
            <input type="password" name="password" id="password" placeholder="password"><br>
            <button>Submit</button>
        </form>
    </div>

    <div style="border:2px solid #444; padding:10px; border-radius:10px">
        <h3>Login</h3>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginName" id="name" placeholder="username"><br>
            <input type="password" name="loginPassword" id="password" placeholder="password"><br>
            <button>Login</button>
        </form>
    </div>

    @endauth

    
    
    
</body>
</html>


