CREATE DATABASE IF NOT EXISTS laravel_master;
USE laravel_master;

CREATE TABLE IF NOT EXISTS Users (

id int(255) auto_increment not null,
role varchar(20),
name   varchar(100),
surname varchar(200),
nick varchar(100),
email varchar (255),
password varchar (255),
image varchar (255),
create_at datetime,
update_at datetime,
remember_token varchar (255),
CONSTRAINT pk_users PRIMARY KEY (id)

) ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS Images(
id int(255) auto_increment not null,
user_id int(255),
image_path varchar(255),
description text,
create_at datetime,
update_at datetime,
CONSTRAINT pk_images PRIMARY KEY (id),
CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES Users(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS Comments (
id int(255) auto_increment not null,
user_id int(255),
image_id int(255),
content text,
create_at datetime,
update_at datetime,
CONSTRAINT pk_comments PRIMARY KEY(id),
CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES Users(id),
CONSTRAINT fk_comments_images FOREIGN KEY (image_id) REFERENCES Images(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS Likes (
id int(255) auto_increment not null,
user_id int(255),
image_id int(255),
create_at datetime,
update_at datetime,
CONSTRAINT pk_likes PRIMARY KEY(id),
CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES Users(id),
CONSTRAINT fk_likes_images FOREIGN KEY (image_id) REFERENCES Images(id)
)ENGINE=InnoDb;

