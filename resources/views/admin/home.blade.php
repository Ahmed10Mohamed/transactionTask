@extends('admin.layout.main')

@section('content')
<!-- Content wrapper -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-xl-8 col-md-8 col-12 mb-4">
            <div class="row">
                                <!-- Sales last year -->
                        @for ($i=1; $i <=$month ; $i++)

                <div class="col-xl-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                    <h5 class="card-title mb-0">{{translate('Tranaction')}}</h5>
                    <small class="text-muted">{{translate('Month')}}:- {{$i}}</small>
                    </div>
                    <div id="salesLastYear"></div>
                    <div class="card-body pt-0">
                        @foreach ($tranaction_status as $status_name )
                            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                            <h6 class="mb-0">{{$status_name}}</h6>

                            <small class="text-danger">
                                {{report_tranaction($status_name,$last_tranaction_month['date_search'][$i-1]['first_month'],$last_tranaction_month['date_search'][$i-1]['end_month'])}}
                            </small>
                            </div>

                        @endforeach

                    </div>
                </div>
                </div>
                @endfor
            </div>
        </div>


        <!-- Sessions Last month -->



        <!-- Revenue Growth -->
        <div class="col-xl-4 col-md-8 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <div class="card-title mb-auto">
                    <h5 class="mb-1 text-nowrap">All Total Amount</h5>
                    <small></small>
                  </div>
                  <div class="chart-statistics">
                    <h3 class="card-title mb-1">{{$all_amount}}</h3>
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
                <h5 class="mb-0">{{translate('Latest Tranaction')}}</h5>
                <small class="text-muted">{{translate('Yearly Earnings Overview')}}</small>
              </div>



            </div>
            <div class="card-body">
                {{-- start --}}
                 <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">
                            <th>#</th>
                            <th>{{translate('User Name')}}</th>
                            <th>{{translate('Amount')}}</th>
                            <th>{{translate('Amount Vat')}}</th>
                            <th>{{translate('Payer Payed')}}</th>
                            <th>{{translate('Residual')}}</th>
                            <th>{{translate('Is VAT inclusive')}}</th>
                            <th>{{translate('Due Date')}}</th>
                            <th>{{translate('Status')}}</th>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($tranactions as $tranaction)
                                <tr>

                                    <td >{{$loop->iteration}}</td>
                                    <td>{{optional($tranaction->payer_info)->name}}</td>
                                    <td>{{number_format($tranaction->amount,2)}}</td>
                                    <td>{{number_format($tranaction->amount_vat,2)}}</td>
                                    <td>{{number_format($tranaction->payments->sum('amount_paid'),2)}}</td>
                                    <td>{{Residual_transaction($tranaction->amount_vat , $tranaction->payments->sum('amount_paid'))}}</td>

                                    <td>
                                            @if($tranaction->is_vat)
                                            <i class="fa fa-check-circle" style="color:green"></i>
                                            @else
                                            <i class="fa fa-times-circle" style="color:red"></i>

                                            @endif
                                    </td>
                                    <td>{{date('Y-m-d', strtotime($tranaction->due_date))}}</td>
                                    <td>
                                        <!-- this bater run by cron job because not found cpanel to access cron job make function helper to updated stats -->
                                        {{$tranaction->status}}
                                        @if($tranaction->status === 'paid')
                                            <i class="fa fa-check-circle" style="color:green"></i>
                                        @elseif($tranaction->status === 'overdue')
                                        <i class="fa fa-times-circle" style="color:red"></i>
                                        @else
                                        <i class="fa fa-check-circle" style="color:orange"></i>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach


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
                    <h5 class="mb-0">{{translate('Transaction Last Year')}}</h5>

                  </div>

                </div>
                <div class="card-body">
                  <ul class="list-unstyled mb-0">
                    @foreach ($Last_tranaction_year as $key=>$Last_year)

                        <li class="mb-3 pb-1">
                        <div class="d-flex align-items-start">
                            <div class="badge bg-label-secondary p-2 me-3 rounded">
                            <i class="ti ti-shadow ti-sm"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">{{$key}}</h6>
                            </div>
                            <div class="d-flex align-items-center">

                                    <div class="ms-3 badge bg-label-success">{{$Last_year[0]}}</div>


                            </div>
                            </div>
                        </div>
                        </li>

                    @endforeach



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
