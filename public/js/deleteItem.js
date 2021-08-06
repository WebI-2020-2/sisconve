/**
 * @param url é a url do sistema configurada em config.php
 * @param controller o controller para redirecionamento
 * @param id id do item a ser excluido
 * @param nome nome do item a ser excluido
 * 
 */

function deleteItem(url, controller, id, nome) {
    var resp = confirm(`Excluir ${controller} ${nome ? nome : id}?`);
    if (resp) {
        return window.location.href = `${url}/${controller}Controller/deletar/${id}`;
    }
}