<ul class="linkHover">
    <li class=" {{ \Request::is('usuario_shop')         ? ' linkAtivo' : '' }} ">       <a href="{{route('usuario-shop')}}" data-placement="top" data-toggle="tooltip" title="Suas informações">Cadastro</a>       </li>
    <li class=" {{ \Request::is('usuario_senha')        ? ' linkAtivo' : '' }} mt-4 ">  <a href="{{route('usuario-senha')}}">Alterar senha</a> </li>
    <li class=" {{ \Request::is('carrinho-shop-index')  ? ' linkAtivo' : '' }} mt-4 ">  <a href="{{route('carrinho-shop-index')}}">Carrinho</a></li>
    <li class=" {{ Str::of( Request::path() )->contains( ['pedido-shop-index', 'item-pedido-shop-index'] )  ? ' linkAtivo' : '' }} mt-4 ">  <a href="{{route('pedido-shop-index')}}">Seus pedidos</a></li>
</ul>
