<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AgroGestor - Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="styles/styles.css" />
</head>
<body>
  <main class="login-page">

    <section class="login-brand">
      <div class="icono-circulo">
        <img src="../../img/logo.png" alt="Logo del sistema" class="logo-img" />
      </div>

      <h1 class="brand__title">AgroFinca</h1>
      <p class="brand__subtitle">Ingresa tus credenciales para continuar</p>
    </section>

    <section class="login-card">
      <form class="login-form" action="/login" method="post">

        <div class="form-group">
          <label for="usuario">Usuario o Documento</label>
          <input
            type="text"
            id="usuario"
            name="usuario"
            placeholder="Ingresa tu usuario"
            required
          />
        </div>

        <div class="form-group">
          <label for="password">Contraseña</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            required
          />
        </div>

        <div class="form-actions">
          <a href="recuperar.html" class="forgot-link">¿Olvidé mi contraseña?</a>
        </div>

        <button type="submit" class="btn btn--primary">
          Iniciar sesión
        </button>

        <div class="divider">
          <span>¿Eres un nuevo trabajador?</span>
        </div>

        <button
          type="button"
          class="btn btn--secondary"
          onclick="window.location.href='registre.php'"
        >Solicitar acceso
        </button>
      </form>
    </section>
  </main>
</body>
</html>