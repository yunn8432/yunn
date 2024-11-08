drop database if exists book;
create database book default character set utf8 collate utf8_general_ci;
drop user if exists 'book'@'localhost';
create user 'book'@'localhost' identified by 'password';
grant all on book.* to 'book'@'localhost';
use book;

create table list(
    list_id int auto_increment primary key ,
    title varchar(50) not null,
    writer varchar(50) not null,
    impression varchar(1000) not null
);

create table kana(
    kana_id int primary key,
    kana varchar(100) not null,
    foreign key(kana_id) references list(list_id)
);