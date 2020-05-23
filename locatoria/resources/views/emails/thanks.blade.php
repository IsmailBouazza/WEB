<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('css')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/plugins/CSSPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/easing/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenLite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>
    <div id="app">
        <main class="py-4">

            <div class="center">
                <div class="slider__wrapper">
                    <span class="slider"></span>
                    <span class="slider__text">HELLO!</span>
                </div>
            </div>

            <div class="msg">
                <span style="font-size: 2.5em">Hey <?php echo $name ?>,</span><br><br>


                    I’m Ghassane, the founder of Locatoria and I’d like to personally thank you for signing up to our service.<br>

                    We established Locatoria in order to make life easy for you, here you can find everything u will need .<br>

                    I’d love to hear what you think of our service and if there is anything we can improve. If you have any questions, please reply to an email that you will find it in your gmail mailbox. I’m always happy to help!<br><br>

                    <span style="font-weight: bold">Ghassane.</span>

            </div>

            <a href="{{url('/home')}}"><button style="margin-left: 50%; font-size:2em;" type="button" class="btn btn-dark">Get Started</button>


        </main>
        @include('inc.footer')
    </div>
</body>
</html>



<script>
// Developer Info - Arjun (https://github.com/arjun0108)

$(window).on('load', function(){
	slider();
});
function slider(){
	// Right To Left
	TweenLite.to('.slider', 0.5, {height:"100%", ease:Ease.easeOut});
	TweenLite.to('.slider', 0, { width: "100%", delay:0.5, ease: Power4.easeInOut});
	TweenLite.to('.slider', 0, { width: "1.4em", left:'0', right:'initial', delay:1, ease: Power4.easeInOut, onComplete:rtl});
	// Left To Right 
	TweenLite.to('.slider', 0, {width:"100%", delay:'4.5', ease: Power4.easeInOut, onComplete:ltr});
	TweenLite.to('.slider', 0, {width:"100%", left:'initial', right:'0', delay:'5'});
	TweenLite.to('.slider', 0.1, {width:"1.4em", height:'0%', delay:'5.5',ease:Ease.easeOut});

	function rtl(){ TweenLite.to('.slider__text', 0 , {opacity:'1', delay:'0'}); }
	function ltr(){ TweenLite.to('.slider__text', 0.5 , {opacity:'0', delay:'0.2'}); }
}
</script>

