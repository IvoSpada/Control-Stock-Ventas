# MVC-PHP-Template
Template para utilizar en la creación de nuevos proyectos.

Para utilizar el template instala el autoloader de composer.
Para ello:
teniendo en cuenta que composer esta instalado.

1. composer init
	-package name: modificar opcional.
	-Description: añade la descripción de tu proyecto.
	-Author: modificar opcional.
	-Mínimum Stability: DEV: Versión de desarrollo (puede estar en una fase temprana y no ser estable).
			   ALPHA: Versión alfa, que puede contener errores y no es completamente funcional.
			   BETA: Versión beta, más estable que la versión alfa, pero aún puede tener problemas.
			   RC (Release Candidate): Candidata a versión estable, generalmente más estable que las versiones beta.
			   STABLE: La versión estable, que se considera lista para producción.
	-License: -
	-NO
	-NO
	-Confirm generation: yes

2. Luego de configurar el composer init. Tendremos que poner el autoload en el composer.json. Añadir el siguiente texto antes de Authors.

"autoload": {
        "psr-4": {
            "MVC\\" : "./",
            "Controllers\\" : "./controllers",
            "Model\\" : "./models"
        }
    },

3. Como modificamos el .json escribimos en la terminal composer update y listo, se creara vendor con autoload.
