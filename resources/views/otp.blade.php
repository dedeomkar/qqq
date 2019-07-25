<script type="text/javascript">
    $(document).ready(function(){ 
      $('#otpform').submit(function(event){

    $('#name_er').text("");
    $('#company_er').text("");
    $('#phone_er').text("");
    event.preventDefault();

      $.ajax({
      type: 'POST',
      url: 'otp',
      data: {
        '_token': $('input[name=_token]').val(), 
        'otp': $('input[name=otp]').val(),  
      },
      success: function(data){
        if (data.errors){
            $('#otp_er').text(data.errors.otp); 
        }
        else {   
            window.location.reload();
        }}
      })
    });
    });
</script>
      

  <div class="container"  >
        <div class="row justify-content-center" style="margin:auto;margin-top: 3%;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" 
            style="font-size: 1.7rem;font-weight: 700; margin-bottom: 15px; padding-left: 3%">
                Confirm OTP 
            </div> <i class="popup fa fa-close"
                style="position:absolute;right: 8px;top:4px;cursor: pointer;color: #000;"></i> 

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="otpform" method="POST" action="/otp" style="margin-top: 15px;">
                    @csrf  

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <input id="otp" type="tel" class="form-control inpu"
                         maxlength="4"  name="otp"  autocomplete="off"   >
 
                    <label for="otp" class="col-xs-12 col-sm-12 col-md-12 col-lg-12
                    col-form-label text-md-right labl"
                    style="top:79px;" >{{ __('Enter 4 digit OTP*') }}</label>
                        <span  style=" top : 60px; width: 180px;" class="alertz" role="alert">
                            <strong id="otp_er"></strong>
                        </span> 
                    </div>  

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <button type="submit" class="btn btn-primary popup2"
                        style="width: 100%;background-color: #28AFFA;
                            border-color: #28AFFA; color: #fff;">
                                {{ __('Confirm') }}
                        </button> 
                        </div>
                    </div>
                </form>
                <hr style="position :absolute;bottom:265px;left: 20px; width: 90%">
            </div>
           <img src="{{asset('images/quick.jpg')}}" id="quick" 
           style="margin-right: 4px;margin-top: 8px;"  > 
        </div>
    </div>  