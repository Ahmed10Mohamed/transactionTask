
@extends('admin.layout.main')

@section('content')
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

        <div class="card">
            <!-- card -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row me-2">
                    <div class="col-md-4">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{translate('Users')}}</h4>
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
                            <th>{{translate('User Name')}}</th>
                            <th>{{translate('E-Mail')}}</th>
                            <th>{{translate('IS VERIFIED')}}</th>
                            <th>{{translate('Created At')}}</th>

                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($users as $user)
                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->email_verified_at !== null)
                                            <i class="fa fa-check-circle" style="color:green"></i>
                                        @else
                                            <i class="fa fa-times-circle" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>{{date('Y-m-d', strtotime($user->created_at))}}</td>



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
