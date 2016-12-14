--drop database blogEstudiantes

--drop type tipoSexo
--drop type estadoEstudiante

CREATE TYPE tipoSexo AS ENUM ('M', 'F');
CREATE TYPE estadoEstudiante AS ENUM ('Cursando', 'Egresado');

--drop table persona
create table persona(

	idPersona 	serial NOT NULL,
	nombreCompleto 	char(50) NOT NULL,
	sexo 		tipoSexo,
	fechaIngresoTec varchar(4) NOT NULL,
	usuario 	char(20) unique NOT NULL,
	contrasena  	char(16) NOT NULL,
	nombreEmpresa 	char(50),
	estadoAcademico	estadoEstudiante,
	imagen 		char(50),
	CONSTRAINT PK_persona PRIMARY KEY (idPersona)
);

--drop type estadoAmistad
CREATE TYPE estadoAmistad AS ENUM ('amigo', 'bloqueado');

--drop table usuario_usuario
create table usuario_usuario(
	
	idUsuarioEmisor 	int NOT NULL,
	idUsuarioReceptor	int NOT NULL,
	estado 			estadoAmistad NOT NULL,

	CONSTRAINT PK_usuario_usuario PRIMARY KEY (idUsuarioEmisor, idUsuarioReceptor),

	CONSTRAINT FK_idUsuarioEmisor FOREIGN KEY (idUsuarioEmisor) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE,
	
	CONSTRAINT FK_idUsuarioReceptor FOREIGN KEY (idUsuarioReceptor) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE 
);

--drop table notificacion
create table notificacion(

	idNotificacion  	serial NOT NULL,
	idAsunto 		int NOT NULL,

	CONSTRAINT PK_notificacion PRIMARY KEY (idNotificacion)
);

--drop table usuario_notificacion
create table usuario_notificacion(

	idNotificacion 		int NOT NULL,
	idUsuario			int NOT NULL,

	CONSTRAINT PK_idNotificacion_idUsuario PRIMARY KEY (idNotificacion, idUsuario),
	
	CONSTRAINT FK_idNotificacion FOREIGN KEY (idNotificacion) 
	REFERENCES notificacion (idNotificacion)ON DELETE CASCADE ON UPDATE CASCADE,
	
	CONSTRAINT FK_idUsuario FOREIGN KEY (idUsuario) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE 
);

CREATE TYPE estadoSolicitud AS ENUM ('pendiente', 'aceptada');

--drop table solicitud
create table solicitud(

	idSolicitud 		serial NOT NULL,
	idUsuarioEmisor 	int NOT NULL,
	idUsuarioReceptor	int NOT NULL,
	estado 			estadoSolicitud NOT NULL,

	CONSTRAINT PK_idSolicitud PRIMARY KEY (idSolicitud),
	
	CONSTRAINT FK_idUsuarioEmisor FOREIGN KEY (idUsuarioEmisor) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE,
	
	CONSTRAINT FK_idUsuarioReceptor FOREIGN KEY (idUsuarioReceptor) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE
);

--drop table publicidadCodigo
create table publicidadCodigo(

	idPublicacion		serial NOT NULL,
	lenguaje		char(20) NOT NULL,
	descripcion		char(100) NOT NULL,
	textoCodigo		text NOT NULL,
	idUsuario		int NOT NULL,

	CONSTRAINT PK_publicidadCodigo PRIMARY KEY (idPublicacion),
	CONSTRAINT FK_idUsuario FOREIGN KEY (idUsuario) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE 
);

--drop table foro
create table foro(

	idForo 			serial NOT NULL,
	idPublicacion		int NOT NULL,

	CONSTRAINT PK_foro PRIMARY KEY (idForo),
	
	CONSTRAINT FK_idPublicacion FOREIGN KEY (idPublicacion) 
	REFERENCES publicidadCodigo (idPublicacion)ON DELETE CASCADE ON UPDATE CASCADE 
);

--drop table comentarforo_usuario
create table comentarforo_usuario(

	idForo			int NOT NULL,
	idUsuario		int NOT NULL,
	comentario		text NOT NULL,

	CONSTRAINT PK_idForo_idUsuario PRIMARY KEY (idForo, IdUsuario),
	
	CONSTRAINT FK_idForo FOREIGN KEY (idForo) 
	REFERENCES foro (idForo)ON DELETE CASCADE ON UPDATE CASCADE,

	CONSTRAINT FK_idUsuario FOREIGN KEY (idUsuario) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE 
);

--drop table mensajeria
create table mensajeria(

	idMensajeria 		serial NOT NULL,
	idUsuarioEmisor 	int NOT NULL,
	idUsuarioReceptor	int NOT NULL,
	mensaje			text NOT NULL,
	
	CONSTRAINT PK_mensajeria PRIMARY KEY (idMensajeria),
	CONSTRAINT FK_idUsuarioEmisor FOREIGN KEY (idUsuarioEmisor) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE,
	
	CONSTRAINT FK_idUsuarioReceptor FOREIGN KEY (idUsuarioReceptor) 
	REFERENCES persona (idPersona)ON DELETE CASCADE ON UPDATE CASCADE 
);



insert into persona (nombreCompleto, sexo, fechaIngresoTec, usuario, contrasena) values ('Jonathan Rojas', 'M', '2013', 'jona', '1234');
insert into persona (nombreCompleto, sexo, fechaIngresoTec, usuario, contrasena, imagen) values ('Joseth Campos', 'F', '2012','joss', '1234', 'asd');
insert into persona (nombreCompleto, sexo, fechaIngresoTec, usuario, contrasena) values ('Kevin Walsh', 'M', '2013', 'kev', '1234');
insert into persona (nombreCompleto, sexo, fechaIngresoTec, usuario, contrasena, imagen) values ('Dolger Campos', 'M', '2012','dol', '1234', 'asd');

select * from persona
select * from mensajeria
select * from usuario_usuario
select * from notificacion
select * from usuario_notificacion
select * from solicitud
select * from foro
select * from comentarforo_usuario
select * from publicidadCodigo


