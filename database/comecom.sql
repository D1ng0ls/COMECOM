create database comecom;

use comecom;

create table pessoa (
	id_pessoa int not null auto_increment,
    tipo_pessoa varchar(10) not null,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    data_criacao datetime not null default current_timestamp,
    senha varchar(20) not null,
	cidade varchar(100) not null,
	telefone varchar(30) not null,
    documento varchar(14) not null unique,
    qnt_lojas int,
    ativo tinyint not null default '1',
    adm tinyint not null default '0',
    foto_blob_pessoa blob,
    foto_nome_pessoa varchar(100),
    primary key (id_pessoa)
);

create table produto (
	id_produto int not null auto_increment,
    nome varchar(100),
    foto_blob_prod blob,
    foto_nome_prod varchar(100),
    primary key (id_produto)
);

create table publicacao (
	id_publicacao int not null auto_increment,
    titulo varchar (255) not null,
    texto text not null,
    data_publicacao datetime not null default current_timestamp,
    id_pessoa int,
    key fk_publicacao_pessoa_idx (id_pessoa),
	constraint fk_publicacao_pessoa 
        foreign key (id_pessoa) 
        references pessoa (id_pessoa),
	desconto double null,
    termino_promocao date null,
    incio_promocao date null,
    preco_desconto double null,
    preco_original double null,
    preco_atual double null,
    foto_blob_publi blob null,
    foto_nome_publi varchar(1000) null,
    primary key (id_publicacao),
	fk_produto_id_produto int null,
	constraint 	fk_publicacao_produto 
		foreign key (fk_produto_id_produto)
        references produto (id_produto)
        on delete cascade on update cascade
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

select * from pessoa;
select * from publicacao;