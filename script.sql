CREATE TABLE Administrador_Global (
  id_Admin INTEGER(20) UNSIGNED  NOT NULL   AUTO_INCREMENT,
  user_Admin VARCHAR(20)  NOT NULL  ,
  pass_Admin VARCHAR(20)  NOT NULL    ,
PRIMARY KEY(id_Admin));



CREATE TABLE Usuarios (
  nid INTEGER(20) UNSIGNED  NOT NULL   AUTO_INCREMENT,
  tipo_id VARCHAR(200)  NULL  ,
  Administrador_Global_id_Admin INTEGER(20) UNSIGNED  NOT NULL  ,
  nombres VARCHAR(100)  NOT NULL  ,
  apellidos VARCHAR(100)  NOT NULL  ,
  fecha_nacimiento DATE  NOT NULL  ,
  email VARCHAR(100)  NOT NULL  ,
  telefono VARCHAR(10)  NOT NULL  ,
  username VARCHAR(20)  NOT NULL  ,
  pass VARCHAR(20)  NOT NULL    ,
PRIMARY KEY(nid));



CREATE TABLE Direccion (
  idDireccion INTEGER(20) UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Usuarios_nid INTEGER(20) UNSIGNED  NOT NULL  ,
  pais VARCHAR(20)  NOT NULL  ,
  departamento VARCHAR(50)  NOT NULL  ,
  ciudad VARCHAR(50)  NOT NULL  ,
  municipio VARCHAR(50)  NOT NULL  ,
  barrio VARCHAR(50)  NOT NULL  ,
  informacion_adicional VARCHAR(100)  NOT NULL    ,
PRIMARY KEY(idDireccion)  ,
INDEX Direccion_FKIndex1(Usuarios_nid),
  FOREIGN KEY(Usuarios_nid)
    REFERENCES Usuarios(nid)
      ON DELETE CASCADE
      ON UPDATE CASCADE);



CREATE TABLE Carrito (
  id_carrito INTEGER(20) UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Usuarios_nid INTEGER(20) UNSIGNED  NOT NULL    ,
  idProducto INTEGER(20) UNSIGNED NOT NULL,
  cantidad INTEGER(20) UNSIGNED NOT NULL,
PRIMARY KEY(id_carrito)  ,
INDEX Carrito_FKIndex1(Usuarios_nid),
  FOREIGN KEY(Usuarios_nid)
    REFERENCES Usuarios(nid)
      ON DELETE CASCADE
      ON UPDATE CASCADE
  FOREIGN KEY(idProducto)
    REFERENCES productos(id_producto) 
      ON DELETE CASCADE
      ON UPDATE CASCADE   
);



CREATE TABLE Categorias (
  idCategorias INTEGER(20) UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Administrador_Global_id_Admin INTEGER(20) UNSIGNED  NOT NULL  ,
  Nombre VARCHAR(20)  NULL  ,
  descripcion VARCHAR(100)  NULL    ,
PRIMARY KEY(idCategorias)  ,
INDEX Categorias_FKIndex1(Administrador_Global_id_Admin),
  FOREIGN KEY(Administrador_Global_id_Admin)
    REFERENCES Administrador_Global(id_Admin)
      ON DELETE CASCADE
      ON UPDATE CASCADE);



CREATE TABLE Productos (
  id_producto INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Categorias_idCategorias INTEGER(20) UNSIGNED  NOT NULL  ,
  Administrador_Global_id_Admin INTEGER(20) UNSIGNED  NOT NULL  ,
  nombre VARCHAR(100)  NOT NULL  ,
  precio FLOAT  NOT NULL  ,
  descripcion VARCHAR(200)  NOT NULL  ,
  cantidad_stock INTEGER UNSIGNED  NULL    ,
PRIMARY KEY(id_producto)  ,
INDEX Producto_FKIndex2(Administrador_Global_id_Admin)  ,
INDEX Productos_FKIndex3(Categorias_idCategorias),
  FOREIGN KEY(Administrador_Global_id_Admin)
    REFERENCES Administrador_Global(id_Admin)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(Categorias_idCategorias)
    REFERENCES Categorias(idCategorias)
      ON DELETE CASCADE
      ON UPDATE CASCADE);



CREATE TABLE Comentarios (
  id_comentario INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Administrador_Global_id_Admin INTEGER(20) UNSIGNED  NOT NULL  ,
  Productos_id_producto INTEGER UNSIGNED  NOT NULL  ,
  contenido TEXT  NOT NULL    ,
PRIMARY KEY(id_comentario)  ,
INDEX Comentarios_FKIndex1(Productos_id_producto)  ,
INDEX Comentarios_FKIndex2(Administrador_Global_id_Admin),
  FOREIGN KEY(Productos_id_producto)
    REFERENCES Productos(id_producto)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(Administrador_Global_id_Admin)
    REFERENCES Administrador_Global(id_Admin)
      ON DELETE CASCADE
      ON UPDATE CASCADE);



CREATE TABLE Compras (
  Usuarios_nid INTEGER(20) UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Productos_id_producto INTEGER UNSIGNED  NOT NULL  ,
  idDireccion INTEGER(20) UNSIGNED  NOT NULL  ,
  id_compra INTEGER(20) UNSIGNED  NOT NULL  ,
  precio FLOAT  NOT NULL  ,
  fecha DATE  NOT NULL  ,
  cantidad_producto INTEGER(20) UNSIGNED  NOT NULL  ,
  estado_compra VARCHAR(50) BINARY  NOT NULL  ,
PRIMARY KEY(Usuarios_nid, Productos_id_producto)  ,
INDEX Usuario_has_Producto_FKIndex1(Usuarios_nid)  ,
INDEX Usuario_has_Producto_FKIndex2(Productos_id_producto)  ,
INDEX Compras_FKIndex3(idDireccion),
  FOREIGN KEY(Usuarios_nid)
    REFERENCES Usuarios(nid)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(Productos_id_producto)
    REFERENCES Productos(id_producto)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(idDireccion)
    REFERENCES direccion(idDireccion);
      ON DELETE CASCADE
      ON UPDATE CASCADE);



CREATE TABLE Promociones (
  idPromociones INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Productos_id_producto INTEGER UNSIGNED  NOT NULL  ,
  descuento INTEGER UNSIGNED  NOT NULL  ,
  precio_final FLOAT  NOT NULL  ,
  inicio DATE  NOT NULL  ,
  final DATE  NOT NULL    ,
PRIMARY KEY(idPromociones)  ,
INDEX Promociones_FKIndex1(Productos_id_producto),
  FOREIGN KEY(Productos_id_producto)
    REFERENCES Productos(id_producto)
      ON DELETE CASCADE
      ON UPDATE CASCADE);




