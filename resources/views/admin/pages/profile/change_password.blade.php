@extends('admin.layout.main')

@section('content')
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{translate('Account Settings')}} /</span> {{translate('Security')}}</h4>

      <div class="row">
        <div class="col-md-12">
        @include('admin.pages.profile.include.menu',['class'=>$class])

          <!-- Change Password -->
          <div class="card mb-4">
            <h5 class="card-header">{{translate('Change Password')}}</h5>
            <div class="card-body">
              <form id="formAccountSettings" method="POST" action="{{url('Profile/Update-Password')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                    <label class="form-label" for="currentPassword">{{translate('Current Password')}}</label>
                    <div class="input-group input-group-merge has-validation">
                        <input class="form-control" type="password" name="current_password" id="currentPassword" placeholder="············">
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div><div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="newPassword">{{translate('New Password')}}</label>
                    <div class="input-group input-group-merge">
                      <input
                        class="form-control"
                        type="password"
                        id="newPassword"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      />
                      <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                  </div>

                  <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="password_confirmation">{{translate('Confirm New Password')}}</label>
                    <div class="input-group input-group-merge">
                      <input
                        class="form-control"
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      />
                      <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                  </div>
                  <div class="col-12 mb-4">
                    <h6>{{translate('Password Requirements')}}:</h6>
                    <ul class="ps-3 mb-0">
                      <li class="mb-1">{{translate('Minimum 6 characters long - the more, the better')}}</li>
                      <li class="mb-1">{{translate('At least one lowercase character , the better')}}</li>

                    </ul>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary me-2">{{translate('Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary">{{translate('Reset')}}</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!--/ Change Password -->

            <!-- Two-steps verification -->
            <div class="card mb-4">
              <h5 class="card-header">{{translate('Two-steps verification')}}</h5>
              <div class="card-body">
                <h6 class="fw-semibold mb-3">
                  @if (session('status') == "two-factor-authentication-disabled")
                        {{translate('Two factor authentication is not enabled yet.')}}
                   @endif
                   @if (session('status') == "two-factor-authentication-enabled")
                            {{translate('Two factor Authentication has been enabled.')}}
                    @endif


                </h6>
                <p class="w-50">
                  {{translate(' Two-factor authentication adds an additional layer of security to your account by requiring more
                  than just a password to log in.')}}
                </p>
                <h6>{{translate('Download Google Authenticator')}}:</h6>
                    <ul class="ps-3 mb-0">
                      <li class="mb-1"><a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en_US" target="_blank">{{translate('Android')}}</a></li>
                      <li class="mb-1"><a href="" target="_blank">{{translate('IOS')}}</a></li>

                    </ul>
                <form method="POST" action="/user/two-factor-authentication">
                  @csrf

                  @if (auth()->user()->two_factor_secret)
                      @method('DElETE')

                      <div class="pb-5">
                          {!! auth()->user()->twoFactorQrCodeSvg() !!}
                      </div>



                      <button class="btn btn-danger mt-2">{{translate('Disable')}}</button>
                  @else
                      <button class="btn btn-primary mt-2">{{translate('Enable')}}</button>
                  @endif
              </form>

              </div>
            </div>
            <!-- Modal -->



        </div>
      </div>
    </div>
    <!-- / Content -->

@endsection
@section('js')
 <!-- Page JS -->
 <script src="{{asset('agent/js/pages-account-settings-account.js')}}"></script>
@endsection
