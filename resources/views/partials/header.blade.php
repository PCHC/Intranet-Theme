<header class="banner sticky-top">
  <div class="header-top">
    <div class="container-fluid header-top--container">
      <nav class="navbar navbar-expand-md navbar-light justify-content-between">
        <a class="brand mr-3" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}">
          <img src="@asset('images/pchctoday-logo.svg')" alt="{{ get_bloginfo('name', 'display') }} Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary,#navbarSecondary" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="togglebutton">
          <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarPrimary">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav nav-primary ml-auto']) !!}
          @endif
        </div>
      </nav>
    </div><!-- end .header-top--container -->
  </div><!-- end .header-top -->
  @if (has_nav_menu('secondary_navigation'))
    <div class="header-bottom">
      <div class="container-fluid header-bottom--container">
        <nav class="navbar navbar-expand-md navbar-light justify-content-around">
          <div class="collapse navbar-collapse" id="navbarSecondary">
            {!! wp_nav_menu([
              'theme_location' => 'secondary_navigation',
              'menu_class' => 'nav navbar-nav nav-secondary mr-auto',
              'items_wrap'     => '<ul id="%1$s" class="%2$s"><li class="menu-item menu-title">' . __( 'Quick Links:' ) . '</li>%3$s</ul>',
              'depth' => 1
            ]) !!}
          </div>
          @include('partials.search-form')
        </nav>
      </div><!-- end .header-bottom--container -->
    </div><!-- end .header-bottom -->
  @endif
</header>
