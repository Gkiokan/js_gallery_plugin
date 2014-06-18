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
        
        for($i=1; $i<=10; $i++){
            
            $r = rand_color();
            $g = rand_color();
            $b = rand_color();
            
            echo "<li><a href='#' data-url='$i'> <div  style='background:rgba($r,$g,$b,1)'>$i</div> </a></li>";
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
            body { padding:0px; margin:0px; }
            
            .preview { display: block; margin:0px auto; width:500px; height:300px; border:0px solid blue; position: relative;}
            .preview ul { list-style:none; border:0px solid green; margin:0px; padding:0px; }
            .preview ul li { width:100%; height:100%; display: none; border: 0px solid red; margin:0px; padding: 0px; position: absolute; }
            .preview ul li div { width:100%; height:100%; display: block; }
            .preview ul .active { display: inherit; }
            
            .control_panel { width:100%; height:auto; background: rgba(0,0,0,.9); }
            .control_panel a { margin:5px 10px; padding:5px 10px; border: 1px solid gray; display: inline-block; border-radius:5px; box-shadow:0px 0px 2px #555; }
            .control_panel a:hover { box-shadow:0px 0px 10px #555; }
            .control_panel .first { background: rgba(255,200,155, .7); }
            .control_panel .next { background: rgba(155,200,255, .7); }
            .control_panel .play { background: rgba(10,200,10, .7); }
            .control_panel .stop { background: rgba(200,10,10,.7);}
            
            .debug { border: 1px solid green; font-family:sans-serif; font-size:10px; height:200px; overflow: scroll; }
        </style>
        
        <h1>JS Gallery Engine</h1>
        <h4>by Gkiokan Sali</h4>
        
        <div class='preview'>
            <ul>
                <? list_thumb(); ?>
            </ul>
            
        </div>
        
        <div class='control_panel'>
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
                div = el.children();
            
            var debug = $('.debug');
            
            var start_check = $('.preview ul li').hasClass('active');
            
            function add_debug(input){
                debug.prepend(input+"<br>");
                debug.scrollTop();
            }
            console.log(preview+ul+li+el);
            
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
                add_debug('start diashow');
            })
            
            $('.stop').on('click', function(){
                clearInterval(dia);
                add_debug('stop diashow');
            });
        });
        </script>
        
    </body>
</html>