<header class="header">
    <nav class="navbar navbar-light container navbar-expand-lg">
        <a class="navbar-brand navbar-brand mb-0 h1 text-white fw-bold" href="{{ url('/') }}">SISBI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route("post.index")}}">Libros</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
