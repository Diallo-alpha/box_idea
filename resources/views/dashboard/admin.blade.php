<!DOCTYPE html>
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
            <li>
                <a href="#">
                    <i class="fa-solid fa-bars-progress"></i> Tableau de Bord
                </a>
            </li>

            <li>
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
            <h1>IDÉES REÇUES</h1>

            <!-- Messages d'erreur -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Messages de succès -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <section class="section-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Catégorie</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($idees as $idee)
                            <tr>
                                <td>{{ $idee->titre }}</td>
                                <td>{{ $idee->description }}</td>
                                <td>{{ $idee->user->email }}</td>
                                <td>{{ $idee->categorie->nom }}</td>
                                <td><span class="status en-cours">{{ $idee->status }}</span></td>
                                <td>
                                    <a href="{{ route('idees.editStatus', $idee->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <form action="{{ route('idees.destroy', $idee->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette idée?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
