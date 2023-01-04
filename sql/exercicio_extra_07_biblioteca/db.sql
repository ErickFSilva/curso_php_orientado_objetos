-- CRIANDO O BANCO DE DADOS db_celke:
create database if not exists db_celke;
use db_celke;


-- COMANDOS: Geral
show databases;
show tables;

desc biblioteca_livro;
desc biblioteca_genero;
desc biblioteca_autor;
desc biblioteca_editora;

drop table biblioteca_livro;
drop table biblioteca_genero;
drop table biblioteca_autor;
drop table biblioteca_editora;


-- CRIANDO TABELA: biblioteca_livro
create table if not exists biblioteca_livro (
	cod_livro int not null,
    titulo varchar(64) not null,
    cod_genero int not null,
    paginas varchar(4),
    resumo text,
    capa text,
    cod_autor int not null,
    cod_editora int not null,
    constraint pk_livro primary key (cod_livro),
    constraint fk_livro_genero foreign key (cod_genero) references biblioteca_genero (cod_genero),
    constraint fk_livro_autor foreign key (cod_autor) references biblioteca_autor (cod_autor),
    constraint fk_livro_editora foreign key (cod_editora) references biblioteca_editora (cod_editora)
);

insert into biblioteca_livro value (10001, 'O Livro dos Espíritos', 101, '529', 'PRINCÍPIOS DA DOUTRINA ESPÍRITA: SOBRE A IMORTALIDADE DA ALMA, A NATUREZA DOS ESPÍRITOS E SUAS COM OS HOMENS, AS LEIS MORAIS, A VIDA PRESENTE, A VIDA FUTURA E O PORVIR DA HUMANIDADE — SEGUNDO OS ENSINOS DADOS POR ESPÍRITOS SUPERIORES COM O CONCURSO DE DIVERSOS MÉDIUNS — RECEBIDOS E COORDENADOS.', 'imagens/capa_o-livro-dos-espiritos.jpg', 1001, 1001);


-- CRIANDO TABELA: biblioteca_genero
create table if not exists biblioteca_genero (
	cod_genero int not null,
    genero varchar(64) not null,
    constraint pk_genero primary key (cod_genero)
);

insert into biblioteca_genero values (101, 'Espiritismo');


-- CRIANDO TABELA: biblioteca_autor
create table if not exists biblioteca_autor (
	cod_autor int not null,
    autor varchar(64) not null,
    espirito varchar(64),
    cod_editora int not null,
    constraint pk_autor primary key (cod_autor),
    constraint fk_autor_editora foreign key (cod_editora) references biblioteca_editora (cod_editora)
);

insert into biblioteca_autor value (1001, 'Allan Kardec', 'Diversos', 1001);


-- CRIANDO TABELA: biblioteca_editora
create table if not exists biblioteca_editora (
	cod_editora int not null,
    editora varchar(64) not null,
    constraint pk_editora primary key (cod_editora)
);

insert into biblioteca_editora value (1001, 'FEB');


-- SELECT
select * from biblioteca_livro;
select * from biblioteca_genero;
select * from biblioteca_autor;
select * from biblioteca_editora;

select bl.cod_livro, 
       bl.titulo, 
       bg.genero, 
       bl.paginas, 
       bl.resumo, 
       ba.autor, 
       be.editora,
       bl.capa
from biblioteca_livro as bl
inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
limit 1;


-- UPDATE

