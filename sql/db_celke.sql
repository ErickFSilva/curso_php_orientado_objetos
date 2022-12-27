-- CRIANDO O BANCO DE DADOS db_celke:
create database if not exists db_celke;
use db_celke;


-- COMANDOS ADMINISTRATIVOS:
show databases;
show tables;

desc users;

drop table extra_02_clientes;
drop table extra_02_clientes_pf;
drop table extra_02_clientes_pj;
drop table artigos;
drop table cad_despesas;

delete from users where id = 7;
delete from boletim_alunos where id = 8;
delete from notas_alunos where id_boletim = 8;


-- CRIANDO TABELA: usuarios
create table if not exists usuarios (
	id int primary key auto_increment,
    nome varchar(220),
    email varchar(220)
);

insert into usuarios values(null, 'Erick', 'erick@php.br');
insert into usuarios values(null, 'Gabriel', 'gabriel@php.br');
insert into usuarios values(null, 'Raquezia', 'raquezia@php.br');
insert into usuarios values(null, 'Gabriely', 'gabriely@php.br');
insert into usuarios values(null, 'Fulano', 'fulano@php.br');
insert into usuarios values(null, 'Beltrano', 'beltrano@php.br');


-- CRIANDO A TABELA: users
create table if not exists users (
	id int primary key auto_increment,
    name varchar(220),
    email varchar(220)
);

ALTER TABLE `users` 
ADD `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `email`, 
ADD `modified` DATETIME NULL AFTER `created`;

insert into users values(null, 'Erick', 'erick@php.br', now(), null);
insert into users values(null, 'Gabriel', 'gabriel@php.br', now(), null);
insert into users values(null, 'Raquezia', 'raquezia@php.br', now(), null);
insert into users values(null, 'Gabriely', 'gabriely@php.br', now(), null);


-- CRIANDO TABELA: extra_02_clientes
create table if not exists extra_02_clientes (
	id int primary key auto_increment,
    email varchar(64) not null,
    endereco varchar(64)
);

insert into extra_02_clientes values(null, 'erick@php.br', 'Rua Sebastião Paes de Melo');
insert into extra_02_clientes values(null, 'raquezia@php.br', 'Rua Sebastião Paes de Melo');
insert into extra_02_clientes values(null, 'manutencao@beneditoeallana.com.br', 'Rua Vinte e Sete-A');
insert into extra_02_clientes values(null, 'juridico@joanaetatianeconstrucoesltda.com.br', 'Rua Projetada 3');
insert into extra_02_clientes values(null, 'sistema@joaoelorenaferragensme.com.br', 'Rua Dois Irmãos');
insert into extra_02_clientes values(null, 'representante@fernandaefelipejoalheria.com.br', 'Rua Raimundo Gomes');
insert into extra_02_clientes values(null, 'gabriel@php.br', 'Rua Sebastião Paes de Melo');
insert into extra_02_clientes values(null, '', 'Rua Sebastião Paes de Melo');


-- CRIANDO TABELA: extra_02_clientes_pf
create table if not exists extra_02_clientes_pf (
	id int primary key auto_increment,
    nome varchar(64) not null,
    cpf char(11),
    id_cliente int not null,
    foreign key(id_cliente) references extra_02_clientes(id)
);

insert into extra_02_clientes_pf values(null, 'Erick Ferreira', '12345678901', 1);
insert into extra_02_clientes_pf values(null, 'Raquézia Ferreira', '23456789012', 2);
insert into extra_02_clientes_pf values(null, 'Gabriel Ferreira', '', 7);
insert into extra_02_clientes_pf values(null, 'Gabriely Ferreira', '45678901234', 8);


-- CRIANDO TABELA: extra_02_clientes_pj
create table if not exists extra_02_clientes_pj (
	id int primary key auto_increment,
    nome_fantasia varchar(64),
    cnpf char(14),
    id_cliente int not null,
    foreign key (id_cliente) references extra_02_clientes(id)
);

insert into extra_02_clientes_pj values(null, 'Benedito e Allana Assessoria Jurídica ME', '64897250000159', 3);
insert into extra_02_clientes_pj values(null, 'Joana e Tatiane Construções Ltda', '80583223000168', 4);
insert into extra_02_clientes_pj values(null, 'Joao e Lorena Ferragens ME', '06562209000125', 5);
insert into extra_02_clientes_pj values(null, 'Fernanda e Felipe Joalheria ME', '55330211000184', 6);


-- CRIANDO TABELA: artigos
create table if not exists artigos (
	id int primary key auto_increment,
    titulo varchar(128) not null,
    texto mediumtext not null
);

insert into artigos values(null, 'Artigo I', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam suscipit, risus ac pretium tempor, metus tortor accumsan sapien, sed fringilla neque nunc a ex. Vestibulum sed tincidunt augue. Suspendisse interdum diam id sapien egestas, eget ultrices augue maximus. Nulla lobortis non elit eu sagittis. Quisque mollis volutpat euismod. Vivamus ac sapien purus. Phasellus porta neque tempus ante lobortis, at tincidunt ligula blandit.');
insert into artigos values(null, 'Artigo II', 'Fusce commodo aliquam tortor non vulputate. Morbi dignissim, nisi sed dignissim feugiat, felis ex ultricies massa, quis mattis ipsum mi eget eros. Mauris sed ante mi. Vestibulum eleifend felis leo, id ultrices odio egestas nec. Integer tellus sem, scelerisque congue ex ut, gravida vulputate urna. Curabitur in nulla tellus. Vivamus eget leo urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut ac faucibus elit. Phasellus faucibus est in urna condimentum mollis. Donec iaculis nulla eu felis tincidunt tincidunt. Donec laoreet semper est sit amet ornare.');
insert into artigos values(null, 'Artigo III', 'Aliquam malesuada, dui sit amet ultrices varius, magna sem vestibulum sem, in pellentesque diam diam sit amet turpis. Duis eleifend condimentum ipsum gravida volutpat. Cras elit lectus, eleifend in placerat sit amet, porttitor id augue. Sed fringilla, eros a dapibus commodo, augue metus semper augue, eu sagittis dui lacus nec velit. Nunc vitae dictum urna. Morbi vel justo quis sapien commodo rutrum. Nullam aliquam id leo a sagittis. Pellentesque sed sapien ipsum. Morbi imperdiet tortor sem, eu lobortis mi mattis et. Donec a lobortis nulla. Aenean ultrices, lectus vel sagittis convallis, mi risus ultrices diam, et interdum erat nisi viverra nisi. Suspendisse rhoncus erat augue, a pharetra lacus auctor sit amet. Quisque euismod, nisl eu finibus ultricies, lectus nisi imperdiet diam, in laoreet massa augue nec ipsum.');


-- CRIANDO TABELA: cad_despesas
create table if not exists cad_despesas (
	id int primary key auto_increment,
    tipo varchar(32) not null,
    descricao varchar(256) not null,
    valor float(6,2) not null,
    _data date not null
);

insert into cad_despesas values(null, 'dia_a_dia', 'Água', 2.50, now());


-- CRIANDO TABELA: boletim_alunos e notas_alunos
create table if not exists boletim_alunos (
	id int primary key auto_increment,
    codigo int not null,
    aluno varchar(128) not null,
    situacao int default 2
);

insert into boletim_alunos (codigo, aluno) value (100, 'Default');

create table if not exists notas_alunos (
	id int primary key auto_increment,
    materia varchar(16) not null,
    nota1 decimal(3,1),
    nota2 decimal(3,1),
    media decimal(3,1),
    id_boletim int not null,
    foreign key(id_boletim) references boletim_alunos (id)
);

insert into notas_alunos (materia, id_boletim) value ('Default', 1);
insert into notas_alunos (materia, id_boletim) value ('mysql', 8);


-- SELECTS
select * from usuarios;

select * from users;

select * from extra_02_clientes;

select * from extra_02_clientes_pf;

select * from extra_02_clientes_pj;

select id, titulo, texto from artigos order by id desc;

select * from cad_despesas order by id desc;

select ba.id, ba.codigo, ba.aluno, na.materia, na.nota1, na.nota2, na.media, ba.situacao
from boletim_alunos ba
left join notas_alunos na on (ba.id = na.id_boletim);

select id from boletim_alunos;

select codigo from boletim_alunos;

select ba.id, ba.codigo, ba.aluno, na.materia, na.nota1, na.nota2, na.media, ba.situacao
from boletim_alunos ba
left join notas_alunos na on (ba.id = na.id_boletim)
where ba.id = 8 and na.materia = 'php' limit 1;

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
