<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AgroFinca</title>
  <link rel="stylesheet" href="styles/registre.css" />
</head>
<body>
  <!-- Contenedor principal de la página -->
  <main class="pagina-registro">

    <!-- Encabezado superior -->
    <section class="hero-registro">
      <!-- Logo circular superior -->
      <div class="icono-circulo">
      <img src="../../img/logo.png" alt="Logo del sistema" class="logo-img" />
      </div>

      <h1 class="titulo-principal">Solicitud de Registro</h1>
      <p class="subtitulo">
        Completa el formulario para solicitar acceso como trabajador
      </p>
    </section>

    <!-- Tarjeta principal del formulario -->
    <section class="tarjeta-registro">
      <h2 class="titulo-bloque">Datos del Trabajador</h2>
      <p class="texto-ayuda">
        Tu solicitud quedará pendiente de aprobación por el mayordomo
      </p>

      <form class="formulario-registro">
        <!-- Sección de datos personales -->
        <div class="seccion-formulario">
          <h3 class="subtitulo-seccion">Datos Personales</h3>

          <div class="grid-formulario">
            <div class="grupo-campo">
              <label for="nombres">Nombres *</label>
              <input type="text" id="nombres" name="nombres" />
            </div>

            <div class="grupo-campo">
              <label for="apellidos">Apellidos *</label>
              <input type="text" id="apellidos" name="apellidos" />
            </div>

            <div class="grupo-campo">
              <label for="documento">Documento *</label>
              <input type="text" id="documento" name="documento" />
            </div>

            <div class="grupo-campo">
              <label for="eps">telefono *</label>
              <input type="text" id="telefono" name="eps" />
            </div>

            <div class="grupo-campo">
              <label for="eps">EPS *</label>
              <input type="text" id="eps" name="eps" />
            </div>

            <!-- Campo que ocupa solo la primera columna, como en la imagen -->
            <div class="grupo-campo grupo-ancho-medio">
              <label for="rh">RH *</label>
              <input type="text" id="rh" name="rh" placeholder="Ej: O+, A-, etc." />
            </div>
          </div>
        </div>

        <!-- Línea divisoria -->
        <hr class="separador" />

        <!-- Sección de credenciales -->
        <div class="seccion-formulario">
          <h3 class="subtitulo-seccion">Credenciales de Acceso</h3>

          <div class="grid-formulario">
            <!-- Campo que ocupa todo el ancho -->
            <div class="grupo-campo grupo-ancho-completo">
              <label for="usuario">Nombre de Usuario *</label>
              <input type="text" id="usuario" name="usuario" />
            </div>

            <div class="grupo-campo">
              <label for="password">Contraseña *</label>
              <input type="password" id="password" name="password" />
            </div>

            <div class="grupo-campo">
              <label for="confirmar-password">Confirmar Contraseña *</label>
              <input type="password" id="confirmar-password" name="confirmar-password" />
            </div>
          </div>
        </div>

        <!-- Botones inferiores -->
        <div class="acciones-formulario">
          <button type="submit" class="btn btn-verde">
            Enviar Solicitud
          </button>
        </div>

        <div class="btn btn-outline">
            <span class="icono-flecha">←</span>
            Volver al Login <a href="login.php"</a>
        </div>
      </form>
    </section>
  </main>
</body>
</html>