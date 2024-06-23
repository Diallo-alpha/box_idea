<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau de Bord')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li class="">
                <a href="#">
                    <i class="fa-solid fa-bars-progress"></i> Tableau de Bord
                </a>
            </li>

            <li class="">
                <a href="{{ route('auth.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                   <i class="fa-solid fa-sign-out-alt"></i> Déconnexion
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="dashboard">
        <main class="main-content">
            <h1>IDÉES REÇCU</h1>
            <section class="section-content">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>categories</th>
                            <th>ACCEPTER</th>
                            <th>REJETR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Développement web</td>
                            <td>20/01/2023</td>
                            <td>14/11/2024</td>
                            <td>Nouriture</td>
                            <td><span class="status en-cours">en cours</span></td>
                            <td><button>Supprimer</button></td>
                        </tr>
                        <tr>
                            <td>Développement web</td>
                            <td>20/01/2023</td>
                            <td>14/11/2024</td>
                            <td>Nourriture</td>
                            <td><span class="status en-cours">en cours</span></td>
                            <td><button>Supprimer</button></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
