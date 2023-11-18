  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{route('User-Dashboard')}}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bold">Transactions Task</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="align-middle ti menu-toggle-icon d-none d-xl-block ti-sm"></i>
            <i class="align-middle ti ti-x d-block d-xl-none ti-sm"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="py-1 menu-inner">




            <!--users -->
            <li class="menu-item @if($class == 'users') open @endif">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="{{translate('Users')}}">{{translate('Users')}}</div>
              </a>
              <ul class="menu-sub">

                <li class="menu-item @if($class == 'users') active @endif">
                  <a href="{{url('Users')}}" class="menu-link">
                    <div data-i18n="{{translate('Users')}}">{{translate('Users')}}</div>
                  </a>
                </li>

              </ul>
            </li>
           <!--End Users -->

            <!-- transaction -->
            <li class="menu-item @if($class == 'all_transaction' || $class == 'create_transaction') open @endif">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="{{translate('Transaction')}}">{{translate('Transaction')}}</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item @if($class == 'create_transaction') active @endif">
                  <a href="{{route('Transaction.Transaction.create')}}" class="menu-link">
                    <div data-i18n="{{translate('create')}}">{{translate('create')}}</div>
                  </a>
                </li>
                <li class="menu-item @if($class == 'all_transaction') active @endif">
                  <a href="{{route('Transaction.Transaction.index')}}" class="menu-link">
                    <div data-i18n="{{translate('show')}}">{{translate('show')}}</div>
                  </a>
                </li>

              </ul>
            </li>

            <!-- end -->









            <li class="menu-item @if($class == 'change_pssword' || $class == 'profile' || $class == 'lang' || $class == 'vat') open @endif">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-settings"></i>
                  <div data-i18n="{{translate('Setting')}}">{{translate('Setting')}}</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item @if($class == 'profile') active @endif">
                    <a href="{{url('Profile')}}" class="menu-link">
                      <div data-i18n="{{translate('Account')}}">{{translate('Account')}}</div>
                    </a>
                  </li>
                  <li class="menu-item @if($class == 'change_pssword') active @endif">
                    <a href="{{url('Profile/Security/')}}" class="menu-link">
                      <div data-i18n="{{translate('Security')}}">{{translate('Security')}}</div>
                    </a>
                  </li>
                  <li class="menu-item @if($class == 'lang') active @endif">
                    <a href="{{url('Profile/Langauge/')}}" class="menu-link">
                      <div data-i18n="{{translate('Langauge')}}">{{translate('Langauge')}}</div>
                    </a>
                  </li>


                </ul>
              </li>




        </ul>
      </aside>
      <!-- / Menu -->
