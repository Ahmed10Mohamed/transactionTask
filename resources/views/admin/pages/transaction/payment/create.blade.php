@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">{{translate('Payment')}} /</span>
                {{translate('Create Payment')}}
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             {{translate('Create Payment')}}

                    </h5>
                    <div class="card-body">

                      <form class="browser-default-validation" method="post" action="{{route('Transaction.Payment.store')}}" enctype="multipart/form-data">
                              {{csrf_field()}}
                                        <input type="hidden" name="transaction_id" value="{{$data->id}}">
                                    <div class="row">


                                        {{-- amount --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="amount">{{translate('Amount Paid')}} <span style="color:#f00">*</span></label>
                                                <div class="input-group input-group-merge">
                                                <input type="text" id="amount_paid" class="form-control" value="{{old('amount_paid')}}" required name="amount_paid" aria-label="john.doe" aria-describedby="amount_paid">
                                                <span class="input-group-text" id="residual">{{translate('Residual')}} {{number_format($residual,2)}}</span>
                                                <input type="hidden" id="residual_amount" value="{{$residual}}">
                                            </div>
                                            </div>
                                        </div>


                                    </div>



                                     <div class="row">

                                        {{-- details--}}
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="details">{{translate('Payment Details')}} </label>

                                                <div class="input-group input-group-merge">
                                                <span id="details" class="input-group-text"><i class="ti ti-message-dots"></i></span>
                                                <textarea id="basic-icon-default-message" name="details" class="form-control" placeholder="{{translate('add details if found?')}}" aria-label="{{translate('add details if found?')}}" aria-describedby="details"></textarea>
                                                </div>

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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script>

     $(':text').on('input', function(){
        var residual_amount =$('#residual_amount').val(),
        payed =$(this).val(),

        residual_result = parseFloat(residual_amount) - parseFloat(payed);
        if(!isNaN(residual_result)) {
            $('#residual').text('Residual '+ parseFloat(residual_result).toFixed(2));
        }else{
            $('#residual').text('Residual '+ parseFloat(residual_amount).toFixed(2));

        }

     });

</script>

@endsection
