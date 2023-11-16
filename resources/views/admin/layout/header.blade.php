<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->

    <nav
      class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
      id="layout-navbar"
    >
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="px-0 nav-item nav-link me-xl-4" href="javascript:void(0)">
          <i class="ti ti-menu-2 ti-sm"></i>
        </a>
      </div>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


        <ul class="flex-row navbar-nav align-items-center ms-auto">


          <!-- Style Switcher -->

          <!--/ Style Switcher -->
            <!-- Style Switcher -->
            <li class="nav-item me-2 me-xl-0">
                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                  <i class="ti ti-md"></i>
                </a>
              </li>
              <!--/ Style Switcher -->
          <!-- Quick links  -->
          <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a
              class="nav-link dropdown-toggle hide-arrow"
              href="javascript:void(0);"
              data-bs-toggle="dropdown"
              data-bs-auto-close="outside"
              aria-expanded="false"
            >
              <i class="ti ti-layout-grid-add ti-md"></i>
            </a>
            <div class="py-0 dropdown-menu dropdown-menu-end">
              <div class="dropdown-menu-header border-bottom">
                <div class="py-3 dropdown-header d-flex align-items-center">
                  <h5 class="mb-0 text-body me-auto">{{translate('Shortcuts')}}</h5>
                  <a
                    href="javascript:void(0)"
                    class="dropdown-shortcuts-add text-body"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Add shortcuts"
                    ><i class="ti ti-sm ti-apps"></i
                  ></a>
                </div>
              </div>
              <div class="dropdown-shortcuts-list scrollable-container">
                <div class="overflow-visible row row-bordered g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="mb-2 dropdown-shortcuts-icon rounded-circle">
                      <i class="ti ti-user fs-4"></i>
                    </span>
                    <a href="{{url('Profile')}}" class="stretched-link">{{translate('Account')}}</a>
                    <small class="mb-0 text-muted">{{translate('Manage Account')}}</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="mb-2 dropdown-shortcuts-icon rounded-circle">
                      <i class="ti ti-eye-off fs-4"></i>
                    </span>
                    <a href="{{url('Profile/Security/')}}" class="stretched-link">{{translate('Security')}}</a>
                    <small class="mb-0 text-muted"> {{translate('Manage Security')}} </small>
                  </div>
                </div>
                <div class="overflow-visible row row-bordered g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="mb-2 dropdown-shortcuts-icon rounded-circle">
                      <i class="ti ti-language fs-4"></i>
                    </span>
                    <a href="{{url('Profile/Langauge/')}}" class="stretched-link">{{translate('Langauge')}}</a>
                    <small class="mb-0 text-muted"> {{translate('Manage Langauge')}}</small>
                  </div>


                </div>


              </div>
            </div>
          </li>
          <!-- Quick links -->




          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src=" @if(user()->image !== null) {{asset(user()->image)}} @else {{asset('admin/img/avatars/1.png')}} @endif" alt class="h-auto rounded-circle" />
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="{{url('Admin/account-settings-account')}}">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src=" @if(user()->image !== null) {{asset(user()->image)}} @else {{asset('admin/img/avatars/1.png')}} @endif" alt class="h-auto rounded-circle" />
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block">{{user()->full_name}}</span>
                      <small class="text-muted">Admin</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>

              <li>
                <a class="dropdown-item" href="{{url('Profile')}}">
                  <i class="ti ti-settings me-2 ti-sm"></i>
                  <span class="align-middle">{{translate('Settings')}}</span>
                </a>
              </li>

              <li>
                <div class="dropdown-divider"></div>
              </li>

              <li>

                <a class="dropdown-item" href="{{ route('custom_logout') }}" >
                  <i class="ti ti-logout me-2 ti-sm"></i>
                  <span class="align-middle">{{translate('Log Out')}} </span>
                </a>
               
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>


    </nav>

    <!-- / Navbar -->
