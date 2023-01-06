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
desc biblioteca_editora;

drop table biblioteca_livro;
drop table biblioteca_genero;
drop table biblioteca_grupo;
drop table biblioteca_autor;
drop table biblioteca_editora;


-- TABELA: biblioteca_livro
create table if not exists biblioteca_livro (
	cod_livro int not null,
    titulo varchar(64) not null,
    cod_genero int not null,
    cod_grupo int not null,
    paginas varchar(4),
    resumo text,
    capa text,
    data_inclusao datetime not null default current_timestamp,
    cod_autor int not null,
    cod_editora int not null,
    quantidade varchar(3) not null,
    constraint pk_livro primary key (cod_livro),
    constraint fk_livro_genero foreign key (cod_genero) references biblioteca_genero (cod_genero),
    constraint fk_livro_grupo foreign key (cod_grupo) references biblioteca_grupo (cod_grupo),
    constraint fk_livro_autor foreign key (cod_autor) references biblioteca_autor (cod_autor),
    constraint fk_livro_editora foreign key (cod_editora) references biblioteca_editora (cod_editora)
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
    espirito varchar(64),
    cod_editora int not null,
    constraint pk_autor primary key (cod_autor),
    constraint fk_autor_editora foreign key (cod_editora) references biblioteca_editora (cod_editora)
);


-- TABELA: biblioteca_editora
create table if not exists biblioteca_editora (
	cod_editora int not null,
    editora varchar(64) not null,
    constraint pk_editora primary key (cod_editora)
);


-- INSERT:
insert into biblioteca_livro value (10001, 'O Livro dos Espíritos', 101, 101, '529', 'PRINCÍPIOS DA DOUTRINA ESPÍRITA: SOBRE A IMORTALIDADE DA ALMA, A NATUREZA DOS ESPÍRITOS E SUAS COM OS HOMENS, AS LEIS MORAIS, A VIDA PRESENTE, A VIDA FUTURA E O PORVIR DA HUMANIDADE — SEGUNDO OS ENSINOS DADOS POR ESPÍRITOS SUPERIORES COM O CONCURSO DE DIVERSOS MÉDIUNS — RECEBIDOS E COORDENADOS.', 'imagens/capa_o-livro-dos-espiritos.jpg', now(), 101, 101, '5');
insert into biblioteca_livro value (10002, 'O Evangelho Segundo o Espiritismo', 101, 101, '417', 'A EXPLICAÇÃO DAS MÁXIMAS MORAIS DO CRISTO EM CONCORDÂNCIA COM O ESPIRITISMO E SUAS APLICAÇÕES ÀS DIVERSAS CIRCUNSTÂNCIAS DA VIDA.', 'imagens/capa_o-evangelho-segundo-o-espiritismo.jpg',now() , 101, 101, '7');

insert into biblioteca_genero values (101, 'Espiritismo');
insert into biblioteca_genero values (102, 'Espiritualista');

insert into biblioteca_grupo value (101, 'Codificação Espírita');
insert into biblioteca_grupo value (102, 'Série André Luiz');

insert into biblioteca_autor value (101, 'Allan Kardec', 'Diversos', 101);

insert into biblioteca_editora value (101, 'FEB');


-- SELECT
select * from biblioteca_livro;
select cod_livro from biblioteca_livro;

select * from biblioteca_genero;
select genero from biblioteca_genero;

select * from biblioteca_grupo;
select grupo from biblioteca_grupo;

select * from biblioteca_autor;

select * from biblioteca_editora;

select bl.cod_livro, 
       bl.titulo, 
       bg.genero, 
       bgp.grupo,
       bl.paginas, 
       bl.resumo,
       bl.data_inclusao,
       ba.autor, 
       be.editora,
       bl.quantidade,
       bl.capa
from biblioteca_livro as bl
inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
inner join biblioteca_grupo as bgp on (bl.cod_grupo = bgp.cod_grupo)
inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
order by bgp.grupo;


-- UPDATE

