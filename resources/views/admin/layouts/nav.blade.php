    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="{{ route('admin.home') }}" class="navbar-brand nav-link"><img alt="branding logo" src="{{ $panel_assets }}images/logo/robust-logo-light.png" data-expand="{{ $panel_assets }}images/logo/robust-logo-light.png" data-collapse="{{ $panel_assets }}images/logo/robust-logo-small.png" class="brand-logo"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
               <li class="nav-item">
                <a href="{{ route('site.home') }}" target="_blank" class="nav-link nav-menu-main">
                {{ trans('admin.visit_web') }}
                <i class="fa fa-eye"></i>
                </a>
              </li>
             
              @if(Auth::user()->can('contacts.view'))
              <li class="dropdown dropdown-notification nav-item message-content">
                @include($pLayout.'boxs.message')
              </li>
              @endif
             


              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ $panel_assets }}images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">{{ $userAuth->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="{{ route('users.update.info.show') }}" class="dropdown-item">
                    <i class="icon-head"></i> {{ trans('admin.edit', ['name' => trans('admin.mydata')]) }}
                  </a>
                  <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}"
                        class="dropdown-item"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="icon-power3"></i> {{ trans('admin.logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
