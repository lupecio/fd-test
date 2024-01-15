<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Lista de Usuários</title>
    <script src="{{ asset('assets/js/user.js') }}"></script>
    <script></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Usuários</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/">Criar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/create">Listar</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container mt-5 mb-5 justify-content-center">
        <div class="row col-12 mt-3 border rounded">
            <table class="table table-striped">
                <p class="fs-3">Lista de Usuários</p>
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de Criação</th>
                  </tr>
                </thead>
                <tbody id="table-body">
                </tbody>
              </table>
        </div>
    </div>
</body>
</html>
