<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/assets/css/style.css" />
  <title>Sistema NIS</title>
</head>
<body>
  <header class="header">
    <i data-lucide="users" class="icon"></i>
    <div>
      <h1>Sistema NIS</h1>
      <p>Número de Identificação Social</p>
    </div>
  </header>

  <main class="main">
    <section class="card">
      <nav class="tabs">
        <a href="/index.php?url=social/cadastro" class="tab">
          <i data-lucide="file-plus" class="icon"></i>
            Cadastrar NIS
        </a>
        <a href="/index.php?url=social/consulta" class="tab">
          <i data-lucide="search" class="icon"></i>
            Consultar NIS
        </a>
      </nav>

      <div class="content">
        <header class="content-header">
          <h2>Cadastrar Novo NIS</h2>
          <p>Digite seu nome completo para gerar um novo número NIS.</p> 
        </header>

        <main class="content-main">
          <form method="POST">
            <label for="nome">Nome Completo</label>
              <input
                type="text"
                id="nome"
                name="nome"
                class="input"
                placeholder="Digite seu nome completo"
              />

              <button type="submit" class="btn">Cadastrar NIS</button>
          </form>
        </main>
      </div>
    </section>
    <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($message)) {
        $alert = $message->getError() ? "alert-error" : "alert-success";

        echo 
        "<div class='$alert'>
          <h3> Cidadão cadastrado com sucesso! </h3>
          <p>Este é o seu codigo NIS:</p>
          <span>" . $message->getText() . "</span>
        </div>";
      }
    ?>
  </main>

  <script src="https://unpkg.com/lucide@latest"></script>
  <script> lucide.createIcons() </script>
  </body>
</html>