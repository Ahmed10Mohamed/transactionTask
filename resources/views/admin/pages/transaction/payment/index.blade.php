
@extends('admin.layout.main')

@section('content')
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

        <div class="card">
            <!-- card -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row me-2">
                    <div class="col-md-8">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{translate('Transaction Payment Of ').optional($all_data->payer_info)->name}}</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">

                            <a href="{{route('Transaction.Payment.create',['id'=>$all_data->id])}}" class="dt-button add-new btn btn-primary"><span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">{{translate('Create')}}</span></span></a>
                        </div>
                    </div>

                </div>


                {{-- start --}}
                <!-- Bootstrap Table with Header - Dark -->
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>{{translate('Payer Payed')}}</th>
                            <th>{{translate('Details')}}</th>
                            <th>{{translate('created at')}}</th>

                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($all_data->payments as $data)
                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td>{{number_format($data->amount_paid,2)}}</td>
                                    <td>{{$data->details}}</td>
                                    <td>{{date('Y-m-d', strtotime($data->created_at))}}</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>
                <!--/ Bootstrap Table with Header Dark -->

                {{-- end --}}

            </div>
            <!-- / card -->
        </div>





  </div>

    <!-- / Content -->
@endsection
