<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ $title ?? "Dashboard" }}</title>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--     @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
  <div id="content" class="p-4 p-md-5">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ConnectUni</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav ms-auto">
            @role('agent')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('agent.index') }}">Dashboard</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="#">Stats</a>
            </li>
            @endrole

            @role('user')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.index') }}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('comments') }}">Comments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/user/create">Create ticket</a>
            </li>
            @endrole

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
            <ul class="dropdown-menu">
              {{-- <li>
                <a class="dropdown-item" href="/user/{{ auth()->user()->id }}/edit">Profile</a>
              </li> --}}
                   <li>
                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                       {{ __('Logout') }}
                     </a>
   
                     <form action="/logout" method="post" id="logout">
                       @csrf
                     </form>
               </li>
            </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="p-4 p-md-5">
      {{ $slot }}
    </div>
    
  </div>
 
  {{-- <script>
      // Get a reference to the file input element
      const inputElement = document.querySelector('input[type="file"]');

      // Create a FilePond instance
      const pond = FilePond.create(inputElement);
      
  </script>
  <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
 {{-- <footer class="bg-dark text-light py-4 fixed-bottom">
    <div class="container">
      <hr>
      <p class="text-center">&copy; 2023 Orapeleng Mathebula. All rights reserved.</p>
    </div>
  </footer>  --}}
</html>
