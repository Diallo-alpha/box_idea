<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.ayroui.com/1.0/css/starter.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <div class="row row2">
        <div class="col-sm-4">
            <h1 style="margin:0px;"><span class="largenav">Boite à idée</span></h1>
        </div>
        <div class="col-sm-8">
            <button class="btn btn-danger logout-btn">Déconnexion</button>
        </div>
    </div>
    <section class="header-area header-one">
        <div class="header-content-area">
           <div class="container">
              <div class="row align-items-center">
                 <div class="col-lg-6 col-12">
                    <div class="header-wrapper">
                       <div class="header-content">
                          <h1 class="header-title">
                            Bienvenu
                          </h1>
                          <p class="text-lg">
                            <a href="{{ route('idees.create') }}" class="btn btn-primary">Créer une nouvelle idée</a>
                          </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
           <div class="header-shape">
            <img src="https://cdn.ayroui.com/1.0/images/header/header-shape.svg" alt="shape" />
         </div>
      </div>
   </section>
   <section>
    <div class="box">
        <div class="container">
             <div class="row">
                @foreach ($idees as $idee)
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="box-part text-center">

                            <i class="fa fa-lightbulb-o" aria-hidden="true"></i>

                            <div class="title">
                                <h2>{{ $idee->titre }}</h2>
                            </div>

                            <div class="text">
                                <p>{{$idee->description}}</p>
                            </div>

                            <a href="{{ route('idees.show', $idee->id) }}"class="btn btn-primariry">>voir plus</a>
                            <br>
                            <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-warning">Modifier</a>

                            <!-- Bouton de suppression -->
                            <form action="{{ route('idees.destroy', $idee->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette idée ?')">Supprimer</button>
                            </form>

                         </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
   </section>
   <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>A propos</h6>
          <p class="text-justify">Boitidee.com<i> </i> </p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            <li>1</li>
            <li>2<li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Lien</h6>
          <ul class="footer-links">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright 2024
       <a href="#">alpha</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">

        </div>
      </div>
    </div>
</footer>
</body>
</html>
