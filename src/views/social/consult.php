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
          <h2>Consultar informações do NIS</h2>
          <p>Digite seu NIS para consultar suas informações.</p> 
        </header>

        <main class="content-main">
          <form method="POST">
            <label for="nis">Numero NIS (Número de Identificação Social)</label>
              <input
                type="text"
                id="nis"
                name="nis"
                class="input"
                placeholder="Digite seu NIS"
              />

              <button type="submit" class="btn">Consultar NIS</button>
          </form>
        </main>
      </div>
    </section>
    <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        echo 
        "<div class='result'>
          <span>" . $message->getText() . "</span>
        </div>";
      }
    ?>
  </main>

  <script src="https://unpkg.com/lucide@latest"></script>
  <script> lucide.createIcons() </script>
  </body>
</html>