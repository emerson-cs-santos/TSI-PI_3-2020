<ul class="linkHover">
    <li class=" {{ \Request::is('usuario_shop')         ? ' linkAtivo' : '' }} ">        <a href="/usuario_shop">Cadastro</a>       </li>
    <li class=" {{ \Request::is('usuario_senha')        ? ' linkAtivo' : '' }} mt-4 ">   <a href="/usuario_senha">Alterar senha</a> </li>
    <li class=" {{ \Request::is('usuario_shop_wish')    ? ' linkAtivo' : '' }} mt-4 ">   <a href="#">Lista de desejos</a>           </li>
    <li class=" {{ \Request::is('usuario_shop_cart')    ? ' linkAtivo' : '' }} mt-4 ">   <a href="#">Carrinho</a>                   </li>
    <li class=" {{ \Request::is('usuario_shop_pedidos') ? ' linkAtivo' : '' }} mt-4 ">   <a href="#">Seus pedidos</a>               </li>
</ul>
