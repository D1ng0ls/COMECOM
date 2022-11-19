create database comecom;

use comecom;

create table pessoa (
	id_pessoa int not null auto_increment,
    data_criacao datetime not null default current_timestamp,
    tipo_pessoa varchar(10) not null,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(20) not null,
	cidade varchar(100) not null,
	telefone varchar(30) not null,
    documento varchar(14) not null unique,
    qnt_lojas int,
    ativo tinyint not null default '1',
    adm tinyint not null default '0',
    foto_nome_pessoa varchar(1000),
    primary key (id_pessoa)
);

create table publicacao (
	id_publicacao int not null auto_increment,
    id_pessoa int,
    key fk_publicacao_pessoa_idx (id_pessoa),
	constraint fk_publicacao_pessoa 
        foreign key (id_pessoa) 
        references pessoa (id_pessoa),
    data_publicacao datetime not null default current_timestamp,
    titulo varchar (255) not null,
    texto text not null,
    foto_nome_publi varchar(1000) null,
    primary key (id_publicacao)
);

create table oferta (
	id_oferta int not null auto_increment,
    id_pessoa int,
    key fk_oferta_pessoa_idx (id_pessoa),
	constraint fk_oferta_pessoa 
        foreign key (id_pessoa) 
        references pessoa (id_pessoa),
    data_oferta datetime not null default current_timestamp,
    titulo varchar (255) not null,
    texto text not null,
    inicio_oferta date,
    termino_oferta date,
	preco_original double null,
    desconto double null,
    preco_atual double null,
    foto_nome_oferta varchar(1000) null,
    primary key (id_oferta),
	categoria varchar(20) null,
    marca varchar(20) null
);

SELECT * FROM pessoa;
SELECT * FROM oferta;
SELECT * FROM publicacao;