 <header > 
    <nav id="navbar" class="main-header"  > 

            <div id= "topnav" class="row flo1 " style="margin:auto;background-color:  #721213; color: #000; ">
            <div class="container xx"  style="display: inline; ">  
            <div  class="col-xs-6 col-sm-6 col-md-6 col-lg-6" 
                style="float: left;display: inline;padding-left:  0px; " >
                <a href="" style=""><i class="fa fa-twitter"></i></a> 
                <a href="" style=""><i class="fa fa-facebook"></i></a> 
                <a href="" style="margin-left: 1px; font-size: 16px;"><i class="fa fa-instagram"></i></a>  
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" 
                style="float:right; display:inline;padding-right: 0px;">
            <ul style="margin:0px;; ">
                @guest
                    <li class="dropdown0" >
                        <a style="cursor: pointer;color: #FFF; 
                        font-size: 14px;letter-spacing: 0.7px;"  class="popup">
                        Login <i class="fa fa-user" style=" margin-left:2px;font-size: 16px;"></i>
                        </a> 
                    </li> 
                <!-- <li style="margin-left: -5px;color: #fff;  font-size: 13px"> <i class="fa fa-user"></i> </li> -->
                @else  
                <li >  <span style="color: #FFF; font-size: 14px;letter-spacing: 0.7px;">Welcome</span>  
                    <a   href="#" class="dropdown" >
                        <span style="color: #FFF; font-size: 14px; margin-left: -1px;
                        letter-spacing: 0.7px;">
                        {{ Auth::user()->name }} </span>  <i class="fa fa-caret-down"></i>  </a>

                        <div   id="dropdown-content"> 
                            <a  href="/logout" 
                            style="color: #721213; font-size: 14px;
                            letter-spacing: 0.7px;font-weight: 700;
                            padding-left: 20px;padding-right: 20px;" 
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            Log out
                            </a>

                            <form id="logout-form" action="/logout" method="POST" 
                                style="display: none;">
                                @csrf
                            </form>
                        </div> 
                </li>
                @endguest 
            </ul>
        </div>
        </div> 
        </div>

        <div class="container" id="bottomnav" >   

            <div class="icon" style="text-align: left; float: left; color:#000; ">
                <a href="/"><h1 style="margin-block-start:13px;color:#000;"><img src="{{asset('images/logo.png')}}" style="width:3.5rem;margin-top: -4%;">FosterCraft<span id="anim">_</span></h1></a>
            </div>

            <div class="hambar" >
                <i class="fa fa-bars fa-2x"></i>
            </div>

            <div class="flo" > 
                <ul id="menu" style=" float:right; font-size: 16px;font-weight: 900; letter-spacing: 0.7px;">
                    <li class="current"><a href="/">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#footer">Contact</a></li>
                </ul>
            </div>
        </div>  
  </nav>
</header> 