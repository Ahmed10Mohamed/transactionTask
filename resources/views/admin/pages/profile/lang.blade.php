@extends('admin.layout.main')

@section('content')
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{translate('Account Settings')}} /</span> {{translate('Account')}}</h4>

      <div class="row">
        <div class="col-md-12">
        @include('admin.pages.profile.include.menu',['class'=>$class])

          <div class="card mb-4">
            <h5 class="card-header">{{translate('Default Langauge')}}</h5>
            <!-- Account -->
            <form id="formAccountSettings" action="{{url('Profile/Update-Langauge')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
            <div class="card-body">


            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">{{translate('Langauge')}}</label>
                        <select name="lang" class="form-control selectpicker w-100" id="" required>
                            <option value="">{{translate('Select Langauge')}}</option>
                            <option value="en" @if(user()->lang == 'en') selected @endif>{{translate('English')}}</option>
                            <option value="ar" @if(user()->lang == 'ar') selected @endif>{{translate('Arabic')}}</option>
                        </select>
                  </div>











                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">{{translate('Submit')}} </button>
                  <button type="reset" class="btn btn-label-secondary">{{translate('Reset')}}</button>
                </div>
            </div>
            </form>
            <!-- /Account -->
          </div>

        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection
@section('js')
 <!-- Page JS -->
 <script src="{{asset('agent/js/pages-account-settings-account.js')}}"></script>
@endsection
