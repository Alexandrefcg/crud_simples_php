# crud_simples_php
Um exemplo funcional de crud utilizando PHP + MYSQL + JS

Inicie o seu servidor HTTP (LAMP, XAMP ou WAMP...)

1. Certifique-se de que o servidor apache está rodando, assim como o Mysql database.
1. Acesse seu phpMyAdmin.
1. Crie um script para criação da estrutura e inserção de dados conforme os passos abaixo.

# Banco de dados
Crie uma base de dados chamada 'crud'

```sql
CREATE DATABASE crud; 
```
Depois crie a estrutura da tabela de cliente:

```sql
CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(150) NOT NULL,
  `cli_sobrenome` varchar(150) NOT NULL,
  `cli_email` varchar(150) NOT NULL,
  `cli_contato` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
```

Depois adicione alguns registros para que a tela já inicie funcionando com os exemplos:
```sql
INSERT INTO crud.cliente (cli_nome,cli_sobrenome,cli_email,cli_contato,image) VALUES 
('Alexandre','De Freitas Campos Gonçalves','alexandre_fgcampos@hotmail.com','999999999','1349938744.jpeg')
,('Johnny','Cage','johnny@cage.com.br','(48) 9999-9999','974783611.png')
,('Hanzo','Hasashi','scorpion@scorpion.com.br','(99) 9999-9999','1445079170.png')
,('Kuai ','Liang','subzero@subzero.com.br','(48) 3346-8990','555455867.png');
```
Após seguir estes passos, basta iniciar a sua aplicação no browser com localhost/crud_simples_php.

