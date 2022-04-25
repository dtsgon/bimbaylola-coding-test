# PRUEBA TÉCNICA BIMBA Y LOLA

## Este no será un README normal...

La prueba **no está terminada**. Si esto es imprescindible para vostros no es necesario que sigamos adelante. 

La he realizado en horas alternas en el tiempo libre del fin de semana para que Javier os la pudiera presentar el lunes. Tenía presente que sería imposible completarla a tiempo, así que la he afrontado para **aprender EasyAdmin y divertirme**.

No es la primera vez que estudio EasyAdmin. Durante mi etapa freelance, tuve que elegir entre éste y **Sonata** para un proyecto. En aquel momento Sonata parecía más completo y adecuado.

He centrado mi tiempo en definir la estructura de la BBDD, aprender EasyAdmin y crear el controlador del comando.

Me gustaría explicar la decisión que he tomado respecto al diseño de la BBDD:

**He creado tres tablas: *Generos*, *Películas* y *Personas***.

Según la descripción de la prueba quizá pueda parecer extraño la ausencia de las tablas Directores y Actores.

Esto tiene la siguiente explicación: tanto directores como actores están alojados en la tabla *Personas*. Como personas, su rol se define por la relación con la película. De tal forma **he establecido dos relaciones ManyToMany entre *Personas* y *Películas***.

 
## Siguentes pasos:

- [ ] Terminar todos los detalles.
- [ ] Dockerirzar el proyecto.
- [x] Markdown README.
- [ ] Un README que defina el proyecto, no el proceso.
