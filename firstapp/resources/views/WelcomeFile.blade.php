<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
</head>
<body>
    

    @auth
        
        <p>Congrats on login</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input name="title" type="text" placeholder="post title">
                <textarea name="body" placeholder="body content..."></textarea>
                <button>Save Post</button>
            </form>
          </div>


          <div style="border: 3px solid black;">
            <h2>All Posts</h2>
            @foreach($posts as $post)
                <div style="background-color: gray; padding: 10px; margin: 10px;">
                    <h3>{{$post['title']}}</h3>
                    <p>{{$post['body']}}</p>
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
                </div>
            @endforeach
          </div>

    @else
        <div style="border: 3px solid black;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button>Register</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password">
                <button>Login</button>
            </form>
        </div>
    @endauth

    

</body>
</html>