    
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Грузоперевозки</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Главная</a></li>
        @if (Auth::user())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Меню<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('clients') }}">Клиенты</a></li>
            <li><a href="{{ route('contracts') }}">Договоры</a></li>
            <li><a href="{{ route('trips') }}">Рейсы</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Отчёты</li>
            <li><a href="{{ route('archive') }}">Архив</a></li>
            <li><a href="{{ route('commission') }}">Комиссионные</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Сервис<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('points') }}">Пункты</a></li>
            <li><a href="{{ route('services') }}">Услуги</a></li>
          </ul>
        </li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @guest
        <li><a href="{{ route('login') }}">Вход</a></li>
        <li><a href="{{ route('register') }}">Регистрация</a></li>
        @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
            {{ Auth::user()->login }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Выйти
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
      @endguest
    </ul>
  </div><!--/.nav-collapse -->
</div>
</div>