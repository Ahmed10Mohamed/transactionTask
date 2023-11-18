@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">{{translate('Transaction')}} /</span>
                {{translate('Create Transaction')}}
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             {{translate('Create Tranaction')}}

                    </h5>
                    <div class="card-body">

                      <form class="browser-default-validation" method="post" action="{{route('Transaction.Transaction.store')}}" enctype="multipart/form-data">
                              {{csrf_field()}}

                                    <div class="row">

                                        {{-- payer--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="payer">{{translate('Payers')}} <span style="color:#f00">*</span></label>
                                                <select name="user_id" class="form-control selectpicker w-100" id="" required>
                                                    <option value="">{{translate('Select Payer')}}</option>
                                                    @foreach ($users as $user )
                                                      <option value="{{$user->id}}" @selected($user->id == old('user_id'))>{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- amount --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="amount">{{translate('Amount')}} <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{old('amount')}}" required name="amount" id="amount"  />

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        {{-- is_vat--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="is_vat" value="1" id="is_vat" @checked(old('is_vat') == 1) >
                                                    <label class="form-check-label" for="is_vat"> {{translate('Is VAT inclusive')}} </label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- vat --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="vat">{{translate('Vat')}} </label>
                                            <input type="number" class="form-control" value="{{old('vat')}}"  name="vat" id="vat"  />

                                            </div>
                                        </div>

                                    </div>

                                     <div class="row">

                                        {{-- due_date--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="due_date">{{translate('due_date')}} </label>
                                            <input type="date" class="form-control" value="{{old('due_date')}}" name="due_date" id="due_date"  />

                                            </div>
                                        </div>



                                    </div>
                                    <hr>

                        <br>

                          <div class="row">
                              <div class="col-12">
                              <button type="submit" class="btn btn-primary">{{translate('Submit')}}</button>
                              </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /Browser Default -->


              </div>

            {{-- end --}}

        </div>
        <!-- Content -->
@endsection
@section('script')
<script>
    // Select All checkbox click
    const selectAll = document.querySelector('#selectAll'),
      checkboxList = document.querySelectorAll('[type="checkbox"]');
    selectAll.addEventListener('change', t => {
      checkboxList.forEach(e => {
        e.checked = t.target.checked;
      });
    });

</script>

@endsection
