<?  /* * * * * * * * *  * * *
     *  Project: JS Gallery Engine
     *  Author: Gkiokan Sali
     *  Date: 12.06.2014
     *  * * * * * * * * * * * * */

    function rand_color(){
        $var  = rand(1,255);
        return $var;
    }
    
    function list_thumb(){
        $bg = array(
                    'http://www.hdwallsource.com/img/2014/8/green-background-pictures-17225-17781-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/5/green-flower-17355-17913-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/11/cool-light-green-wallpaper-24333-24993-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/2/cool-wallpapers-hd-8086-8417-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/8/green-background-pictures-17225-17781-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/5/green-flower-17355-17913-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/11/cool-light-green-wallpaper-24333-24993-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/2/cool-wallpapers-hd-8086-8417-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/8/green-background-pictures-17225-17781-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/5/green-flower-17355-17913-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/11/cool-light-green-wallpaper-24333-24993-hd-wallpapers.jpg',
                    'http://www.hdwallsource.com/img/2014/2/cool-wallpapers-hd-8086-8417-hd-wallpapers.jpg'                    
                   );
        for($i=1; $i<=10; $i++){
            
            $r = rand_color();
            $g = rand_color();
            $b = rand_color();
            
            $bg_call = $bg[$i];
            
            echo "<li><a href='#' data-url='$i'> <div  style='background:rgba($r,$g,$b,1);background-image: url($bg_call); background-size:cover;'> </div> </a></li>";
        }
    }

?>

<html>
    <head>
        <title>JS Gallery Engine</title>
        <script src="assets/jquery-1.11.1.js"></script>
    </head>
    
    <body>
        <style>
            body { padding:0px; margin:0px; font-family: sans-serif; }
            
            .preview {
                /*width:500px; height:300px;*/
                width:100%; height:100%;
                display: block; margin:0px auto; border:0px solid blue;
                position: fixed; top:0px; right:0px; left:0px; bottom:0px; z-index:-10;
            }
            .preview ul { list-style:none; border:0px solid green; margin:0px; padding:0px; }
            .preview ul li { width:100%; height:100%; display: none; border: 0px solid red; margin:0px; padding: 0px; position: absolute; }
            .preview ul li div { width:100%; height:100%; display: block; font-size:100%; }
            .preview ul .active { display: inherit; }
            
            .control_panel { display: inline-block; padding: 20px; height:auto; background: rgba(255,255,255,.7); z-index:10; position: fixed; bottom:10%; left:0px; box-shadow:0px 0px 5px #000; }
            .control_panel a { margin:5px 10px; padding:5px 10px; border: 1px solid gray; display: inline-block; border-radius:5px; box-shadow:0px 0px 2px #555; }
            .control_panel a:hover { box-shadow:0px 0px 10px #555; }
            .control_panel .first { background: rgba(255,200,155, .7); }
            .control_panel .next { background: rgba(155,200,255, .7); }
            .control_panel .play { background: rgba(10,200,10, .7); }
            .control_panel .stop { background: rgba(200,10,10,.7);}
            
            .debug { border: 1px solid green; font-family:sans-serif; font-size:10px; height:200px; overflow: hidden; position: absolute; right:0px; top:100px; }
        
            .container { background: #fff; padding: 20px; display: block; margin:0px auto; max-width:970px; margin-bottom:20%; }
        </style>
        
        
        <div class='container'>
            <h1>JS Gallery Engine</h1>
            <h4>by Gkiokan Sali</h4>
            <hr>
            <br>
                <h2>Welcome to the Introduction of JS Gallery Engine</h2>
                <br>
                This will be a very little Plugin used with jQuery to perform a Gallery within your selected images.<br>
                You'll only need to declare your DIV Container which has the images listed in an unlisted form
                and the Plugin will make the rest for you.<br>
                <br>
                In this DEMO I'll show you the way of doing it with colors for now.<br>
                An Extended DEMO will be soon avaible with Images, too.<br>
                But there are not much difference at last the targets will be defined by CSS.<br>
                <br>
                <br>
                <h3>Prepare your Images or BackgroundColors</h3>
                <pre>
                    <?
                    $prepare_example = "
<div class='gallery'>
    <ul>
        <li><div style='background: #fda; background-image: url('IMAGE_URL_1'); background-size:cover;'> </div></li>
        <li><div style='background: #a5d; background-image: url('IMAGE_URL_2'); background-size:cover;'> </div></li>
        <li><div style='background: #4a5' data-src=''> Some Content if you wish </div></li>
        <li><div style='background: #dad' data-src=''> 2nd Condition for text </div></li>
        <li><div style='background: #f5b' data-src=''> Credit and specifications </div></li>
        <li><div style='background: #88a' data-src=''>  </div></li>
    </ul>
</div>";
                    echo htmlentities($prepare_example);
                    ?>
                </pre>
                <br>
                <br>
                <h3>1. Include the Plugin</h3>
                You'll need first to include jQuery (Plugin is actually using v1.10+)<br>
                Include the <b>js_gallery_engine.js</b> in your Code.<br>
                <pre> <?=htmlentities("<script src='PATH_TO_JS/jQuery URL'></script>"); ?></pre>
                <pre> <?=htmlentities("<script src='PATH_TO_JS/js.gallery_engine.js'></script>"); ?></pre>
                <br>
                <br>
                <h3>2. Select your DIV Container</h3>
                Either in the Code itself or before the code include use (for this example)<br>
                <pre> <?=htmlentities("
    <script>
        $(function(){
            var preview  = $('.gallery');
        });
    </script>");?> </pre>
                <br>
                <br>
                <br>
                <hr>
                    There will be an more detailed Tutorial and Example soon.<br>
                    This is just for you, to get an Idea what will be possible with it.<br>
                    <br>
                    Thanks.<br>
                    Gkiokan
        </div>
        
        
        <div class='preview'>
            <ul>
                <? list_thumb(); ?>
            </ul>
            
        </div>
        
        <div class='control_panel'>
            <h2>Gallery Controls</h2>
            <a href='#' class='control first' data-src='first'> first </a>
            <a href='#' class='control next' data-src='next'> next </a>
            <a href='#' class='control play' data-src='play'> play diashow</a>
            <a href='#' class='control stop' data-src='stop'> stop diashow</a>
        </div>
        
        <div class='debug'><b>Debug Code:<br></b></div>
        
        <script>
        $(function(){
            console.log('JS Gallery Engine Initialized');
            
            var preview = $('.preview'),
                ul = preview.children(),
                li = ul.children(),
                el = li.children(),
                div = el.children(),
                dia_i = 0;
            
            var debug = $('.debug');
            
            var start_check = $('.preview ul li').hasClass('active');
            
            function add_debug(input){
                debug.prepend(input+"<br>");
                debug.scrollTop();
            }
            // console.log(preview+ul+li+el);
            
            $('.first').on('click', function(){
                $('.preview ul li').fadeOut().removeClass('active');
                $('.preview ul li').first().fadeIn().addClass('active');
                add_debug('First el show');
            });
            
            $('.next').on('click', function(){
                var active = $('.preview ul .active'); /// li.hasClass('active');
                var next_li = active.next();
                if (next_li.children().html()==undefined) {
                    var next_li = $('.preview ul li').first();
                }
                
                var active_c = active.children().children().html();
                var next_c = next_li.children().children().html();
                add_debug('open '+next_c);
                active.fadeOut().removeClass('active');
                next_li.fadeIn().addClass('active');
            })
            
            if (!start_check){ $('.first').trigger('click'); add_debug('Trigger autoclick'); }
            
            
            $('.play').on('click',function(){
                dia = setInterval(function(){ $('.next').trigger('click'); }, 500);
                add_debug('start diashow '+dia);
                var dia_i = dia_i+1;
            })
            
            $('.stop').on('click', function(){
                    clearInterval(dia);
                    add_debug('stop diashow '+dia[dia_i]);
            });
        });
        </script>
        
    </body>
</html>