<div id="click"
     style="position: fixed; left: -1px; top: 270px; color: black; padding: 5px; cursor: pointer; background-color: gold; border-radius: 0 5px 5px 0; z-index: 100; border: 1px solid black">
    <span class="fa fa-sign-in fa-2x"></span>
</div>

@if(Auth::check())
    <div class="showit2"
         style="position: fixed; left: -240px; top: 232px;  background-color: #2e6da4; z-index: 100; border-radius: 0 5px 5px 0;">
        <div class="btn-group" role="group" aria-label="...">
            <a class="btn btn-primary" style="border-radius: 0" href="{{ route('admin') }}">Админ панель</a>
            <a class="btn btn-primary closeit2" style="border-radius: 0 5px 5px 0"><i class="fa fa-close"></i></a>
        </div>
    </div>
@endif

<div class="showit"
     style="position: fixed; left: -240px; top: 311px;  background-color: #2e6da4; z-index: 100; border-radius: 0 5px 5px 0;">
    @if(Auth::check())
        <div class="btn-group" role="group" aria-label="...">
            <a class="btn btn-success" style="border-radius: 0" href="{{ route('logout') }}">Выйти?</a>
            <a class="btn btn-success closeit" style="border-radius: 0 5px 5px 0"><i class="fa fa-close"></i></a>
        </div>


    @else
        <div class="btn-group" role="group" aria-label="...">
            <a class="btn btn-success" style="border-radius: 0" href="{{ route('get_login') }}">Войти как
                администратор?</a>
            <a class="btn btn-success closeit" style="border-radius: 0 5px 5px 0"><i class="fa fa-close"></i></a>
        </div>
    @endif
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@if(isset($pages) && is_object($pages))
    @foreach($pages as $id=>$page)
        @if($id%2 == 0)
            <section id="{{ $page->alias }}" class="top_cont_outer">
                <div class="hero_wrapper">
                    <div class="container">
                        <div class="hero_section">
                            <div class="row">
                                <div class="col-lg-5 col-sm-7">
                                    <div class="top_left_cont zoomIn wow animated">
                                        {!! $page->text !!}
                                        <a href="{{ route('page', ['alias'=>$page->alias]) }}" class="read_more2">Read
                                            more</a></div>
                                </div>
                                <div class="col-lg-7 col-sm-5">
                                    {{ Html::image('public/assets/img/' . $page->images,'',['class'=>'zoomIn wow animated']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Hero_Section-->
        @else
            <section id="{{ $page->alias }}"><!--Aboutus-->
                <div class="inner_wrapper">
                    <div class="container">
                        <h2>{{ $page->name }}</h2>
                        <div class="inner_section">
                            <div class="row">
                                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">{{ Html::image('public/assets/img/' . $page->images,'',['class'=>'img-circle delay-03s animated wow zoomIn']) }}</div>
                                <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                                    <div class=" delay-01s animated fadeInDown wow animated">
                                        {!! $page->text !!}
                                    </div>
                                    <div class="work_bottom"><span>Want to know more..</span> <a
                                                href="{{ route('page', ['alias'=>$page->alias]) }}" class="contact_btn">About
                                            Us</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Aboutus-->
        @endif
    @endforeach
@endif

<!--Service-->

@if(isset($services) && is_object($services))
    <section id="service">
        <div class="container">
            <h2>Services</h2>
            <div class="service_wrapper">
                @foreach($services as $id=>$service)
                    @if($id%3 == 0)
                        <div class="row {{ $id != 0 ? 'borderTop' : '' }}">
                            @endif
                            <div class="col-lg-4 {{ $id%3 != 0 ? 'borderLeft' : ''}} {{ $id > 2 ? 'mrgTop' : '' }}">
                                <div class="service_block">
                                    <div class="service_icon delay-03s animated wow  zoomIn"><span><i
                                                    class="fa {{ $service->icon }}"></i></span></div>
                                    <h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
                                    <p class="animated fadeInDown wow">{{ $service->text }}</p>
                                </div>
                            </div>
                            @if(($id + 1)%3 == 0)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!--Service-->
@endif



@if(isset($portfolios) && is_object($portfolios))
    <!-- Portfolio -->
    <section id="portfolio" class="content">

        <!-- Container -->
        <div class="container portfolio_title">

            <!-- Title -->
            <div class="section-title">
                <h2>Portfolio</h2>
            </div>
            <!--/Title -->

        </div>
        <!-- Container -->

        <div class="portfolio-top"></div>

        <!-- Portfolio Filters -->
        <div class="portfolio">

            @if(isset($tags) && is_array($tags))
                <div id="filters" class="sixteen columns">
                    <ul class="clearfix">
                        <li>
                            <a id="all" href="#" data-filter="*" class="active">
                                <h5>All</h5>
                            </a>
                        </li>
                        @foreach($tags as $tag)
                            <li>
                                <a class="" href="#" data-filter=".{{ $tag }}">
                                    <h5>{{ $tag }}</h5>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--/Portfolio Filters -->
        @endif

        <!-- Portfolio Wrapper -->
            <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;"
                 id="portfolio_wrapper">

            @foreach($portfolios as $item)
                <!-- Portfolio Item -->
                    <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;"
                         class="portfolio-item one-four   {{ $item->filter }} isotope-item">
                        <div class="portfolio_img"> {{ Html::image('public/assets/img/' . $item->images,$item->name) }} </div>
                        <div class="item_overlay">
                            <div class="item_info">
                                <h4 class="project_name">{{ $item->name }}</h4>
                            </div>
                        </div>
                    </div>
                    <!--/Portfolio Item -->
                @endforeach
            </div>
            <!--/Portfolio Wrapper -->
        </div>
        <!--/Portfolio Filters -->

        <div class="portfolio_btm"></div>

        <div id="project_container">
            <div class="clear"></div>
            <div id="project_data"></div>
        </div>


    </section>
    <!--/Portfolio -->
@endif

@if(isset($clients) && is_object($clients))
    <section class="page_section" id="client"><!--page_section-->
        <h2>Clients</h2>
        <!--page_section-->
        <div class="client_logos"><!--client_logos-->
            <div class="container">
                <ul class="fadeInRight animated wow">
                    @foreach($clients as $client)
                        <li><a href="javascript:void(0)"><img src="{{ asset("public/assets/img/$client->images") }}"
                                                              alt="{{ $client->name }}"></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!--client_logos-->
@endif

@if(isset($team) && is_object($team))
    <section class="page_section team" id="team"><!--main-section team-start-->
        <div class="container">
            <h2>Team</h2>
            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
            <div class="team_section clearfix">
                @foreach($team as $id=>$person)
                    <div class="team_area">
                        <div class="team_box wow fadeInDown delay-0{{ $id * 3 + 3 }}s">
                            <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
                            {{ Html::image('public/assets/img/' . $person->images,$person->name) }}
                            <ul>
                                <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
                            </ul>
                        </div>
                        <h3 class="wow fadeInDown delay-0{{ $id * 3 + 3 }}s">{{ $person->name }}</h3>
                        <span class="wow fadeInDown delay-0{{ $id * 3 + 3 }}s">{{ $person->positin }}</span>
                        <p class="wow fadeInDown delay-0{{ $id * 3 + 3 }}s">{{ $person->text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/Team-->
@endif
<!--Footer-->
<footer class="footer_wrapper" id="contact">
    <div class="container">
        <section class="page_section contact" id="contact">
            <div class="contact_section">
                <h2>Contact Us</h2>
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 wow fadeInLeft">
                    <div class="contact_info">
                        <div class="detail">
                            <h4>UNIQUE Infoway</h4>
                            <p>104, Some street, NewYork, USA</p>
                        </div>
                        <div class="detail">
                            <h4>call us</h4>
                            <p>+1 234 567890</p>
                        </div>
                        <div class="detail">
                            <h4>Email us</h4>
                            <p>support@sitename.com</p>
                        </div>
                    </div>

                    <ul class="social_links">
                        <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i
                                        class="fa fa-twitter"></i></a></li>
                        <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i
                                        class="fa fa-facebook"></i></a></li>
                        <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i
                                        class="fa fa-pinterest"></i></a></li>
                        <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i
                                        class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-8 wow fadeInLeft delay-06s">
                    <div class="form">
                        <form action="{{ route('home') }}" method="post">
                            <input class="input-text" type="text" name="name" placeholder="Your Name *"
                                   onFocus="if(this.value==this.defaultValue)this.value='';"
                                   onBlur="if(this.value=='')this.value=this.defaultValue;">
                            <input class="input-text" type="text" name="email" placeholder="Your E-mail *"
                                   onFocus="if(this.value==this.defaultValue)this.value='';"
                                   onBlur="if(this.value=='')this.value=this.defaultValue;">
                            <textarea class="input-text text-area" name="text" cols="0" rows="0"
                                      placeholder="Your Message *"
                                      onFocus="if(this.value==this.defaultValue)this.value='';"
                                      onBlur="if(this.value=='')this.value=this.defaultValue;"></textarea>
                            <input class="input-btn" type="submit" value="send message">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="footer_bottom"><span>Copyright © 2014,    Template by <a
                        href="http://webthemez.com">WebThemez.com</a>. </span></div>
    </div>
</footer>