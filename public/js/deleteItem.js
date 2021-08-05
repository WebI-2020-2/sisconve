function deleteCliente(id, nome) {
    var resp = confirm(`Deseja realmente excluir o cliente ${nome}?`);
    if (resp) {
        return window.location.href = `/sisconve/ClientesController/deletar/${id}`;
    }
}

function deleteProduto(id, nome) {
    var resp = confirm(`Deseja realmente excluir o produto ${nome}?`);
    if (resp) {
        return window.location.href = `/sisconve/ProdutosController/deletar/${id}`;
    } 
}

function deleteCategoria(id, nome) {
    var resp = confirm(`Deseja realmente excluir a categoria ${nome}?`);
    if (resp) {
        return window.location.href = `/sisconve/CategoriaController/deletar/${id}`;
    }
}

function deleteFornecedor(id, nome) {
    var resp = confirm(`Deseja realmente excluir o fornecedor ${nome}?`);
    if (resp) {
        return window.location.href = `/sisconve/FornecedorController/deletar/${id}`;
    } 
}

function deleteVenda(id) {
    var res = confirm(`Deseja realmente excluir a venda ${id}?`);
    if (res) {
        return window.location.href = `/sisconve/VendaController/deletar/${id}`;
    }
}

function deletefuncionario(id) {
    var res = confirm(`Deseja realmente excluir o funcionario ${id}?`);
    if (res) {
        return window.location.href = `/sisconve/FuncionarioController/deletar/${id}`;
    }
}
