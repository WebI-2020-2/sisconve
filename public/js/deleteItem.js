function deleteCliente(id, nome) {
    var resp = confirm(`Deseja realmente excluir o cliente ${nome}?`);
    if (resp) {
        window.location.href = `/sisconve/ClientesController/deletar/${id}`;
    } //return alert(`ok! id = ${id}`)
}

function deleteProduto(id, nome) {
    var resp = confirm(`Deseja realmente excluir o produto ${nome}?`);
    if (resp) {
        window.location.href = `/sisconve/ProdutosController/deletar/${id}`;
    } //return alert(`ok! id = ${id}`)
}

function deleteCategoria(id, nome) {
    var resp = confirm(`Deseja realmente excluir a categoria ${nome}?`);
    if (resp) return alert(`ok! id = ${id}`);
}

function deleteFornecedor(id, nome) {
    var resp = confirm(`Deseja realmente excluir o fornecedor ${nome}?`);
    if (resp) {
        window.location.href = `/sisconve/FornecedorController/deletar/${id}`;
    } //return alert(`ok! id = ${id}`)
}

function deleteVenda(id) {
    var res = confirm(`Deseja realmente excluir a venda ${id}?`);
    if (res) {
        window.location.href = `/sisconve/VendaController/deletar/${id}`;
        // return alert(`ok! id = ${id}`);
    }
}

function deletefuncionario(id) {
    var res = confirm(`Deseja realmente excluir o funcionario ${id}?`);
    if (res) {
        window.location.href = `/sisconve/FuncionarioController/deletar/${id}`;
    }
}
