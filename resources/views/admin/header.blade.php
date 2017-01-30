<div class="container portfolio_title">

    <!-- Title -->
    <div class="section-title">
        <a href="{{route('home')}}" class="col-sm-1 btn btn-primary">На сайт</a>
        <h2 class="col-sm-10">{{$title}}</h2>
        <a href="{{route('logout')}}" class="col-sm-1 btn btn-danger">Выйти</a>
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
<div class="portfolio">

  <div id="filters" class="sixteen columns">
      <ul style="padding:0px 0px 0px 0px">

        <li><a @if(Request::is('admin/pages*')) class="active" @endif href="{{route('pages')}}">
          <h5>Страницы</h5>
          </a>
		</li>
		
		<li><a @if(Request::is('admin/portfolio*')) class="active" @endif href="{{route('portfolio')}}">
          <h5>Порфолио</h5>
          </a>
		</li>
		
		<li><a @if(Request::is('admin/services*')) class="active" @endif href="{{route('services')}}">
          <h5>Сервисы</h5>
          </a>
		</li>

      <li><a @if(Request::is('admin/peoples*')) class="active" @endif href="{{route('peoples')}}">
              <h5>Команда</h5>
          </a>
      </li>

      <li><a @if(Request::is('admin/clients*')) class="active" @endif href="{{route('clients')}}">
              <h5>Клиенты</h5>
          </a>
      </li>
      </ul>
    </div>
   
</div>	
