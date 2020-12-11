CREATE DATABASE IF NOT EXISTS laravel_instgramer;
USE laravel_instgramer;

CREATE TABLE IF NOT EXISTS users (
    id_user         int(255) auto_increment NOT NULL,
    rol             varchar(20),
    name            varchar(100),
    surname         varchar(200),
    nick            varchar(100),
    mail            varchar(255),
    pass            varchar(255),
    image           varchar(255),
    create_at       datetime,
    update_at       datetime,
    remember_token  varchar(255),
    CONSTRAINT pk_users PRIMARY KEY(id_user)  
) ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS images (
    id_image        int(255) auto_increment NOT NULL,
    user_id         int(255),
    image_path      varchar(255),
    description     text,
    create_at       datetime,
    update_at       datetime,
    CONSTRAINT pk_images PRIMARY KEY(id_image),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id_user)
) ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS comments (
    id_comment      int(255) auto_increment NOT NULL,
    user_id         int(255),
    image_id        int(255),
    content         text,
    create_at       datetime,
    update_at       datetime,
    CONSTRAINT pk_comments PRIMARY KEY(id_comment),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id_user),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id_image)
) ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS likes (
    id_like         int(255) auto_increment NOT NULL,
    user_id         int(255),
    image_id        int(255),
    create_at       datetime,
    update_at       datetime,
    CONSTRAINT pk_likes PRIMARY KEY(id_like),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id_user),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id_image)
) ENGINE=InnoDb;
