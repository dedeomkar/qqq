 
<script type="text/javascript">
    $(document).ready(function(){ 
      $('#login').submit(function(event){

    $('#name_er').text("");
    $('#company_er').text("");
    $('#phone_er').text("");
    event.preventDefault();

      $.ajax({
      type: 'POST',
      url: 'login',
      data: {
        '_token': $('input[name=_token]').val(), 
        'name': $('input[name=name]').val(), 
        'company': $('input[name=company]').val(), 
        'phone': $('input[name=phone]').val(), 
      },
      success: function(data){
        if (data.errors){
            $('#name_er').text(data.errors.name);
            $('#company_er').text(data.errors.company);
            $('#phone_er').text(data.errors.phone, 10); 
        }
        else {  
        $('#form1').remove();
        $('.popupcc').toggleClass('active');  
        
        }}
      })
    });
    });

      
</script>


<div id="form2" class="container" style=" ">
    <div  class="row justify-content-center" style="margin:auto; margin-top: 3%;">
        <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12" 
            style="font-size: 1.7rem;font-weight: 700; margin-bottom: 15px; padding-left: 3%">
            {{ __('Login') }}
        </div>
        <i class="popup fa fa-close"
            style="position:absolute;right: 8px;top:4px;cursor: pointer;"></i>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <form id='login' style="margin-top: 15px;">
            @csrf 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input id="name" type="text" class="form-control inpu" name="name" value="{{$data['name']}}" autocomplete="name" autofocus >

                <label for="name"  
                class="col-xs-12 col-sm-4 col-md-4 col-lg-4
                col-form-label text-md-right labl"
                style="top:79px;" 
                >{{ __('Your Name*') }} </label>  
                        <span  style=" top : 60px; " class="alertz " role="alert">
                            <strong id="name_er"></strong>
                        </span> 
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input id="name" type="text" class="form-control inpu" name="company" value="{{$data['company']}}"  autocomplete="company" autofocus >

                <label for="company"  
                class="col-xs-12 col-sm-12 col-md-12 col-lg-12
                col-form-label text-md-right labl"
                style="top:146px;" 
                >{{ __('Your Company Name*') }}</label> 
                    <span  style=" top : 127px; " class="alertz " role="alert">
                            <strong id="company_er"></strong>
                    </span> 
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                    <input id="phone" type="tel"   
                      maxlength="10" class="form-control inpu" 
                    name="phone" value="{{$data['phone']}}"  autocomplete="phone">
                    <!-- pattern="[0-9]{10}" 
                     oninvalid="this.setCustomValidity('Invaid Number')" 
                     oninput="this.setCustomValidity('')" -->

                <label for="phone"
                class="col-xs-12 col-sm-12 col-md-12 col-lg-12
                col-form-label text-md-right labl" style="top:213px;">
                    {{ __('Mobile Number*') }}</label> 
                    <span  style=" top : 193px;  " class="  alertz" role="alert">
                            <strong id="phone_er"></strong>
                    </span> 
            </div>  

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <button type="submit"  class="btn btn-primary popup2"
                style="width: 100%;background-color: #28AFFA;
                     border-color: #28AFFA; color: #fff;">
                    Recieve OTP
                </button> 
            </div>
        </form> <hr>
        <p style="font-size: 16px;">
            <i class="fa fa-lock" style="margin-right: 4px;margin-top: 8px;"></i> We ensure privacy of your mobile number</p>
    </div>
    <img src="{{asset('images/quick.jpg')}}" id="quick">
    </div>
</div> 
 
 