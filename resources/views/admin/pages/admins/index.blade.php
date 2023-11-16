
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{translate('All Users')}}</h4>
                    </div>
                     @if(permission_checker(auth()->user()->id, 'add_admin'))
                    <div class="col-md-8">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">

                            <a href="{{url('admins/create')}}" class="dt-button add-new btn btn-primary"><span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">{{translate('Create')}}</span></span></a>
                        </div>
                    </div>
                    @endif
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
                            <th>{{translate('Phone')}}</th>
                            <th>{{translate('Block')}}</th>
                            @if(permission_checker(auth()->user()->id, 'delete_admin') || permission_checker(auth()->user()->id, 'edit_admin'))
                            <th>{{translate('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($admins as $admin)
                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->phone}}</td>
                                    <td>

                                        @if ($admin->block == 1)
                                           <a class="btn btn-success" href="{{url('block_admin/'.$admin->id)}}"
                                            onclick="return confirm('are you sure');">
                                            <i class="fa fa-check"></i> {{translate('Yes')}}
                                           </a>
                                       @else
                                           <a class="btn btn-danger" href="{{url('block_admin/'.$admin->id)}}"
                                            onclick="return confirm('are you sure');">
                                            <i class="fa fa-times"></i>  {{translate('No')}}
                                            </a>
                                       @endif
                                   </td>
                                    @if(permission_checker(auth()->user()->id, 'delete_admin') || permission_checker(auth()->user()->id, 'edit_admin'))

                                    <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admins.edit',$admin->id)}}"
                                            ><i class="ti ti-pencil me-1"></i> {{translate('Edit')}}</a>



                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal-{{ $admin->id }}"
                                            ><i class="ti ti-trash me-1"></i> {{translate('Delete')}}</a> 
                                        </div>
                                        </div>

                                            <!-- Modal -->
                                        <div class="modal fade" id="basicModal-{{ $admin->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">{{translate('Delete Admin')}}</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                ></button>
                                                </div>
                                                <form role="form" action="{{ url('admins/'.$admin->id) }}" class="" method="POST">
                                                <div class="modal-body">

                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <p>{{translate('Are You Sure?')}}</p>



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

                                    @endif


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
