@extends('admin.layout.main')

@section('content')
<!-- Content wrapper -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <!-- Sales last year -->
        <div class="col-xl-2 col-md-4 col-6 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <h5 class="card-title mb-0">{{translate('Signed Document')}}</h5>
              <small class="text-muted">{{translate('Last Year')}}</small>
            </div>
            <div id="salesLastYear"></div>
            <div class="card-body pt-0">
              <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                <h4 class="mb-0">{{$last_year[1]}}</h4>
                <small class="text-danger">{{$last_year[0]}}%</small>
              </div>
            </div>
          </div>
        </div>

        <!-- Sessions Last month -->
        <div class="col-xl-2 col-md-4 col-6 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <h5 class="card-title mb-0">{{translate('Complated Document')}}</h5>
              <small class="text-muted">{{translate('Last Month')}}</small>
            </div>
            <div class="card-body">
              <div id="sessionsLastMonth"></div>
              <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                <h4 class="mb-0">{{$last_month[1]}}</h4>
                <small class="text-success">{{$last_month[0]}}%</small>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Profit -->
        <div class="col-xl-2 col-md-4 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="badge p-2 bg-label-danger mb-2 rounded">
                <i class="ti ti-chart-pie-2 ti-sm"></i>
              </div>
              <h5 class="card-title mb-1 pt-2">{{translate('Completed')}}</h5>
              <small class="text-muted">{{translate('Last week')}}</small>
              <p class="mb-2 mt-1">{{$last_week[1]}}</p>
              <div class="pt-1">
                <span class="badge bg-label-secondary">{{$last_week[0]}}%</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Sales -->
        <div class="col-xl-2 col-md-4 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-chart-bar ti-md"></i></div>
              <h5 class="card-title mb-1 pt-2">Validation</h5>
              <small class="text-muted">Last week</small>
              <p class="mb-2 mt-1">673</p>
              <div class="pt-1">
                <span class="badge bg-label-secondary">+25.2%</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Revenue Growth -->
        <div class="col-xl-4 col-md-8 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <div class="card-title mb-auto">
                    <h5 class="mb-1 text-nowrap">Weekly Report</h5>
                    <small></small>
                  </div>
                  <div class="chart-statistics">
                    <h3 class="card-title mb-1">4,673</h3>
                    <span class="badge bg-label-success">+15.2%</span>
                  </div>
                </div>
                <div id="revenueGrowth"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earning Reports Tabs-->
        <div class="col-12 col-xl-8 mb-4">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <div class="card-title mb-0">
                <h5 class="mb-0">{{translate('Document Tracking')}}</h5>
                <small class="text-muted">{{translate('Yearly Earnings Overview')}}</small>
              </div>

              <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item">
                <a class="nav-link  @if($task == null) active @endif" href="{{url('home')}}"
                    > {{translate('All')}} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($task == '0') active @endif" href="{{url('home?task=0')}}"
                        > {{translate('Now')}} </a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link @if($task == '1') active @endif" href="{{url('home?task=1')}}"> {{translate('In progress')}} </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link @if($task == '2') active @endif" href="{{url('home?task=2')}}"> {{translate('Completed')}} </a>
                </li>


            </ul>

            </div>
            <div class="card-body">
                {{-- start --}}
                 <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>{{translate('Task Name')}}</th>
                            <th>{{translate('priority')}}</th>
                            <th>{{translate('Date')}}</th>
                            <th>%</th>
                            <th>{{translate('From')}}</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                           

                        </tbody>
                    </table>
                    </div>

                {{-- end --}}
            </div>
          </div>
        </div>

        <!-- Sales last 6 months -->
        <div class="col-md-6 col-xl-4 mb-4">
            {{-- start --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <div class="card-title mb-0">
                    <h5 class="mb-0">{{translate('Document Last Month')}}</h5>
                    <small class="text-muted">38.4k</small>
                  </div>

                </div>
                <div class="card-body">
                  <ul class="list-unstyled mb-0">
                    <li class="mb-3 pb-1">
                      <div class="d-flex align-items-start">
                        <div class="badge bg-label-secondary p-2 me-3 rounded">
                          <i class="ti ti-shadow ti-sm"></i>
                        </div>
                        <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{translate('Document')}}</h6>
                            <small class="text-muted">{{translate('Now')}}</small>
                          </div>
                          <div class="d-flex align-items-center">
                            <p class="mb-0">{{$last_document_month[1]}}</p>
                            <div class="ms-3 badge bg-label-success">{{$last_document_month[0]}}%</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="mb-3 pb-1">
                      <div class="d-flex align-items-start">
                        <div class="badge bg-label-secondary p-2 me-3 rounded">
                          <i class="ti ti-globe ti-sm"></i>
                        </div>
                        <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{translate('Document')}}</h6>
                            <small class="text-muted">{{translate('In progress')}}</small>
                          </div>
                          <div class="d-flex align-items-center">
                            <p class="mb-0">{{$last_document_month[3]}}</p>
                            <div class="ms-3 badge bg-label-success">{{$last_document_month[2]}}%</div>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li class="mb-3 pb-1">
                        <div class="d-flex align-items-start">
                          <div class="badge bg-label-secondary p-2 me-3 rounded">
                            <i class="ti ti-discount-2 ti-sm"></i>
                          </div>
                          <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">{{translate('Document')}}</h6>
                              <small class="text-muted">{{translate('Completed')}}</small>
                            </div>
                            <div class="d-flex align-items-center">
                              <p class="mb-0">{{$last_document_month[5]}}</p>
                              <div class="ms-3 badge bg-label-success">{{$last_document_month[4]}}%</div>
                            </div>
                          </div>
                        </div>
                      </li>


                  </ul>
                </div>
              </div>

            {{-- end --}}
        </div>


      </div>
    </div>
    <!-- / Content -->



@endsection

@section('script')

<!-- Page JS -->
<script src="{{asset('admin/js/dashboards-crm.js')}}"></script>

@endsection
