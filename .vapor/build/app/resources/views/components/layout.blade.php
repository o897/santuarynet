{{-- New layout for admin --}}
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/dist/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment"></script>

</head>

<body>
  {{-- Use Ajax, JQuery, JavaScript --}}

<div class="main-container d-flex">
  <div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
      <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">Cu</span><span class="text-white">Connect Uni</span></h1>
      <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"></i></button>
    </div>
    <ul class="list-unstyled px-3">
      <li class="active"><a href="/admin" class="text-decoration-none px-3 py-2 d-block"><i class="px-2 fa fa-home" aria-hidden="true"></i>
        Dashboard</a></li>
      <li class=""><a href="/admin/tickets" class="text-decoration-none px-3 py-2 d-block"><i class="px-2 fa-solid fa-ticket"></i>Tickets</a></li>
      <li class=""><a href="/admin/users" class="text-decoration-none px-3 py-2 d-block"><i class="px-2 fa-solid fa-user"></i> Users</a></li>
      <li class=""><a href="/admin/log" class="text-decoration-none d-flex px-3 py-2 d-block justify-content-between">
        <span><i class="px-2 fa-solid fa-file"></i>Logs</span>
        <span class="bg-dark rounded-pill text-white py-0 px-2">{{\App\Models\Log::count() }}</span>
      </a>
      </li>
      <li class=""><a href="/admin/categories" class="text-decoration-none px-3 py-2 d-block"><i class="px-2 fa-solid fa-list"></i>Categories</a></li>
      <li class=""><a href="/admin/labels" class="text-decoration-none px-3 py-2 d-block"><i class="px-2 fa-solid fa-tag"></i>Labels</a></li>
    </ul>
    <hr class="h-color mx-2">

    <ul class="list-unstyled px-2">
        <li class="class"><a href="/admin/create" class="text-decoration-none px-3 py-2 d-block"><i>Register</i></a></li>
    <li>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
            {{ __('Logout') }}
          </a>

          <form action="/logout" method="post" id="logout">
            @csrf
          </form>
    </li>

    </ul>
  </div>
  <div class="content"> 
    <nav class="navbar navbar-expand-lg bg-light navbar-light">
      <div class="container-fluid">
        <div class="d-flex justify-content-between d-md-none d-block">
          <a class="navbar-brand" href="#">ConnectUni</a>
          <button class="btn px-1 py-0 open-btn">
            <i class="fa-solid fa-bars-staggered"></i>
          </button>
        </div>   
      </div>
    </nav>
     <main>
      {{ $slot }}
     </main>
  </div>
</div>
     
<footer class="bg-dark text-light fixed-bottom">
  <div class="container">
    <hr>
    <p class="text-center">&copy; 2023 Orapeleng Mathebula. All rights reserved.</p>
  </div>
</footer> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="{{ asset('jquery.min.js') }}"></script>
    <script>

      $(".sidebar ul li").on('click', function(e) {
        // e.preventDefault();
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');

      });

      $('.open-btn').on('click', function() {
        $('.sidebar').addClass('active');
      });

      $('.close-btn').on('click', function() {
        $('.sidebar').removeClass('active');
      });

      </script>
      {{-- <script>  

        $(document).ready(function() {
          
          // Current url
          var url = window.location.href;
          // console.log(url.replace("/admin",""));
          // sidebar links
          var sidebarLinks = $('.sidebar a');

          // loop through the sidebarlinks
          sidebarLinks.each(function() {
            if(this.href === url) {
              $(this).href.replace("/admin","");

              $(this).parent().addClass('active');
            }
          });
        });
      </script> --}}
      <script>
        $('#myModal').on('shown.bs.modal', function (event) {
            console.log("Modal showing");
            var button = $(event.relatedTarget);
            var id = button.data('id');
            console.log(id);
            var name = button.data('name');
            console.log(name);
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #category').val(name);
            modal.find('.modal-body #label').val(name);

        });

        </script>
      


</body>
</html>