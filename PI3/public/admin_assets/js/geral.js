function senhaHabilitar()
{
    const chksenha = document.getElementById('usuario_editar_senha_checkbox');
    const senha = document.getElementById('usuario_editar_senha');
    const confirmarSenha = document.getElementById('usuario_editar_confirmarSenha');

    if (chksenha.checked)
    {
        senha.disabled          = false;
        confirmarSenha.disabled = false;
    }
    else
    {
        senha.disabled          = true;
        senha.value = '';

        confirmarSenha.disabled = true;
        confirmarSenha.value = '';
    }
}
