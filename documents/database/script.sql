CREATE TABLE "cliente" (
  "id_cliente" serial NOT NULL,
  "nome_cliente" varchar(100),
  "cpf" varchar(11),
  "credito" decimal(7,2) DEFAULT 0,
  "debito" decimal(7,2) DEFAULT 0,
	"ativo" BOOLEAN DEFAULT true,
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_cliente")
);

CREATE TABLE "telefone" (
  "id_telefone" serial NOT NULL,
  "id_cliente" int,
  "num_telefone" varchar(25),
  "ddd" VARCHAR(5),
  "whatsapp" bool DEFAULT false,
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_telefone")
);

CREATE TABLE "endereco" (
  "id_endereco" serial NOT NULL,
  "id_cliente" int NOT NULL,
  "rua" varchar(100),
  "bairro" varchar(30),
  "cidade" varchar(30),
  "estado" char(2),
  "numero" varchar(5),
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),	
  PRIMARY KEY ("id_endereco")
);

CREATE TABLE "funcionario" (
  "id_funcionario" serial NOT NULL,
	"id_caixa" int,	
  "nome_funcionario" varchar(100),
	"cpf" varchar(11),
	"usuario" varchar(50),
  "telefone" varchar(30),
  "endereco" varchar(100),
  "cargo" varchar(20),
	"senha" varchar(255),
	"email" varchar(30),
  "salario" decimal(7,2) DEFAULT 0,
	"ativo" BOOLEAN DEFAULT true,
	"criado_em" TIMESTAMP DEFAULT CURRENT_DATE,
	"nivel_acesso" int DEFAULT 3,
  PRIMARY KEY ("id_funcionario")
);

CREATE TABLE "caixa" (
  "id_caixa" serial NOT NULL,
  "valor_em_caixa" decimal(7,2) DEFAULT 0,
	"status" BOOLEAN DEFAULT TRUE,
	numero_caixa VARCHAR(20),
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_caixa")
);


CREATE TABLE "forma_pagamento" (
  "id_forma_pagamento" serial NOT NULL,
  "tipo_pagamento" varchar(50),
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_forma_pagamento")
);

CREATE TABLE "fornecedor" (
  "id_fornecedor" serial NOT NULL,
  "nome_fornecedor" varchar(100),
  "telefone" varchar(30),
  "cidade" varchar(30),
  "estado" varchar(20),
	"ativo" boolean DEFAULT true,
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_fornecedor")
);

CREATE TABLE "categoria" (
  "id_categoria" serial NOT NULL,
  "nome_categoria" varchar(20),
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_categoria")
);

CREATE TABLE "produto" (
  "id_produto" serial NOT NULL,
  "id_categoria" int,
	"nome_produto" varchar(30),
	"icms" decimal(7,2) DEFAULT 0,
	"ipi" decimal(7,2) DEFAULT 0,
	"frete" decimal(7,2) DEFAULT 0,
	"acrescimo_despesas" decimal(7,2) DEFAULT 0,
	"preco_na_fabrica" decimal(7,2) DEFAULT 0,
  "preco_compra" decimal(7,2) DEFAULT 0,
	"preco_venda" decimal(7,2) DEFAULT 0,
	"lucro" decimal(7,2) DEFAULT 0,
	"desconto" decimal(5,2) DEFAULT 0,
  "quantidade" int DEFAULT 0,
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_produto")
);

CREATE TABLE "compra" (
  "id_compra" serial NOT NULL,
  "id_funcionario" int,
  "id_fornecedor" int,
  "valor_total" decimal(7,2) DEFAULT 0,
  "data_compra" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  "parcelas" int,
  PRIMARY KEY ("id_compra")
);

CREATE TABLE "item_compra" (
  "id_item_compra" serial NOT NULL,
  "id_produto" int,
  "id_compra" int,
	"ipi" decimal(5,2) DEFAULT 0,
	"frete" decimal(5,2) DEFAULT 0,
	"icms" decimal(5,2) DEFAULT 0,
	"preco_compra" decimal(7,2) DEFAULT 0,
  "quantidade" int,
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_item_compra")
);

CREATE TABLE "pagamento_compra" (
  "id_pagamento_compra" serial NOT NULL,
  "id_compra" int,
  "id_forma_de_pagamento" int,
  "parcelas" int,
  "prazo" varchar(20),
  "status" char(2),
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_pagamento_compra")
);

CREATE TABLE "venda" (
  "id_venda" serial NOT NULL,
  "id_caixa" int,
  "id_cliente" int,
  "num_parcelas" int,
  "valor_total" decimal(7,2) DEFAULT 0,
  "data_venda" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_venda")
);

CREATE TABLE "item_venda" (
  "id_item_venda" serial NOT NULL,
  "id_produto" int,
  "id_venda" int,
  "valor_unitario" decimal(7,2) DEFAULT 0,
  "quantidade" int,
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_item_venda")
);

CREATE TABLE "pagamento_venda" (
  "id_pagamento_venda" serial NOT NULL,
  "id_venda" int,
  "id_forma_pagamento" int,
  "numero_de_parcelas" int,
	"valor_a_pagar" decimal(7,2) DEFAULT 0,
	"valor_pago" decimal(7,2) DEFAULT 0,
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_pagamento_venda")
);

CREATE TABLE "parcelas" (
	"id_parcela" SERIAL NOT NULL,
	"id_pagamento_venda" int,
	"numero_da_parcela" int,
	"valor_parcela" decimal(7,2) DEFAULT 0,
	"data_vencimento" date DEFAULT CURRENT_DATE,
	"data_pagamento" date DEFAULT CURRENT_DATE,
	"status" char(2),
	PRIMARY KEY ("id_parcela")
);

CREATE TABLE "devolucao" (
  "id_devolucao" serial NOT NULL,
  "id_produto" int,
  "id_item_venda" int,
  "motivo_devolucao" varchar(255),
  "quantidade" int,
	"criado_em" TIMESTAMP DEFAULT  CURRENT_TIMESTAMP(0),
  PRIMARY KEY ("id_devolucao")
);

------------------------------------------------------------------------------
---- foreign keys

ALTER TABLE "funcionario" ADD FOREIGN KEY ("id_caixa") REFERENCES "caixa" ("id_caixa");
ALTER TABLE "compra" ADD FOREIGN KEY ("id_fornecedor") REFERENCES "fornecedor" ("id_fornecedor");
ALTER TABLE "compra" ADD FOREIGN KEY ("id_funcionario") REFERENCES "funcionario" ("id_funcionario");
ALTER TABLE "endereco" ADD FOREIGN KEY ("id_cliente") REFERENCES "cliente" ("id_cliente");
ALTER TABLE "item_compra" ADD FOREIGN KEY ("id_compra") REFERENCES "compra" ("id_compra");
ALTER TABLE "item_compra" ADD FOREIGN KEY ("id_produto") REFERENCES "produto" ("id_produto");
ALTER TABLE "devolucao" ADD FOREIGN KEY ("id_produto") REFERENCES "produto" ("id_produto");
ALTER TABLE "devolucao" ADD FOREIGN KEY ("id_item_venda") REFERENCES "item_venda" ("id_item_venda");
ALTER TABLE "item_venda" ADD FOREIGN KEY ("id_produto") REFERENCES "produto" ("id_produto");
ALTER TABLE "item_venda" ADD FOREIGN KEY ("id_venda") REFERENCES "venda" ("id_venda");
ALTER TABLE "pagamento_compra" ADD FOREIGN KEY ("id_forma_de_pagamento") REFERENCES "forma_pagamento" ("id_forma_pagamento");
ALTER TABLE "pagamento_compra" ADD FOREIGN KEY ("id_compra") REFERENCES "compra" ("id_compra");
ALTER TABLE "pagamento_venda" ADD FOREIGN KEY ("id_venda") REFERENCES "venda" ("id_venda");
ALTER TABLE "pagamento_venda" ADD FOREIGN KEY ("id_forma_pagamento") REFERENCES "forma_pagamento" ("id_forma_pagamento");
ALTER TABLE "produto" ADD FOREIGN KEY ("id_categoria") REFERENCES "categoria" ("id_categoria");
ALTER TABLE "telefone" ADD FOREIGN KEY ("id_cliente") REFERENCES "cliente" ("id_cliente");
ALTER TABLE "venda" ADD FOREIGN KEY ("id_cliente") REFERENCES "cliente" ("id_cliente");
ALTER TABLE "venda" ADD FOREIGN KEY ("id_caixa") REFERENCES "caixa" ("id_caixa");
ALTER TABLE "parcelas" ADD FOREIGN KEY ("id_pagamento_venda") REFERENCES "pagamento_venda" ("id_pagamento_venda");

------------------------------------------------------------------------------------------------------------------

alter table "venda" ADD COLUMN apagado BOOLEAN DEFAULT false;
alter table "venda" ADD COLUMN desvolvido BOOLEAN DEFAULT false;
alter table "produto" ADD COLUMN "ativo" BOOLEAN DEFAULT true;
alter table "categoria" ADD COLUMN  "ativo" BOOLEAN DEFAULT true;


------------------------------------------------------------------------------
-- funções para compra

-- função para atualizar o valor total da compra e a quantidade do produto
CREATE OR REPLACE FUNCTION SetCompra()
RETURNS TRIGGER AS $$

	-- lucro hipotetico de 40% encima de cada produto
	DECLARE var_acrescimo_despesas numeric(7,2) := (0.4);

	BEGIN
		
		UPDATE compra 
		SET valor_total = valor_total + (NEW.quantidade * (NEW.preco_compra + (NEW.preco_compra * (NEW.icms + NEW.ipi + NEW.frete))))
		WHERE id_compra = NEW.id_compra;

		UPDATE produto
		SET icms = NEW.icms,
				ipi = NEW.ipi,
				frete = NEW.frete,
				acrescimo_despesas = var_acrescimo_despesas,
				preco_compra = NEW.preco_compra + (NEW.preco_compra * (NEW.icms + NEW.ipi + NEW.frete)),
				preco_na_fabrica = NEW.preco_compra,
				preco_venda = NEW.preco_compra + (NEW.preco_compra * (NEW.icms + NEW.ipi + NEW.frete + var_acrescimo_despesas)),
				quantidade = quantidade + NEW.quantidade
		WHERE id_produto = NEW.id_produto;
	
		RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER SetCompra
AFTER INSERT ON item_compra
FOR EACH ROW
EXECUTE PROCEDURE SetCompra();


-- função para atualizar o valor total da compra e a quantidade do produto
CREATE OR REPLACE FUNCTION AttCompra()
RETURNS TRIGGER AS $$

	-- lucro hipotetico de 40% encima de cada produto
	DECLARE var_acrescimo_despesas numeric(7,2) := (0.4);
	DECLARE quant_estoque int4 := (SELECT pr.quantidade FROM produto AS pr WHERE pr.id_produto = NEW.id_produto);

	BEGIN
	
		UPDATE compra 
		SET valor_total = valor_total - (
			(OLD.quantidade * (OLD.preco_compra + (OLD.preco_compra * (OLD.icms + OLD.ipi + OLD.frete)))) -
			(NEW.quantidade * (NEW.preco_compra + (NEW.preco_compra * (NEW.icms + NEW.ipi + NEW.frete))))
		)
		WHERE id_compra = NEW.id_compra;

		UPDATE produto
		SET icms = icms - (OLD.icms - NEW.icms),
				ipi = ipi - (OLD.ipi - NEW.ipi),
				frete = frete - (OLD.frete - NEW.frete),
				preco_compra = preco_compra - (
					(OLD.preco_compra + (OLD.preco_compra * (OLD.icms + OLD.ipi + OLD.frete))) -
					(NEW.preco_compra + (NEW.preco_compra * (NEW.icms + NEW.ipi + NEW.frete)))
				),
				preco_na_fabrica = preco_na_fabrica - (OLD.preco_compra - NEW.preco_compra),
				preco_venda = preco_venda - (
					(OLD.preco_compra + (OLD.preco_compra * (OLD.icms + OLD.ipi + OLD.frete + var_acrescimo_despesas))) -
					(NEW.preco_compra + (NEW.preco_compra * (NEW.icms + NEW.ipi + NEW.frete + var_acrescimo_despesas)))
				),
				quantidade = quantidade - (OLD.quantidade - NEW.quantidade)
		WHERE id_produto = NEW.id_produto;
	
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER AttCompra
AFTER UPDATE ON item_compra
FOR EACH ROW
EXECUTE PROCEDURE AttCompra();


-- função para atualizar o valor total da compra e a quantidade do produto
CREATE OR REPLACE FUNCTION DelCompra()
RETURNS TRIGGER AS $$
	BEGIN
	
		UPDATE compra 
		SET valor_total = valor_total - (
			OLD.quantidade * (OLD.preco_compra + (OLD.preco_compra * (OLD.icms + OLD.ipi + OLD.frete)))
		)
		WHERE id_compra = OLD.id_compra;
		
		UPDATE produto SET quantidade = quantidade - OLD.quantidade WHERE id_produto = OLD.id_produto;
	
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER DelCompra
AFTER DELETE ON item_compra
FOR EACH ROW
EXECUTE PROCEDURE DelCompra();


------------------------------------------------------------------------------
---- funções para venda

CREATE OR REPLACE FUNCTION SetVenda()
RETURNS TRIGGER AS $$

	DECLARE quantidade_estoque int4 := (SELECT quantidade FROM produto WHERE id_produto = NEW.id_produto);
	DECLARE var_preco_compra decimal(7,2) := (SELECT preco_compra FROM produto WHERE id_produto = NEW.id_produto);

	BEGIN
		
		IF NEW.quantidade > quantidade_estoque THEN
			RAISE EXCEPTION 'A quantidade a ser vendida (%) é maior que a quantidade em estoque (%)', NEW.quantidade, quantidade_estoque;
		ELSE
			UPDATE venda SET valor_total = valor_total + (NEW.quantidade * NEW.valor_unitario) WHERE id_venda = NEW.id_venda;
			UPDATE produto 
			SET quantidade = quantidade - NEW.quantidade,
					lucro = lucro + ((NEW.valor_unitario - var_preco_compra) * NEW.quantidade)
			WHERE id_produto = NEW.id_produto;
		END IF;
		
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER SetVenda
AFTER INSERT ON item_venda
FOR EACH ROW
EXECUTE PROCEDURE SetVenda();


CREATE OR REPLACE FUNCTION AttVenda()
RETURNS TRIGGER AS $$
	
	DECLARE quantidade_estoque int4 := (SELECT quantidade FROM produto WHERE id_produto = NEW.id_produto);
	DECLARE var_preco_compra decimal(7,2) := (SELECT preco_compra FROM produto WHERE id_produto = NEW.id_produto);

	BEGIN
	
		IF (quantidade_estoque + (OLD.quantidade - NEW.quantidade)) < 0 THEN
			RAISE EXCEPTION 'A quantidade a ser vendida (%) é maior que a quantidade em estoque (%)', NEW.quantidade, quantidade_estoque;
		ELSE
			UPDATE venda SET valor_total = valor_total - ((OLD.quantidade * OLD.valor_unitario) - (NEW.quantidade * NEW.valor_unitario)) WHERE id_venda = OLD.id_venda;
			UPDATE produto
			SET quantidade = quantidade + (OLD.quantidade - NEW.quantidade),
					lucro = lucro - (
						((OLD.valor_unitario - var_preco_compra) * OLD.quantidade) -
						((NEW.valor_unitario - var_preco_compra) * NEW.quantidade)
					)
			WHERE id_produto = NEW.id_produto;
		END IF;
		
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER AttVenda
AFTER UPDATE ON item_venda
FOR EACH ROW
EXECUTE PROCEDURE AttVenda();


CREATE OR REPLACE FUNCTION DelVenda()
RETURNS TRIGGER AS $$

	DECLARE var_preco_compra decimal(7,2) := (SELECT preco_compra FROM produto WHERE id_produto = OLD.id_produto);
	
	BEGIN
	
		UPDATE venda SET valor_total = valor_total - (OLD.quantidade * OLD.valor_unitario) WHERE id_venda = OLD.id_venda;
		UPDATE produto
		SET quantidade = quantidade + OLD.quantidade,
				lucro = lucro - ((OLD.valor_unitario - var_preco_compra) * OLD.quantidade)
		WHERE id_produto = OLD.id_produto;
	
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER DelVenda
AFTER DELETE ON item_venda
FOR EACH ROW
EXECUTE PROCEDURE DelVenda();


------------------------------------------------------------------------------
-- funções para o caixa

-- função para atualizar o valor de caixa ao realizar uma venda
CREATE OR REPLACE FUNCTION SetValorEmCaixa()
RETURNS TRIGGER AS $$
	BEGIN
	
		UPDATE caixa SET valor_em_caixa = valor_em_caixa + NEW.valor_total WHERE id_caixa = NEW.id_caixa;
	
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER SetValorEmCaixa
AFTER INSERT ON venda
FOR EACH ROW
EXECUTE PROCEDURE SetValorEmCaixa();


-- função para atualizar o valor de caixa ao realizar uma venda
CREATE OR REPLACE FUNCTION AttValorEmCaixa()
RETURNS TRIGGER AS $$
	BEGIN
	
		UPDATE caixa SET valor_em_caixa = valor_em_caixa - (OLD.valor_total - NEW.valor_total) WHERE id_caixa = NEW.id_caixa;
	
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER AttValorEmCaixa
AFTER UPDATE ON venda
FOR EACH ROW
EXECUTE PROCEDURE AttValorEmCaixa();


-- função para atualizar o valor de caixa ao realizar uma venda
CREATE OR REPLACE FUNCTION DelValorEmCaixa()
RETURNS TRIGGER AS $$
	BEGIN
	
		UPDATE caixa SET valor_em_caixa = valor_em_caixa - OLD.valor_total WHERE id_caixa = OLD.id_caixa;
	
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER DelValorEmCaixa
AFTER DELETE ON venda
FOR EACH ROW
EXECUTE PROCEDURE DelValorEmCaixa();

------------------------------------------------------------------------------
---- funções para devolução

-- função para atualizar o valor de credito de um cliente e a quantidade do produto de uma venda ao realizar uma devolução
CREATE OR REPLACE FUNCTION SetDevolucao()
RETURNS TRIGGER AS $$

	DECLARE quantidade_vendida int4 := (SELECT quantidade FROM item_venda WHERE id_item_venda = NEW.id_item_venda);
	
	BEGIN
	
		IF NEW.quantidade > quantidade_vendida THEN
			RAISE EXCEPTION 'A quantidade a ser devolvida (%) é maior que a quantidade vendida (%)', NEW.quantidade, quantidade_vendida;
		ELSE
			
			UPDATE cliente SET credito = credito + (NEW.quantidade * (SELECT valor_unitario FROM item_venda WHERE id_item_venda = NEW.id_item_venda))
			WHERE id_cliente = (
				SELECT C.id_cliente FROM cliente AS C, venda AS V, item_venda AS IV
					WHERE C.id_cliente = V.id_cliente
					AND V.id_venda = IV.id_venda
					AND IV.id_item_venda = NEW.id_item_venda
			);
			
			UPDATE item_venda SET quantidade = quantidade - NEW.quantidade WHERE id_item_venda = NEW.id_item_venda;
			
		END IF;

	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER SetDevolucao
AFTER INSERT ON devolucao
FOR EACH ROW
EXECUTE PROCEDURE SetDevolucao();


-- função para atualizar o valor de credito de um cliente e a quantidade do produto de uma venda ao realizar uma devolução
CREATE OR REPLACE FUNCTION AttDevolucao()
RETURNS TRIGGER AS $$

	DECLARE quantidade_vendida int4 := (SELECT quantidade FROM item_venda WHERE id_item_venda = NEW.id_item_venda);

	BEGIN
	
		IF (quantidade_vendida + (OLD.quantidade - NEW.quantidade)) < 0 THEN
			RAISE EXCEPTION 'A quantidade a ser devolvida (%) é maior que a quantidade vendida (%)', NEW.quantidade, quantidade_vendida;
		ELSE
		
			UPDATE cliente SET credito = credito + (
				(NEW.quantidade * (SELECT valor_unitario FROM item_venda WHERE id_item_venda = NEW.id_item_venda)) - 
				(OLD.quantidade * (SELECT valor_unitario FROM item_venda WHERE id_item_venda = NEW.id_item_venda))
			)
			WHERE id_cliente = (
				SELECT C.id_cliente FROM cliente AS C, venda AS V, item_venda AS IV
					WHERE C.id_cliente = V.id_cliente
					AND V.id_venda = IV.id_venda
					AND IV.id_item_venda = NEW.id_item_venda
			);
			
			UPDATE item_venda SET quantidade = quantidade + (OLD.quantidade - NEW.quantidade) WHERE id_item_venda = NEW.id_item_venda;
			
		END IF;
	
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER AttDevolucao
AFTER UPDATE ON devolucao
FOR EACH ROW
EXECUTE PROCEDURE AttDevolucao();


-- função para atualizar o valor de credito de um cliente e a quantidade do produto de uma venda ao realizar uma devolução
CREATE OR REPLACE FUNCTION DelDevolucao()
RETURNS TRIGGER AS $$
	BEGIN
	
		UPDATE cliente SET credito = credito - (OLD.quantidade * (SELECT valor_unitario FROM item_venda WHERE id_item_venda = OLD.id_item_venda))
		WHERE id_cliente = (
				SELECT C.id_cliente FROM cliente AS C, venda AS V, item_venda AS IV
					WHERE C.id_cliente = V.id_cliente
					AND V.id_venda = IV.id_venda
					AND IV.id_item_venda = OLD.id_item_venda
		);
				
		UPDATE item_venda SET quantidade = quantidade + OLD.quantidade WHERE id_item_venda = OLD.id_item_venda;
	
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER DelDevolucao
AFTER DELETE ON devolucao
FOR EACH ROW
EXECUTE PROCEDURE DelDevolucao();


------------------------------------------------------------------------------
-- função para definir o valor e o numero de parcelas
CREATE OR REPLACE FUNCTION SetParcelas()
RETURNS TRIGGER AS $$

	DECLARE parcela int4 := 1;
	DECLARE data_parcela int4 := 30;
	
	BEGIN
	
		WHILE parcela <= NEW.numero_de_parcelas LOOP
		
			INSERT INTO parcelas (id_pagamento_venda, numero_da_parcela, valor_parcela, data_vencimento, status)
			VALUES (NEW.id_pagamento_venda, parcela, (NEW.valor_a_pagar / NEW.numero_de_parcelas), (CURRENT_DATE + data_parcela), 'NP');
			
			data_parcela := data_parcela + 30;
			parcela := parcela + 1;
			
		END LOOP;

	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER SetParcelas
AFTER INSERT ON pagamento_venda
FOR EACH ROW
EXECUTE PROCEDURE SetParcelas();


-- função para definir o valor e o numero de parcelas
CREATE OR REPLACE FUNCTION AttParcelas()
RETURNS TRIGGER AS $$

	DECLARE parcela int4 := 1;
	DECLARE data_parcela int4 := 30;
	
	BEGIN
	
		DELETE FROM parcelas WHERE id_pagamento_venda = OLD.id_pagamento_venda;
	
		WHILE parcela <= NEW.numero_de_parcelas LOOP
		
			INSERT INTO parcelas (id_pagamento_venda, numero_da_parcela, valor_parcela, data_vencimento, status)
			VALUES (NEW.id_pagamento_venda, parcela, (NEW.valor_a_pagar / NEW.numero_de_parcelas), (CURRENT_DATE + data_parcela), 'NP');
			
			data_parcela := data_parcela + 30;
			parcela := parcela + 1;
			
		END LOOP;

	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER AttParcelas
AFTER UPDATE ON pagamento_venda
FOR EACH ROW
EXECUTE PROCEDURE AttParcelas();

-- função para deletar as parcelas
-- ver sobre possivel erro nessa função
CREATE OR REPLACE FUNCTION DelParcelas()
RETURNS TRIGGER AS $$
	
	BEGIN
	
		DELETE FROM parcelas WHERE id_pagamento_venda = OLD.id_pagamento_venda;

	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER DelParcelas
AFTER DELETE ON pagamento_venda
FOR EACH ROW
EXECUTE PROCEDURE DelParcelas();

------------------------------------------------------------------------------
-- função para definir o valor devido pelo cliente
CREATE OR REPLACE FUNCTION SetDebito()
RETURNS TRIGGER AS $$

	DECLARE var_debito decimal(7,2);
	
	BEGIN
		
		-- verificação se o tipo da trigger
		-- é do tipo DELETE
		IF (TG_OP = 'DELETE') THEN
			var_debito := (
				SELECT sum(valor_parcela) FROM parcelas
				WHERE status = 'NP'
				AND id_pagamento_venda = OLD.id_pagamento_venda
			);
			
			UPDATE cliente SET debito = var_debito
			WHERE id_cliente = (
				SELECT id_cliente FROM venda AS v, pagamento_venda AS pv
				WHERE v.id_venda = pv.id_venda
				AND pv.id_pagamento_venda = OLD.id_pagamento_venda
			);
		ELSE
			var_debito := (
				SELECT sum(valor_parcela) FROM parcelas
				WHERE status = 'NP'
				AND id_pagamento_venda = NEW.id_pagamento_venda
			);
			
			UPDATE cliente SET debito = var_debito
			WHERE id_cliente = (
				SELECT id_cliente FROM venda AS v, pagamento_venda AS pv
				WHERE v.id_venda = pv.id_venda
				AND pv.id_pagamento_venda = NEW.id_pagamento_venda
			);
		END IF;
		
	RETURN NULL;
	END $$
LANGUAGE plpgsql;

CREATE TRIGGER SetDebito
AFTER INSERT OR UPDATE OR DELETE ON parcelas
FOR EACH ROW
EXECUTE PROCEDURE SetDebito();

------------------------------------------------------------------------------
-------- FUNÇOES PARA CONSULTA
------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION vendaDoDia(date)
RETURNS TABLE (valor_total numeric(7,2), data_venda date) AS $$
	BEGIN
		RETURN QUERY SELECT sum(v.valor_total), v.data_venda FROM venda AS v
		WHERE v.data_venda = $1
		GROUP BY v.data_venda;
	END $$
LANGUAGE plpgsql;

--SELECT * FROM venda;
--SELECT * from vendaDoDia('2021-03-25');

------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION produtoAbaixoEstoque(int)
RETURNS TABLE ( id_produto int,nome_produto varchar, quantidade int, preco_venda decimal(7,2)) AS $$
	BEGIN
		RETURN QUERY SELECT pr.id_produto,pr.nome_produto, pr.quantidade, pr.preco_venda FROM produto AS pr
		WHERE pr.quantidade <= $1;
	END $$
LANGUAGE plpgsql;

-- SELECT * FROM produto;
-- SELECT * FROM produtoAbaixoEstoque(10);
-- DROP FUNCTION produtoabaixoestoque(integer)
-- 10 é o numero para pesquisa (produtos abaixo de 10)
------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION clientesQueDevem()
RETURNS TABLE (nome_cliente varchar(100), debito numeric(7,2)) AS $$
	BEGIN
		RETURN QUERY SELECT cl.nome_cliente, cl.debito FROM cliente AS cl
		WHERE cl.debito > 0;
	END $$
LANGUAGE  plpgsql;

--SELECT * FROM cliente;
--SELECT * FROM clientesQueDevem();

------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION produtosMaisVendidosMes(char, int)
RETURNS TABLE (nome_produto varchar(30), quantidade int, data_venda date) AS $$
	BEGIN
		RETURN QUERY SELECT pr.nome_produto, iv.quantidade, v.data_venda 
		FROM venda AS v, item_venda AS iv, produto AS pr
		WHERE v.id_venda = iv.id_venda 
		AND iv.id_produto = pr.id_produto
		AND to_char(v.data_venda, 'MM') = $1
		AND iv.quantidade > $2
		ORDER BY iv.quantidade DESC;
	END $$
LANGUAGE  plpgsql;

--SELECT * FROM venda;
--SELECT * FROM produtosMaisVendidosMes(mês, quantidade de item_vendidos);
--SELECT * FROM produtosMaisVendidosMes('03', 5);

------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION mostrarTotalVenda(char)
RETURNS TABLE (valor_total numeric(7,2), data_venda Date) AS $$
	BEGIN
		RETURN QUERY SELECT sum(v.valor_total), v.data_venda FROM venda AS v
		WHERE to_char(v.data_venda, 'MM') = $1
		GROUP BY v.data_venda;
	END $$
LANGUAGE  plpgsql;

--SELECT * FROM venda;
--SELECT * FROM mostrarTotalVenda('03'); -- '03' é o mês

------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION atualizaPrecoProdutos(int, numeric(7,2))
RETURNS TABLE (nome_categoria varchar(20), nome_produto varchar(30), preco_venda numeric(7,2)) AS $$
	BEGIN
	UPDATE produto 
	SET preco_venda = ((produto.preco_venda)+(produto.preco_venda*($2)))
	WHERE produto.id_categoria = $1;
	
    RETURN QUERY SELECT cat.nome_categoria, pr.nome_produto, pr.preco_venda
    FROM produto AS pr, categoria AS cat
		WHERE pr.id_categoria = cat.id_categoria
		AND pr.id_categoria = $1
		AND pr.preco_venda > 0
			GROUP BY cat.nome_categoria,
			pr.preco_venda,
			pr.nome_produto;
END
$$
LANGUAGE  plpgsql;

--DROP FUNCTION atualizaPrecoProdutos(int,numeric(7,2));
--SELECT * FROM atualizaPrecoProdutos(id_categoria, decimal para aumentar em porcentagem);
--SELECT * FROM atualizaPrecoProdutos(1,0.5);

------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION prodMaisVendPorCategoria(int, Date, Date)
RETURNS TABLE (nome_categoria varchar, nome_produto varchar, data_venda Date) AS $$
	BEGIN
    RETURN QUERY SELECT cat.nome_categoria,pr.nome_produto,ven.data_venda
    FROM venda AS ven, compra AS com, item_venda AS iv, item_compra AS ic, produto AS pr, categoria AS cat
    WHERE cat.id_categoria = pr.id_categoria
    AND com.id_compra = ic.id_compra
    AND ven.id_venda = iv.id_venda
    AND cat.id_categoria = $1
    AND ven.data_venda BETWEEN $2 AND $3
    GROUP BY 
    ven.data_venda,
    cat.id_categoria,
    pr.nome_produto;
END
 $$
LANGUAGE  plpgsql;

--DROP FUNCTION prodMaisVendPorCategoria(int,Date,Date)
--SELECT * FROM prodMaisVendPorCategoria(id_categoria, ven.data_venda, com.data_compra)
--SELECT * FROM prodMaisVendPorCategoria(2,'2000-05-16','2021-05-24')

------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION prodMaisLucro(char, numeric(7,2))
RETURNS TABLE (nome_produto varchar, lucro numeric(7,2), data_venda Date) AS $$
	BEGIN
    RETURN QUERY SELECT pr.nome_produto, pr.lucro, ven.data_venda
    FROM produto AS pr,item_venda AS iv, venda AS ven
    WHERE pr.id_produto = iv.id_produto
		AND iv.id_venda = ven.id_venda
    AND to_char(ven.data_venda, 'MM') = $1
		AND pr.lucro > $2
		GROUP BY pr.nome_produto, pr.lucro, ven.data_venda;
	END $$
LANGUAGE  plpgsql;

--DROP FUNCTION prodMaisLucro(char, numeric(7,2));
--SELECT * FROM prodMaisLucro('03',9)

------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION clienteParcelaVencendo(Date)
RETURNS TABLE (id_cliente int ,nome_cliente varchar, data_vencimento Date, numero_da_parcela int, valor_parcela DECIMAL(7,2)) AS $$
	BEGIN
		RETURN QUERY SELECT cli.id_cliente ,cli.nome_cliente, par.data_vencimento, par.numero_da_parcela, par.valor_parcela
    FROM cliente AS cli, parcelas AS par, venda AS ven, pagamento_venda AS pv
    WHERE cli.id_cliente = ven.id_cliente
		AND ven.id_venda = pv.id_venda
    AND pv.id_pagamento_venda = par.id_pagamento_venda 
		AND par.data_vencimento = $1;
	END $$
LANGUAGE  plpgsql;

-- SELECT * FROM parcelas;
-- DROP FUNCTION clienteParcelaVencendo(Date);
-- SELECT * FROM clienteParcelaVencendo('2021-05-17');

--------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO caixa(numero_caixa) VALUES ('Caixa ADMIN');
INSERT INTO caixa(numero_caixa) VALUES ('1');

INSERT INTO "public"."funcionario"("nome_funcionario", "cpf", "usuario", "telefone", "endereco", "cargo", "senha", "email", "nivel_acesso", "id_caixa") VALUES ('admin', 'admin', 'admin', 'admin', 'admin', 'admin', '$2y$10$YDbfjFpazD66K7sD/JMQleGmvlSKU/ISRAxOJEsxYU91F/yDBTYvC', 'admin', 1, 1);

INSERT INTO "public"."funcionario"("nome_funcionario", "cpf", "usuario", "telefone", "endereco", "cargo", "senha", "email", "id_caixa", "nivel_acesso") VALUES ('teste', 'teste', 'teste', 'teste', 'teste', 'teste', '$2y$10$Qfs0/6O9NQ0PXi8O4d1P2eZBmaoQHU6SCdpk8dyYHjtxPzoFtNeyO', 'teste', 2, 2);


--------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO "public"."cliente"("nome_cliente", "cpf") VALUES ('CLIENTE PADRÃO', '1');
INSERT INTO "public"."telefone"("id_cliente", "num_telefone", "ddd", "whatsapp") VALUES (1, '1', '1', 'f');
INSERT INTO "public"."endereco"("id_cliente", "rua", "bairro", "cidade", "estado", "numero") VALUES (1, 'A', 'A', 'A', 'BA', '72');
--------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO forma_pagamento(tipo_pagamento) VALUES
('à vista'),
('Cartão'),
('à prazo'),
('Carnê');


