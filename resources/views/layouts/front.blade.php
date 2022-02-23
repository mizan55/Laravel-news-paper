@php
    $categories=DB::table('categories')->orderBy('id','ASC')->get();
    $seo=DB::table('seos')->first();
@endphp

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="meta_author" content="{{ $seo->meta_author }}">
    <meta name="meta_keyword" content="{{ $seo->meta_keyword }}">
    <meta name="meta_description" content="{{ $seo->meta_description }}">
    <meta name="google_analytics" content="{{ $seo->google_analytics }}">
    <meta name="google_verification" content="{{ $seo->google_verification }}">
    <meta name="alexa_analytics" content="{{ $seo->alexa_analytics }}">
    <title>{{ $seo->meta_title }}</title>
    <link rel="stylesheet" href="{{ asset('palo/css/bootstrap.css') }}">
    <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('palo/css/font-awesome.min.css') }}">
  
    <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('palo/css/reset.css') }}">
    <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('palo/css/style.css') }}">
    <!-- Resource style -->
    <script src="{{ asset('palo/js/modernizr.js') }}"></script>
    <!-- Modernizr -->
   <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    
</head>

<body>
    <!--
/*#####################
-----------STARTING NAVBAR PART--------------
#####################*/
-->
    <header class="cd-main-header">
        <a class="cd-logo" href="#0"><img src="{{ asset('palo/img/Prothom-Alo.png') }}" alt="Logo"></a>
        <ul class="cd-header-buttons">
            <li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
            <li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
        </ul>
        <!-- cd-header-buttons -->
    </header>
    <div class="cd-overlay"></div>
    <nav class="cd-nav">
        

        <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
            
      @foreach($categories->take(7) as $category)
      @php
            $subcategories=DB::table('subcategories')->where('category_id',$category->id)->get();
      @endphp
    
         <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="font-size:20px">
                @if(session()->get('lang')=='bangla')
             {{ $category->category_bn}}
             @else
             {{ $category->category_en}}
             @endif
            </a>
            <div class="dropdown-menu">
                @foreach($subcategories as $subcategory)
              <a class="dropdown-item" href="#" style="color: red">
                @if(session()->get('lang')=='bangla')
                {{ $subcategory->subcategory_bn }}</a>
                @else
                {{ $subcategory->subcategory_en }}</a>
                @endif
              @endforeach
              
            </div>
          </li>
        @endforeach

     
         
            <li class="has-children">
                @if(session()->get('lang')=='bangla')
                 <a href="#" style="font-size:20px"><i class="fa fa-bars" aria-hidden="true" ></i> সব </a>
                 @else
                 <a href="#" style="font-size:20px"><i class="fa fa-bars" aria-hidden="true"></i> all </a>
                 @endif
                
                <ul class="cd-secondary-nav is-hidden">
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li class="go-back">
                                <a href="#0"></a>
                            </li>
                            <li class="see-all">
                                <a href="#"></a>
                            </li>
                            <li><a href="#">প্রচ্ছদ</a></li>
                            <li><a href="#">খেলা</a></li>
                            <li><a href="#">জীবনযাপন</a></li>
                            <li><a href="#">বিশেষ সংখ্যা</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li><a href="#">বাংলাদেশ</a></li>
                            <li><a href="#0">বিনোদন</a></li>
                            <li><a href="#0">শিক্ষা</a></li>
                            <li><a href="#0">উত্তর আমেরিকা</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li><a href="#">আন্তর্জাতিক</a></li>
                            <li><a href="#">কার্টুন</a></li>
                            <li><a href="#">শিল্প ও সাহিত্য</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li class="go-back">
                                <a href="#0"></a>
                            </li>
                            <li class="see-all">
                                <a href="#"> </a>
                            </li>
                            <li><a href="#">অর্থনীতি</a></li>
                            <li><a href="#">ফিচার</a></li>
                            <li><a href="#">আমরা</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li class="go-back">
                                <a href="#0"></a>
                            </li>
                            <li class="see-all">
                                <a href="#"> </a>
                            </li>
                            <li><a href="#">মতামত</a></li>
                            <li><a href="#">বিজ্ঞান ও প্রযুক্তি</a></li>
                            <li><a href="#">পাঁচমিশালি</a></li>
                        </ul>
                        <li class="has-children">
                            <ul class="is-hidden">
                                <li class="go-back">
                                    <a href="#0"></a>
                                </li>
                                <li class="see-all">
                                    <a href="#"> </a>
                                </li>
                                <li><a href="#">ই-পেপার</a></li>
                                <li><a href="#">বিজ্ঞাপন</a></li>
                                <li><a href="#">সার্কুলেশন</a></li>
                                <li><a href="#">পবিত্র হজ</a></li>
                                <li><a href="#">দূর পরবাস</a></li>
                            </ul>
                        </li>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li class="go-back">
                                <a href="#0"></a>
                            </li>
                            <li class="see-all">
                                <a href="#"></a>
                            </li>
                            <li><a href="#"><i class="fa fa-camera picture8378" aria-hidden="true"></i> <span class="pic8448-details88">ছবি</span></a></li>
                            <li><a href="#"><i class="fa fa-video-camera camera885" aria-hidden="true"></i> <span class="pic8448-details88">ভিডিও</span></a></li>
                            <li><a href="#"><i class="fa fa-file-archive-o archive747" aria-hidden="true"></i> <span class="pic8448-details88">আর্কাইভ</span></a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span class="pic8448-details88">2221</span></a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li><a href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i> <span class="pic8448-details88">ট্রাস্ট</span></a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li><a href="#"><i class="fa fa-ravelry" aria-hidden="true"></i> <span class="pic8448-details88">প্রতিচিন্তা</span></a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li><a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> <span class="pic8448-details88">চাকরি ডটকম</span></a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li><a href="#"><i class="fa fa-microphone" aria-hidden="true"></i> <span class="pic8448-details88">abc রেডিও</span></a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <ul class="is-hidden">
                            <li class="bondusoba8380">
                                <a href="#"><img src="{{ asset('img/590679d8369d61d451b1076ef176926d-593e579b0f1b3.png') }}" alt="image" /></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="line38">|</li>
            @if(session()->get('lang')=='bangla')
            <li><a href="{{ route('lang.english') }}" style="font-size:20px">english</a></li>
            @else
            <li><a href="{{ route('lang.bangla') }}" style="font-size:20px">বাংলা</a></li>
            @endif

            @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <li><a href="{{ route('login') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a></li>
            @if (Route::has('register'))
            <li><a href="{{ route('register') }}"><i class="fa fa-hand-o-right" aria-hidden="true"></i></a></li>
            @endif
            @endauth
            @endif
        </ul>
        <!-- primary-nav -->
    </nav>
    <!-- cd-nav -->
    <!--#####################
-----------END NAVBAR PART--------------
#####################-->
    <!--#####################
-----------STARTING HAEDER ADS--------------
#####################-->
    <div id="cd-search" class="cd-search">
        <form>
            <input type="search" placeholder="Search..."> </form>
    </div>
    <!--#####################
-----------part One--------------
@php
$headlines=DB::table('posts')
->join('categories','posts.cat_id','categories.id')
->join('subcategories','posts.subcat_id','subcategories.id')
->select('posts.*','categories.category_bn','subcategories.subcategory_bn')
->where('posts.headline',1)
->orderBy('id','DESC')
->limit(5)
->get()
@endphp
   
#####################-->
    <main class="cd-main-content">
      
        <div class="container">
            <div class="ads-details"> </div><br>
            {{-- /.....................// --}}
        <div class="row">
            <div class="col-md-1" style="background-color:rgb(248, 58, 58);padding:10px; text-align:center;">Headline</div>
            <div class="col-md-11" style="background-color:rgb(123, 204, 141); text-align:center;padding:8.5px;">
                <marquee behavior="" direction="right" scrollamount="12" style="height: 100%">
                    @foreach ($headlines as $headline )**{{ $headline->title_en }}**
                    @endforeach
                </marquee>
            </div>
        </div>
        <hr style="margin:0">

        <div class="row">
            <div class="col-md-1" style="background-color:rgb(19, 216, 124);padding:10px; text-align:center;">Notice</div>
            <div class="col-md-11" style="background-color:rgb(123, 204, 141); text-align:center;padding:8.5px;">
                <marquee behavior="" direction="right" scrollamount="12" style="height: 100%">
                    @foreach ($headlines as $headline )**{{ $headline->title_en }}**
                    @endforeach
                </marquee>
            </div>
        </div>

        
        
       
    </main>
{{-- //...................akhan thaka cut.........................../// --}}
@yield('content')

<!--
#####################
-----------part Footer Start--------------
#####################
-->



<section class="footer-top">
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <div class="footer-left920">
        <a href="#"><img src="img/Prothom-Alo.png" alt="Image"></a>
        </div>
        </div>
     <div class="col-md-6">
        <div class="footer-Right">
      <p>প্রথম আলো মোবাইল অ্যাপস ডাউনলোড করুন</p>
            <div class="applestore20">
           <a href="#"><img src="img/download.png" alt="Image"></a>
            </div>
             <div class="andriodstore20">
           <a href="#"><img src="img/androd.png" alt="Image"></a>
            </div>
        </div>
        </div>
    
    </div>
    
    
    
    </div>


</section>

<section class="footer9202">
<div class="container">
    <div class="row">
        <div class="footer-wrapper">
    <div class="col-md-2">
        <div class="footer-menu">
            <p><a href="#">প্রচ্ছদ</a></p>
            <p><a href="#">মতামত</a></p>
            <p><a href="#">রস+আলো</a></p>
       
        
        </div>
        
        </div> 
        <div class="col-md-2">
        <div class="footer-menu">
            <p><a href="#">বাংলাদেশ</a></p>
            <p><a href="#">মতামত</a></p>
            <p><a href="#">পাঁচমিশালি</a></p>
       
        
        </div>
        
        </div>  
        <div class="col-md-2">
        <div class="footer-menu">
            <p><a href="#">আন্তর্জাতিক</a></p>
            <p><a href="#">ফিচার</a></p>
            <p><a href="#">আমরা</a></p>
       
        
        </div>
        
        </div>
        <div class="col-md-2">
        <div class="footer-menu">
            <p><a href="#">অর্থনীতি</a></p>
            <p><a href="#">জীবনযাপন</a></p>
            <p><a href="#">শিল্প ও সাহিত্য</a></p>
       
        
        </div>
        
        </div>  
        <div class="col-md-2">
        <div class="footer-menu">
            <p><a href="#">খেলা</a></p>
            <p><a href="#">বিজ্ঞান ও প্রযুক্তি</a></p>
            <p><a href="#">শিক্ষা</a></p>
       
        
        </div>
        
        </div>   
        <div class="col-md-2">
        <div class="footer-menu">
            <p><a href="#"><span class="foote-icon290"><i class="fa fa-camera" aria-hidden="true"></i></span>ছবি</a></p>
            <p><a href="#"><span class="foote-icon290"><i class="fa fa-video-camera" aria-hidden="true"></i></span>ভিডিও</a></p>
            <p><a href="#"><span class="foote-icon290"><i class="fa fa-file-archive-o" aria-hidden="true"></i></span>আর্কাইভ</a></p>
       
        
        </div>
        
        </div>
          
        </div>
      <hr>
        <div class="another-menu83289">
           <div class="col-md-8">
        <a href="#">ই-পেপার</a>
        <a href="#">বিজ্ঞাপন</a>
        <a href="#">সার্কুলেশন</a>
        <a href="#">পবিত্র হজ</a>
        <a href="#">দূর পরবাস</a>
        <a href="#">উত্তর আমেরিকা</a>
               
            </div>
            <div class="col-md-4">
            <p>Prothom Alo is the highest circulated and most read newspaper in Bangladesh. The online portal of Prothom Alo is the most visited Bangladeshi and Bengali website in the world.</p>
                <p>Privacy Policy</p>
            
            </div>
        
        </div>
          <div class="another-menu2591">
           <div class="col-md-12">
        <a href="#"><span class="foote-icon939"><img src="{{ asset('palo/img/2221_icon%20(1).png') }}" alt="IMage"></span>২২২১</a>
               <a href="#"><span class="foote-icon939"><img src="{{ asset('palo/img/trust_icon.png') }}"></span>ট্রাস্ট</a>
               <a href="#"><span class="foote-icon939"><img src="{{ asset('palo/img/pchinta_icon.png') }}" alt="Image"></span>প্রতিচিন্তা</a>
               <a href="#"><span class="foote-icon939"><img src="{{ asset('palo/img/chakridot_icon.png') }}" alt="Image"></span>চাকরি ডটকম</a>
               <a href="#"><span class="foote-icon939"><img src="{{ asset('palo/img/abcradio_icon.png') }}" alt="Image"></span>abc রেডিও</a>
      <a href="#"><span class="foote-icon939"><img src="{{ asset('palo/img/590679d8369d61d451b1076ef176926d-593e579b0f1b3.png') }}"></span></a>
      
               
            </div>
        
        </div>
    
    
    </div>
    
    
    </div>

</section>

<section class="last-footer9329">
<div class="container">
    <p>Copywright by Mizanur_Rashed_{{  date('Y') }}</p>
   
    
    </div>

</section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('palo/js/jquery-3.1.1.min.js') }}"></script>
    <script src=" {{ asset('palo/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('palo/js/jquery.mobile.custom.min.js') }}"></script>
    <script src="{{ asset('palo/js/main.js') }}"></script>
    <!-- Resource jQuery -->
    <script>
        $(document).ready(function () {
            $('ul.tabs li').click(function () {
                var tab_id = $(this).attr('data-tab');
                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');
                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            });
        });
    </script>
</body>

</html>