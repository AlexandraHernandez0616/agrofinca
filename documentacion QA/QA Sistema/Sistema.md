El sistema AgroFinca está estructurado utilizando un patrón de diseño basado en Modelo-Vista-Controlador (MVC) adaptado para PHP puro. A continuación se detalla cómo se gestionan las conexiones, hacia dónde se dirigen los datos y qué tipos de códigos se están utilizando en el proyecto.

Gestión de la Conexión a la Base de Datos
La conexión principal al sistema se encuentra centralizada en el archivo de configuración ubicado en la carpeta "config", específicamente llamado "database.php". Este archivo define una clase "Database" que se encarga de establecer la conexión con el servidor MySQL local utilizando la extensión PDO (PHP Data Objects). Se utiliza PDO porque proporciona una capa de abstracción segura que ayuda a prevenir inyecciones SQL y facilita el manejo de errores mediante excepciones. La conexión está dirigida a la base de datos llamada "agrofinca", utilizando el usuario por defecto "root" y codificación "utf8mb4" para soportar correctamente caracteres especiales y tildes.

Flujo de Datos y Modelos
Los modelos, ubicados en la carpeta "models", son los encargados de interactuar directamente con la base de datos. Cuando un modelo, como "Usuario", necesita realizar una consulta, recibe la conexión PDO previamente establecida desde el controlador. Los modelos contienen funciones específicas para buscar, insertar, actualizar o eliminar registros utilizando sentencias preparadas de SQL. Esta capa asegura que la lógica de la base de datos esté separada del resto del sistema.

Rutas y Controladores
Los controladores, situados en la carpeta "controllers", actúan como los directores de tráfico del sistema. Cuando un usuario interactúa con la interfaz, como al enviar el formulario de inicio de sesión, los datos viajan mediante el método POST hacia un controlador específico, por ejemplo "LoginController.php". El controlador se encarga de incluir el archivo de conexión a la base de datos y el modelo correspondiente. Luego, instancia la conexión, valida que los datos recibidos sean correctos y se los pasa al modelo para procesarlos. Dependiendo de la respuesta del modelo, el controlador decide hacia dónde dirigir al usuario utilizando la función "header" de PHP para realizar redirecciones. 

Por ejemplo, en el caso del inicio de sesión, el controlador verifica la contraseña cifrada usando la función "password_verify". Si es correcta, inicia una sesión de PHP para guardar la información del usuario y su rol. Finalmente, el controlador redirige al usuario a su panel de control correspondiente ubicado en la carpeta "views", separando las vistas en carpetas como "admin", "mayordomo" o "trabajador" según su nivel de acceso.

Vistas e Interfaz de Usuario
Las vistas, que se encuentran en la carpeta "views", contienen el código HTML, CSS y en ocasiones JavaScript que el usuario ve en su pantalla. Estas vistas no se conectan directamente a la base de datos. Su única función es mostrar la información y recolectar los datos ingresados por el usuario a través de formularios. Cuando el usuario envía un formulario, la vista envía esos datos dirigidos directamente hacia el archivo del controlador correspondiente para iniciar el ciclo nuevamente.

