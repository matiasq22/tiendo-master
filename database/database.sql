CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE users(
id              int(255) auto_increment not null,
name          varchar(100) not null,
lastname       varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
profile             varchar(20),
image         varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)  
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, 'Admin', 'Admin', 'admin@admin.com', '123', 'admin', null);

CREATE TABLE categories(
id              int(255) auto_increment not null,
name          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id) 
)ENGINE=InnoDb;

INSERT INTO categories VALUES(null, 'Manga corta');
INSERT INTO categories VALUES(null, 'Tirantes');
INSERT INTO categories VALUES(null, 'Manga larga');
INSERT INTO categories VALUES(null, 'Sudaderas');

CREATE TABLE products(
id              int(255) auto_increment not null,
categorie_id    int(255) not null,
name          varchar(100) not null,
description     text,
price          float(100,2) not null,
stock           int(255) not null,
offer          varchar(2),
created_at           date not null,
image          varchar(255),
CONSTRAINT pk_categories PRIMARY KEY(id),
CONSTRAINT fk_product_categorie FOREIGN KEY(categorie_id) REFERENCES categories(id)
)ENGINE=InnoDb;


CREATE TABLE order_headers(
id              int(255) auto_increment not null,
user_id      int(255) not null,
provincia       varchar(100) not null,
localidad       varchar(100) not null,
address       varchar(255) not null,
price           float(200,2) not null,
status          varchar(20) not null,
created_at           datetime,
CONSTRAINT pk_order_headers PRIMARY KEY(id),
CONSTRAINT fk_order_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE order_details(
id              int(255) auto_increment not null,
header_id       int(255) not null,
product_id     int(255) not null,
unidades        int(255) not null,
CONSTRAINT pk_order_details PRIMARY KEY(id),
CONSTRAINT fk_order_details FOREIGN KEY(header_id) REFERENCES order_headers(id),
CONSTRAINT fk_products_order_details FOREIGN KEY(product_id) REFERENCES products(id)
)ENGINE=InnoDb;




