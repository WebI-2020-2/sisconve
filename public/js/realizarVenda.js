var buttonAddItem = document.getElementById("btn-add-item");
var inputNomeProduto = document.getElementById("nome-produto");
var inputQuantProduto = document.getElementById("quantidade-item");
var tableBodyItems = document.getElementById("table-body-items-venda");
var buttonAddItemModal = document.getElementById("btn-add-item-modal");
var cancelarVenda = document.getElementById("cancelar-venda");
var finalizarVenda = document.getElementById("finalizar-venda");
var valorTotalVenda = document.getElementById("value-cart");

buttonAddItem.addEventListener("click", () => {
    inputNomeProduto.value = "";
    inputQuantProduto.value = 1;
});

buttonAddItemModal.addEventListener("click", () => {
    if (inputNomeProduto.value != "" && inputQuantProduto.value != "") {
        tableBodyItems.innerHTML += `
            <tr>
                <td>0002</td>
                <td>
                    <input type="text" name="id-produto[]" value="${inputNomeProduto.value}" required style="display: none">
                    ${inputNomeProduto.value}
                </td>
                <td>
                    R$ 30,99
                </td>
                <td>
                    <input type="text" id="valor-total-produto" name="quantidade-produto[]" value="${inputQuantProduto.value}" required style="display: none">
                    ${inputQuantProduto.value} unid
                </td>
                <td>
                    R$ ${inputQuantProduto.value*3}
                </td>
                <td>
                    <a title="Remover item" href="#" onclick="removeRow(this)">
                        <img src="../public/img/lixeira-btn.svg" alt="">
                    </a>
                </td>
            </tr>
        `;
    }

    countTableRows();
    setTotalValue();
});

function setTotalValue() {
    var valores = document.querySelectorAll("#valor-total-produto");
    var valorTotal = 0;
    valores.forEach((valor) => {
        valorTotal += parseFloat(valor.value);
    });

    valorTotalVenda.innerHTML = valorTotal;
}

function removeRow(btn) {
    var row = btn.parentNode.parentNode;
    row.remove(row);
    countTableRows();
    setTotalValue();
}

function countTableRows() {
    var table = document.getElementById("table-items-venda");
    if (table.rows.length == 1) {
        finalizarVenda.disabled = true;
        cancelarVenda.disabled = true;
        finalizarVenda.style.cursor = "not-allowed";
        cancelarVenda.style.cursor = "not-allowed";
        finalizarVenda.style.opacity = "70%";
        cancelarVenda.style.opacity = "70%";
    } else {
        finalizarVenda.disabled = false;
        cancelarVenda.disabled = false;
        finalizarVenda.style.cursor = "pointer";
        cancelarVenda.style.cursor = "pointer";
        finalizarVenda.style.opacity = "100%";
        cancelarVenda.style.opacity = "100%";
    }
}

cancelarVenda.addEventListener("click", () => {
    var value = confirm("Deseja cancelar a venda?");
    if (value) tableBodyItems.innerHTML = "";
    countTableRows();
    setTotalValue();
});