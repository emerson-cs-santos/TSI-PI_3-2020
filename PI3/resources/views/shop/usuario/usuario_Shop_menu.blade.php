<ul class="linkHover">
    <li class=" {{ \Request::is('usuario_shop')         ? ' linkAtivo' : '' }} ">       <a href="{{route('usuario-shop')}}">Cadastro</a>       </li>
    <li class=" {{ \Request::is('usuario_senha')        ? ' linkAtivo' : '' }} mt-4 ">  <a href="{{route('usuario-senha')}}">Alterar senha</a> </li>
    <li class=" {{ \Request::is('carrinho-shop-index')  ? ' linkAtivo' : '' }} mt-4 ">  <a href="{{route('carrinho-shop-index')}}">Carrinho</a></li>
    <li class=" {{ Str::of( Request::path() )->contains( ['pedido-shop-index', 'item-pedido-shop-index'] )  ? ' linkAtivo' : '' }} mt-4 ">  <a href="{{route('pedido-shop-index')}}">Seus pedidos</a></li>
    <li class=" {{ \Request::is('usuario_shop_wish')    ? ' linkAtivo' : '' }} mt-4 ">  <a href="#">Lista de desejos</a></li>
</ul>
