<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-black navbar-dark sticky-top py-4">
    <div class="container">
      <a href="/" class="navbar-brand">NoWaste</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              @if(auth()->user())
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ auth()->user()->name }}
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/Profile">Profil</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                          <form action="/logout" method="post">
                              @csrf
                              <button class="dropdown-item">Logout</button>
                          </form>
                      </li>
                  </ul>
              </li>
              @else
              <a href="/login" class="btn btn-primary text-white">Masuk</a>
              @endif
          </ul>
      </div>
    </div>
</nav>