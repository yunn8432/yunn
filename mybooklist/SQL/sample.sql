drop database if exists book;
create database book default character set utf8 collate utf8_general_ci;
drop user if exists 'user'@'localhost';
create user 'user'@'localhost'identified by 'password';
grant all on book.*to 'user'@'localhost';
use book;

create table list (
    id int auto_increment primary key,
    title varchar(50) not null,
    writer varchar(50) not null,
    impression varchar(1000) not null
);
