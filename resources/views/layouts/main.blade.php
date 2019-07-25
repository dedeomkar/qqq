<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FosterCraft | CRM and website management solution</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/st.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/flexboxgrid.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Start of HubSpot Embed Code --> 
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/5904957.js"></script>  
    <!-- End of HubSpot Embed Code -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    
</head> 
<body  data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0"  >
    <div class="wrapper"> 
    @include('includes/nav')
    @include('includes/content')
    <section id="company">
        <div class="container" >
            <div class="row center-lg center-md center-sm center-xs" > 
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                    <h4 style="text-align: left;">Contact us</h4> 
                    <ul style="text-align: left; margin-left: -35px;">
                        <li><i class="fa fa-phone"></i>  phone_no. </li>
                        <li><i class="fa fa-envelope"></i>   email@fostercraft.com</li>
                        <li><i class="fa fa-map"></i>   adress_of_company</li>
                    </ul>
                </div>     
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"  >
                    <h4 style="text-align: left;">About us</h4>
                    <p style="text-align: left; ">some info about us.<br> some info about us.<br> some info about us. </p>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"  >
                    <h4 style="text-align: left;">Newsletter</h4>
                    <form style="text-align: left;">  
                        <input type="email" name="email" placeholder="Enter email" 
                        style="border-radius: 2px; border:0; padding:5px;"> 
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>    
    <section id="footer" >
        <div class="container">
            <div class="row center-xs center-sm center-md center-lg middle-sm middle-xs middle-md middle-lg"
             style="margin:auto;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p>Copyright &copy; 2019 | FosterCraft</p>
                </div>
            </div>
        </div>
    </section>
    <section id="popupcon" >
        <div  class="popupc active">
        <div  id="form1"  class="container popupc active popupcc"  >
            <div class="row center-xs center-sm center-md center-lg middle-sm middle-xs middle-md middle-lg" style="margin:auto;">
                @include('login')
            </div>
        </div>
        <div  class="container popupcc active"  >
            <div class="row center-xs center-sm center-md center-lg middle-sm middle-xs middle-md middle-lg" style="margin:auto;">
                @include('otp')
            </div>
        </div>
    </div>  
    </section>
    <!-- <span id ="point" style="position: absolute;top:100vh; ">^</span> -->
</div> 

<script type="text/javascript">
    $(document).ready(function(){ 
            $('.InitialMessageBubble__Wrapper-dvdbPa').css('display','none');
            $('.hambar').on('click',function(){
            $('nav ul').toggleClass('active');
            if( $('nav ul').hasClass('active')){
            $('.main-header').addClass('scrolled');
            } 
        });

    });
</script>  
<script type="text/javascript">  
    $(document).ready(function(){
        $('.dropdown').on('click',function(){
            $('#dropdown-content').toggleClass('active');
            var x=$('.xx').css('margin-right');
            $('#dropdown-content').css('right',x);  
        });
    });
    $(window).resize(function() {
        var x=$('.xx').css('margin-right');
        $('#dropdown-content').css('right',x);  
    }); 
</script> 
<script type="text/javascript">
    $(window).on('scroll', function(){ 
        if ($(window).scrollTop()){ 
            $('#topnav').addClass('inactive'); 
            $('#topnav a').addClass('inactive'); 
            $('#showc').addClass('fade'); 
            if ($('#dropdown-content').hasClass('active')){
                $('#dropdown-content').toggleClass('active');
            }
        }else { 
            $('#showc').removeClass('fade');
            $('#topnav').removeClass('inactive');
            $('#topnav a').removeClass('inactive'); 
        }
    });
</script>  
<script type="text/javascript">  
    $(document).ready(function(){
        $('.popup').on('click',function(){
            $('.popupc').toggleClass('active'); 
        });
    }); 
</script> 

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>

</body>
</html>
