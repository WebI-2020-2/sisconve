<?php if (isset($_SESSION['usuario_id'])) : ?>
    <span class="navbar-text">
        <p>Olá, <?= $_SESSION['usuario_nome'] ?>, Seja bem vindo(a)!</p>
        <a class="btn btn-sm btn-danger" href="<?= URL ?>/UsuarioController/sair" data-tooltip="tooltip" title="Sair do Sistema">Sair</a>
    </span>
<?php else : ?>
    <span class="navbar-text">

        <!-- <h3>Users</h3>
        <a class="btn btn-info" href="<?= URL ?>/UsuarioController/cadastrar">Cadastre-se</a>
        <a class="btn btn-info" href="<?= URL ?>/UsuarioController/login">Entrar</a>
        <a class="btn btn-info" href="<?= URL ?>/UsuarioController/listar">Listar</a>
        <br>

        <h3>produto</h3>
        <a class="btn btn-info" href="<?= URL ?>/ProdutosController/cadastrarProduto">Cadastre produto</a>
        <a class="btn btn-info" href="<?= URL ?>/ProdutosController/listarProdutos">Listar produto</a>
        <br>


        <h3>Funcionario</h3>
        <a class="btn btn-info" href="<?= URL ?>/FuncionarioController/cadastrar">Cadastre Funcionario</a>
        <a class="btn btn-info" href="<?= URL ?>/FuncionarioController/listarFuncionario">Listar Funcionario</a>
        <br>

        <h3>Fornecedor</h3>
        <a class="btn btn-info" href="<?= URL ?>/FornecedorController/cadastrar">Cadastre Fornecedor</a>
        <a class="btn btn-info" href="<?= URL ?>/FornecedorController/listarFornecedor">Listar Fornecedor</a>
        <br>


        <h3>Clientes</h3>

        <a class="btn btn-info" href="<?= URL ?>/ClientesController/cadastrar">Cadastrar Clientes</a>
        <a class="btn btn-info" href="<?= URL ?>/ClientesController/listarClientes">Listar Clientes</a>
        <br>

        <h3>Categoria</h3>

        <a class="btn btn-info" href="<?= URL ?>/CategoriaController/cadastrarCategoria">Cadastrar Categoria</a>
        <a class="btn btn-info" href="<?= URL ?>/CategoriaController/listarCategoria">Listar Categoria</a>
        <br>

        <h3>Caixa</h3>

        <a class="btn btn-info" href="<?= URL ?>/CaixaController/listarCaixas">Listar Caixas</a>
        <br> -->


        <h3>Compra</h3>

        <a class="btn btn-info" href="<?= URL ?>/CompraController/listarCompras">Listar Compras</a>
        <a class="btn btn-info" href="<?= URL ?>/CompraController/cadastrar">Comprar</a>

        <br>

        <!--
        <h3>Devolucao</h3>

        <a class="btn btn-info" href="<?= URL ?>/DevolucaoController/listarDevolucoes">Listar Devolucoes</a>
        <br>

        <h3>Endereco</h3>

        <a class="btn btn-info" href="<?= URL ?>/EnderecoController/cadastrar">Cadastrar Enderecos</a>
        <a class="btn btn-info" href="<?= URL ?>/EnderecoController/listarEnderecos">Listar Enderecos</a>

        <br>
        <h3>Forma de pagamento</h3>
        <a class="btn btn-info" href="<?= URL ?>/FormaPagamentoController/listarFormasDePagamento">Listar Enderecos</a>
        <br>

        <h3>Item compra</h3>

        <a class="btn btn-info" href="<?= URL ?>/ItemCompraController/listarItensCompra">Listar itens compra</a>
        <a class="btn btn-info" href="<?= URL ?>/ItemCompraController/cadastra">cadastra</a>
        
        <br>

        <h3>Item venda</h3>

        <a class="btn btn-info" href="<?= URL ?>/ItemVendaController/listarItensVenda">Listar itens venda</a>
        <br>

        <h3>Pagamento Compra</h3>

        <a class="btn btn-info" href="<?= URL ?>/PagamentoCompraController/listarPagamentoCompras">Listar Pagamento compra</a>
        <br>

        <h3>Pagamento venda</h3>

        <a class="btn btn-info" href="<?= URL ?>/PagamentoVendaController/listarPagamentoVendas">Listar Pagamento venda</a>
        <br>

        <h3>Telefone</h3>

        <a class="btn btn-info" href="<?= URL ?>/TelefoneController/listarTelefones">Listar Telefone</a>

        <a class="btn btn-info" href="<?= URL ?>/TelefoneController/cadastrar">Cadastrar Telefone</a>
        <br>

        <h3>Venda</h3>

        <a class="btn btn-info" href="<?= URL ?>/VendaController/listarVendas">Listar Venda</a>
        <br> -->
    </span>
<?php endif; ?>