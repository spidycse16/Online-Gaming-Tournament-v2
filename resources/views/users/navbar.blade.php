<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #222831;">
    <div class="container">
        <a class="navbar-brand" href="/">Gamers Lair</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3" href="/tournaments">Tournaments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/coc-bases">COC Base Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/my-tournaments/{{Auth::id()}}">My Tournaments</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<style>
    .navbar-dark .nav-item .nav-link {
        color: #eeeeee;
        transition: color 0.3s;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .navbar-dark .nav-item .nav-link:hover {
        color: #00adb5;
    }
    .navbar-brand {
        font-weight: 700;
        letter-spacing: 2px;
    }
</style>