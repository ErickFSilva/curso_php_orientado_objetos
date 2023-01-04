-- CRIANDO O BANCO DE DADOS db_celke:
create database if not exists db_celke;
use db_celke;


-- COMANDOS: Geral
show databases;
show tables;

desc biblioteca_livro;


-- CRIANDO TABELA: usuarios
create table if not exists usuarios (
	id int primary key auto_increment,
    nome varchar(220),
    email varchar(220)
);


-- CRIANDO A TABELA: users
create table if not exists users (
	id int primary key auto_increment,
    name varchar(220),
    email varchar(220),
    created datetime not null default current_timestamp,
    modified datetime
);


-- CRIANDO TABELA: extra_02_clientes
create table if not exists extra_02_clientes (
	id int primary key auto_increment,
    email varchar(64) not null,
    endereco varchar(64)
);


-- CRIANDO TABELA: extra_02_clientes_pf
create table if not exists extra_02_clientes_pf (
	id int primary key auto_increment,
    nome varchar(64) not null,
    cpf char(11),
    id_cliente int not null,
    foreign key(id_cliente) references extra_02_clientes(id)
);


-- CRIANDO TABELA: extra_02_clientes_pj
create table if not exists extra_02_clientes_pj (
	id int primary key auto_increment,
    nome_fantasia varchar(64),
    cnpf char(14),
    id_cliente int not null,
    foreign key (id_cliente) references extra_02_clientes(id)
);


-- CRIANDO TABELA: artigos
create table if not exists artigos (
	id int primary key auto_increment,
    titulo varchar(128) not null,
    texto mediumtext not null
);


-- CRIANDO TABELA: receitas
create table if not exists receita (
	id int primary key auto_increment,
    tipo varchar(32) not null,
    descricao varchar(256) not null,
    valor decimal(6,2) not null,
    _data date not null
);


-- CRIANDO TABELA: despesas
create table if not exists despesa (
	id int primary key auto_increment,
    tipo varchar(32) not null,
    descricao varchar(256) not null,
    valor decimal(6,2) not null,
    _data date not null
);


-- CRIANDO TABELA: boletim_alunos e notas_alunos
create table if not exists boletim_alunos (
	id int primary key auto_increment,
    codigo int not null,
    aluno varchar(128) not null,
    situacao int default 2
);


create table if not exists notas_alunos (
	id int primary key auto_increment,
    materia varchar(16) not null,
    nota1 decimal(3,1),
    nota2 decimal(3,1),
    media decimal(3,1),
    id_boletim int not null,
    foreign key(id_boletim) references boletim_alunos (id)
);


-- CRIANDO TABELA: biblioteca_livro
create table if not exists biblioteca_livro (
	id int primary key auto_increment,
    cod_livro char(5) not null,
    titulo varchar(64) not null,
    id_genero int, foreign key (id_genero) references biblioteca_genero (id),
    paginas varchar(4),
    resumo text,
    capa text,
    id_autor int, foreign key (id_autor) references biblioteca_autor (id),
    id_editora int, foreign key (id_editora) references biblioteca_editora (id)
);

insert into biblioteca_livro value (null, '10001', 'O LIVRO DOS ESPÍRITOS', '', '596', 'PRINCÍPIOS DA DOUTRINA ESPÍRITA: SOBRE A IMORTALIDADE DA ALMA, A NATUREZA DOS ESPÍRITOS E SUAS COM OS HOMENS, AS LEIS MORAIS, A VIDA PRESENTE, A VIDA FUTURA E O PORVIR DA HUMANIDADE — SEGUNDO OS ENSINOS DADOS POR ESPÍRITOS SUPERIORES COM O CONCURSO DE DIVERSOS MÉDIUNS — RECEBIDOS E COORDENADOS.', 'imagens/capa_o-livro-dos-espiritos.jpg', null);

-- CRIANDO TABELA: biblioteca_genero
create table if not exists biblioteca_genero (
	id int primary key auto_increment,
    genero varchar(64) not null
);

-- CRIANDO TABELA: biblioteca_autor
create table if not exists biblioteca_autor (
	id int primary key auto_increment,
    autor varchar(64) not null,
    espirito varchar(64),
    id_editora int, foreign key (id_editora) references biblioteca_editora (id)
);

insert into biblioteca_autor value (null, 'Allan Kardec', 'Diversos', 1);

-- CRIANDO TABELA: biblioteca_editora
create table if not exists biblioteca_editora (
	id int primary key auto_increment,
    editora varchar(64) not null,
    cnpj char(14)
);

insert into biblioteca_editora value (null, 'FEB', '12345678901234');
insert into biblioteca_editora value (null, 'FEB', '56789123456789');
insert into biblioteca_editora value (null, 'FEB', '01234567890123');


-- SELECT
select id, titulo, paginas, resumo, capa, capa_img from biblioteca_livro;
select id, autor, id_livro from biblioteca_autor;
select id, editora, id_livro from biblioteca_editora;

select bl.id, bl.cod_livro, bl.titulo, bl.paginas, bl.resumo, bl.capa, bl.capa_img, ba.autor, be.editora 
from biblioteca_livro as bl
inner join biblioteca_autor as ba on (bl.id = ba.id_livro)
inner join biblioteca_editora as be on (bl.id = be.id_livro);


-- UPDATE
update boletim_alunos as ba 
inner join notas_alunos as na 
on (ba.id = na.id_boletim) 
set ba.aluno = 'Erick', 
    ba.situacao = 1, 
    na.materia = 'php', 
    na.nota1 = 10,
    na.nota2 = 10,
    na.media = 10
where ba.id = 3;
