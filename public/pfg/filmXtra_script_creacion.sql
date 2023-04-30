DROP DATABASE IF EXISTS filmXtra;
CREATE DATABASE filmXtra;

USE filmXtra;

CREATE TABLE `actors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_real` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` date NOT NULL,
  `defuncion` date DEFAULT NULL,
  `pais` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `generos` (
  `genero_id` enum('Pelicula de culto','Accion','Animacion','Aventuras','Belico','Ciencia Ficcion','Cine Negro','Comedia','Documental','Drama','Fantastico','Infantil','Intriga','Musical','Romance','Serie de TV','Terror','Thriller','Western','Deportiva','Historica','Crimen','Policiaca','Religiosa','Cine mudo','Biografico','Erotico','Experimental','Propagandistico','Serie B','Road Movie','Cortometraje') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`genero_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `posters` (
  `obra_id` bigint unsigned NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `posters_obra_id_foreign` (`obra_id`),
  CONSTRAINT `posters_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `obras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_original` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` decimal(3,0) unsigned NOT NULL,
  `sinopsis` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` year NOT NULL,
  `productora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `medios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `directors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` date NOT NULL,
  `defuncion` date DEFAULT NULL,
  `pais` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `festivals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `obra_id` bigint unsigned NOT NULL,
  `nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edicion` year NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `festivals_obra_id_foreign` (`obra_id`),
  CONSTRAINT `festivals_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edad` date DEFAULT NULL,
  `pais` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `genero_obra` (
  `genero_id` enum('Pelicula de culto','Accion','Animacion','Aventuras','Belico','Ciencia Ficcion','Cine Negro','Comedia','Documental','Drama','Fantastico','Infantil','Intriga','Musical','Romance','Serie de TV','Terror','Thriller','Western','Deportiva','Historica','Crimen','Policiaca','Religiosa','Cine mudo','Biografico','Erotico','Experimental','Propagandistico','Serie B','Road Movie','Cortometraje') COLLATE utf8mb4_unicode_ci NOT NULL,
  `obra_id` bigint unsigned NOT NULL,
  UNIQUE KEY `genero_obra_genero_id_obra_id_unique` (`genero_id`,`obra_id`),
  KEY `genero_obra_obra_id_foreign` (`obra_id`),
  CONSTRAINT `genero_obra_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`genero_id`),
  CONSTRAINT `genero_obra_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `actor_obra` (
  `obra_id` bigint unsigned NOT NULL,
  `actor_id` bigint unsigned NOT NULL,
  UNIQUE KEY `actor_obra_obra_id_actor_id_unique` (`obra_id`,`actor_id`),
  KEY `actor_obra_actor_id_foreign` (`actor_id`),
  CONSTRAINT `actor_obra_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  CONSTRAINT `actor_obra_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `director_obra` (
  `director_id` bigint unsigned NOT NULL,
  `obra_id` bigint unsigned NOT NULL,
  UNIQUE KEY `director_obra_director_id_obra_id_unique` (`director_id`,`obra_id`),
  KEY `director_obra_obra_id_foreign` (`obra_id`),
  CONSTRAINT `director_obra_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`),
  CONSTRAINT `director_obra_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `profesionals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `obra_id` bigint unsigned NOT NULL,
  `medio_id` bigint unsigned NOT NULL,
  `autor` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `contenido` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `profesionals_obra_id_foreign` (`obra_id`),
  KEY `profesionals_medio_id_foreign` (`medio_id`),
  CONSTRAINT `profesionals_medio_id_foreign` FOREIGN KEY (`medio_id`) REFERENCES `medios` (`id`),
  CONSTRAINT `profesionals_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sagas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `secuelas` (
  `saga_id` bigint unsigned NOT NULL,
  `obra_id` bigint unsigned NOT NULL,
  `orden` int unsigned NOT NULL DEFAULT '0',
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `secuelas_obra_id_saga_id_orden_unique` (`obra_id`,`saga_id`,`orden`),
  KEY `secuelas_saga_id_foreign` (`saga_id`),
  CONSTRAINT `secuelas_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`),
  CONSTRAINT `secuelas_saga_id_foreign` FOREIGN KEY (`saga_id`) REFERENCES `sagas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- orden = 0 significa que no forma parte del orden, spin-off por ejemplo --

CREATE TABLE `criticas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `obra_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `critica` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `criticas_obra_id_user_id_unique` (`obra_id`,`user_id`),
  KEY `criticas_user_id_foreign` (`user_id`),
  CONSTRAINT `criticas_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`),
  CONSTRAINT `criticas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `evaluaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `obra_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `evaluacion` decimal(2,1) unsigned NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `evaluaciones_obra_id_user_id_unique` (`obra_id`,`user_id`),
  KEY `evaluaciones_user_id_foreign` (`user_id`),
  CONSTRAINT `evaluaciones_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`),
  CONSTRAINT `evaluaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `likes` (
  `user_id` bigint unsigned NOT NULL,
  `critica_id` bigint unsigned NOT NULL,
  UNIQUE KEY `likes_user_id_critica_id_unique` (`user_id`,`critica_id`),
  KEY `likes_critica_id_foreign` (`critica_id`),
  CONSTRAINT `likes_critica_id_foreign` FOREIGN KEY (`critica_id`) REFERENCES `criticas` (`id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






