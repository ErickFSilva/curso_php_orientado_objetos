-- CRIANDO O BANCO DE DADOS db_celke:
create database if not exists db_celke;
use db_celke;


-- COMANDOS: Geral
show databases;
show tables;

desc biblioteca_livro;
desc biblioteca_genero;
desc biblioteca_grupo;
desc biblioteca_autor;
desc biblioteca_espirito;
desc biblioteca_editora;

drop table biblioteca_livro;
drop table biblioteca_genero;
drop table biblioteca_grupo;
drop table biblioteca_autor;
drop table biblioteca_espirito;
drop table biblioteca_editora;

delete from biblioteca_livro where cod_livro = 10002;


-- TABELA: biblioteca_livro
create table if not exists biblioteca_livro (
	id int primary key auto_increment,
	cod_livro varchar(5) not null,
    titulo varchar(64) not null,
    genero varchar(64) not null,
    grupo varchar(64) not null,
    paginas varchar(4),
    resumo text,
    data_inclusao datetime not null,
    data_update datetime,
    autor varchar(64) not null,
    espirito varchar(64) not null,
    editora varchar(64) not null,
    quantidade varchar(3) not null,
    capa varchar(256)
    -- constraint pk_livro primary key (id),
    -- constraint fk_livro_genero foreign key (cod_genero) references biblioteca_genero (cod_genero),
    -- constraint fk_livro_grupo foreign key (cod_grupo) references biblioteca_grupo (cod_grupo),
    -- constraint fk_livro_autor foreign key (cod_autor) references biblioteca_autor (cod_autor),
    -- constraint fk_livro_espirito foreign key (cod_espirito) references biblioteca_espirito (cod_espirito),
    -- constraint fk_livro_editora foreign key (cod_editora) references biblioteca_editora (cod_editora)
);


-- TABELA: biblioteca_genero
create table if not exists biblioteca_genero (
	cod_genero int not null,
    genero varchar(64) not null,
    constraint pk_genero primary key (cod_genero)
);


-- TABLELA: biblioteca_grupo
create table if not exists biblioteca_grupo (
	cod_grupo int not null,
    grupo varchar(64) not null,
    constraint pk_grupo primary key (cod_grupo)
);


-- TABELA: biblioteca_autor
create table if not exists biblioteca_autor (
	cod_autor int not null,
    autor varchar(64) not null,
    constraint pk_autor primary key (cod_autor)
);


-- TABELA: biblioteca_espirito
create table if not exists biblioteca_espirito (
	cod_espirito int not null,
    espirito varchar(64) not null,
    constraint pk_espirito primary key (cod_espirito)
);


-- TABELA: biblioteca_editora
create table if not exists biblioteca_editora (
	cod_editora int not null,
    editora varchar(64) not null,
    constraint pk_editora primary key (cod_editora)
);


-- INSERT:
insert into biblioteca_livro (cod_livro, titulo, genero, grupo, paginas, resumo, data_inclusao, autor, espirito, editora, quantidade, capa) values ('10001', 'O Livro dos Esp??ritos', 'Espiritismo', 'Codifica????o Esp??rita', '529', 'PRINC??PIOS DA DOUTRINA ESP??RITA: SOBRE A IMORTALIDADE DA ALMA, A NATUREZA DOS ESP??RITOS E SUAS COM OS HOMENS, AS LEIS MORAIS, A VIDA PRESENTE, A VIDA FUTURA E O PORVIR DA HUMANIDADE ??? SEGUNDO OS ENSINOS DADOS POR ESP??RITOS SUPERIORES COM O CONCURSO DE DIVERSOS M??DIUNS ??? RECEBIDOS E COORDENADOS.', now(), 'Allan Kardec', 'Obra pessoal', 'FEB', '5', 'imagens/capa_o-livro-dos-espiritos.jpg');

insert into biblioteca_livro values (null, '10002', 'O evangelho segundo o espiritismo', 'Espiritismo', 'Codifica????o Esp??rita', '529', 'O evangelho segundo o espiritismo.', now(), 'Allan Kardec', 'Obra pessoal', 'FEB', '8', 'imagens/capa_o-evangelho-segundo-o-espiritismo.jpg');

insert into biblioteca_genero values (101, 'Espiritismo');
insert into biblioteca_genero value (102, 'Espiritualista');

insert into biblioteca_grupo values (101, 'Codifica????o Esp??rita');
insert into biblioteca_grupo values (102, 'S??rie Andr?? Luiz');

insert into biblioteca_autor values (101, 'Allan Kardec');
insert into biblioteca_autor values (102, 'Chico Xavier');

insert into biblioteca_espirito values (101, 'Obra pessoal');
insert into biblioteca_espirito values (102, 'Andr?? Luiz');

insert into biblioteca_editora values (101, 'FEB');


-- SELECT
select * from biblioteca_livro;
select cod_livro from biblioteca_livro;

select * from biblioteca_genero;
select cod_genero, genero from biblioteca_genero;

select * from biblioteca_grupo;
select cod_grupo, grupo from biblioteca_grupo;

select * from biblioteca_autor;
select cod_autor, autor from biblioteca_autor;

select * from biblioteca_espirito;
select cod_espirito, espirito from biblioteca_espirito;

select * from biblioteca_editora;
select cod_editora, editora from biblioteca_editora;

select id,
	   cod_livro, 
       titulo, 
       genero, 
       grupo,
       paginas, 
       resumo,
       data_inclusao,
       data_update,
       autor,
       espirito,
       editora,
       quantidade,
       capa
from biblioteca_livro
-- inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
-- inner join biblioteca_grupo as bgp on (bl.cod_grupo = bgp.cod_grupo)
-- inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
-- inner join biblioteca_espirito as besp on (bl.cod_autor = besp.cod_espirito)
-- inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
order by grupo;


-- UPDATE
update biblioteca_livro
set cod_livro = '10001',
    titulo = 'O Evangelho Segundo o Espiritismo',
    genero = 'Espiritismo',
    grupo = 'Codifica????o Esp??rita',
    paginas = '417',
    resumo = 'O Evangelho Segundo o Espiritismo',
    autor = 'Allan Kardec',
    espirito = 'Obra pessoal',
    editora = 'FEB',
    data_update = now(),
    quantidade = '1',
    capa = 'imagens/capa_o-evangelho-segundo-o-espiritismo.jpg'
where cod_livro = '10001';
