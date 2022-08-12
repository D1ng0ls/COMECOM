create database cuprom;

use cuprom;

create table pessoa (
	id_pessoa int not null auto_increment,
    tipo varchar(10) not null,
    nome varchar(100) not null,
    email varchar(100) not null,
    senha varchar(20) not null,
	endereco varchar(100) not null,
	telefone varchar(30) not null,
    documento varchar(14) not null unique,
    qnt_lojas int,
    primary key (id_pessoa)
);

create table produto (
	id_produto int not null auto_increment,
    nome varchar(100),
    primary key (id_produto)
);

create table publicacao (
	id_publicacao int not null auto_increment,
    data_publicacao date not null,
    termino_promocao date,
    incio_promocao date,
    preco_desconto double,
    desconto double,
    preco_original double,
    preco_atual double,
    fk_pessoa_id_pessoa int,
    fk_produto_id_produto int,
	constraint fk_publicacao_pessoa
		foreign key (fk_pessoa_id_pessoa) 
        references pessoa (id_pessoa)
        on delete cascade on update cascade,
	constraint 	fk_publicacao_produto 
		foreign key (fk_produto_id_produto)
        references produto (id_produto)
        on delete cascade on update cascade,
	primary key (id_publicacao)
);

create table categoria (
	id_categoria int not null auto_increment,
    nome varchar(100) not null,
    primary key (id_categoria)
);

create table produto_categoria (
	fk_categoria_id_categoria int,
    fk_produto_id_produto_categoria int,
	constraint fk_produto_categoria
		foreign key (fk_categoria_id_categoria) 
        references categoria (id_categoria)
        on delete cascade on update cascade,
	constraint 	fk_categoria_produto
		foreign key (fk_produto_id_produto_categoria)
        references produto (id_produto)
        on delete cascade on update cascade,
	primary key (fk_categoria_id_categoria, fk_produto_id_produto_categoria)
);
