<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/48ec6460d5.js"></script>
    <title>Blog App </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a style = "color: Dodgerblue" class="navbar-brand" href="/blogs"><b>Blogger</b><br><p style="font-size:14px">Let's share our Thoughts</p>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-md-auto">
            <li class="nav-item active">
              <a style = "color: Dodgerblue" class="nav-link" href="/blogs">Blogs <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a style = "color: Dodgerblue" class="nav-link" href="/home">My Blog</a>
              </li>
            <li class="nav-item">
              <a style = "color: Dodgerblue" class="nav-link" href="/blogs/create">New Post</a>
            </li>
        </div>
      </div>
      </nav>
      <div class="container" > 
         @yield('content')
      </div>
</body>
</html>