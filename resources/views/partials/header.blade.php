<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Company</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/genre">Genre</a></li>
          <li><a href="/book">Book</a></li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @guest
        <div class="ms-auto">
        <a href="/login" class="btn btn-primary mr-3">Login</a>
        <a href="/register" class="btn btn-info">Register</a>
      </div>
      @endguest
      @auth
        <div class="ms-auto">
          <form action="/logout" method="POST">
            @csrf
              <button class="btn btn-warning">logout</button>
          </form>
        </div>
      @endauth


    </div>
  </header>