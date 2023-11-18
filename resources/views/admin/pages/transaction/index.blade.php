
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{translate('Transaction')}}</h4>
                    </div>
                </div>
                <form action="#" method="get" class="kt-form">
				<div class="row">
					<div class="col-md-3 d-none d-sm-inline-block">
						<div class="form-group">
							<label>From</label>
							<input type="date" class="form-control" required name="from_date" id="from_date" value="{{request('from_date')}}" />
						</div>
					</div>
					<div class="col-md-3 d-none d-sm-inline-block">
						<div class="form-group">
							<label>To</label>
							<input type="date" class="form-control" required name="to_date" id="to_date" value="{{request('to_date')}}" />
						</div>
					</div>


					<div class="col-md-3">
						<label class="control-label"><br/> <br/></label>
						<button type="submit" class="btn btn-success btn-block">Search</button>
					</div>
				</div>
			</form>


                {{-- start --}}
                <!-- Bootstrap Table with Header - Dark -->
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>{{translate('User Name')}}</th>
                            <th>{{translate('Amount')}}</th>
                            <th>{{translate('Amount Vat')}}</th>
                            <th>{{translate('Payer Payed')}}</th>
                            <th>{{translate('Residual')}}</th>
                            <th>{{translate('Is VAT inclusive')}}</th>
                            <th>{{translate('VAT')}}</th>
                            <th>{{translate('Due Date')}}</th>
                            <th>{{translate('Status')}}</th>
                            <th>{{translate('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($all_data as $data)
                                <tr>

                                    <td >{{$loop->iteration}}</td>
                                    <td>{{optional($data->payer_info)->name}}</td>
                                    <td>{{number_format($data->amount,2)}}</td>
                                    <td>{{number_format($data->amount_vat,2)}}</td>
                                    <td>{{number_format($data->payments->sum('amount_paid'),2)}}</td>
                                    <td>{{Residual_transaction($data->amount_vat , $data->payments->sum('amount_paid'))}}</td>

                                    <td>
                                            @if($data->is_vat)
                                            <i class="fa fa-check-circle" style="color:green"></i>
                                            @else
                                            <i class="fa fa-times-circle" style="color:red"></i>

                                            @endif
                                    </td>
                                    <td>{{$data->vat}}</td>
                                    <td>{{date('Y-m-d', strtotime($data->due_date))}}</td>
                                    <td>
                                        <!-- this bater run by cron job because not found cpanel to access cron job make function helper to updated stats -->
                                        {{$data->status}}
                                        @if($data->status === 'paid')
                                            <i class="fa fa-check-circle" style="color:green"></i>
                                        @elseif($data->status === 'overdue')
                                        <i class="fa fa-times-circle" style="color:red"></i>
                                        @else
                                        <i class="fa fa-check-circle" style="color:orange"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('Transaction.Payment.show',['id'=>$data->id])}}"
                                            ><i class="ti ti-pencil  me-1"></i> {{translate('payments')}}</a>


                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal-{{ $data->id }}"
                                            ><i class="ti ti-trash me-1"></i> {{translate('Delete')}}</a>
                                        </div>
                                        </div>

                                            <!-- Modal -->
                                        <div class="modal fade" id="basicModal-{{ $data->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">{{translate('Delete Transaction')}}</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                ></button>
                                                </div>
                                                <form role="form" action="{{ url('Transaction/delete/'.$data->id) }}" class="" method="POST">
                                                <div class="modal-body">

                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <p>{{translate('Are You Sure?')}}</p>

                                                   <p>{{translate('You will lose all payment of this Transaction')}}</p>

                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                    {{translate('Close')}}
                                                </button>
                                                <button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> {{translate('Delete')}}</button>
                                                </a>
                                                </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>

                                            {{-- end --}}

                                    </td>

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
