
<html lang="ja">
<head>
    <title>ServoMotor</title>
    
    <style>
    	div#id1 {border-style:solid;border-width:1px;}
    </style>
    
</head>
<body>

<input type="button" class="init_btn" value="Init">
<span class="init_res">Not executed</span>
<br>

<input type="button" class="test_btn" value="Test">
<span class="test_res">Not executed</span>
<br>

<br>
Min:102 - Mid:296 - Max:492<br>
<?php
for($idx=1;$idx<=16;$idx++)
{
?>
<div>
    Port:<?php echo $idx; ?>
    <input id="mov_val<?php echo $idx; ?>" type="text" size="3" value=296>
    <input type="button" class="mov_btn<?php echo $idx; ?>" value="Mov">
    <span id="mov_vals<?php echo $idx; ?>">296</span>
    <span id="spansubl<?php echo $idx; ?>" style="border-style:solid;border-width:1px; "><<</span>
    <span id="spansub<?php echo $idx; ?>"  style="border-style:solid;border-width:1px;color:red; ">[Sub]</span>
    <span id="spanadd<?php echo $idx; ?>"  style="border-style:solid;border-width:1px;color:blue;">[Add]</span>
    <span id="spanaddl<?php echo $idx; ?>" style="border-style:solid;border-width:1px;">>></span>
    <span class="movmsg<?php echo $idx; ?>">Msg</span>
</div>
<?php
}
?>


<br>
<br>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$(function(){
    $('.init_btn').click(function(){
        $('.init_res').html('Running...');
        $.ajax({
            url: 'init.php',
            type: 'POST',
        }).done(function(data){
            $('.init_res').html('Ok');
        }).fail(function(data){
            $('.init_res').html('Err');
        });
    });
    $('.test_btn').click(function(){
        $('.test_res').html('Running...');
        $.ajax({
            url: 'test.php',
            type: 'POST',
        }).done(function(data){
            $('.test_res').html('Ok');
        }).fail(function(data){
            $('.test_res').html('Err');
        });
    });
<?php for($idx=1;$idx<=16;$idx++) { ?>
    $('.mov_btn<?php echo $idx; ?>').click(function(){
        
        $( '#mov_vals<?php echo $idx; ?>' ).text( document.getElementById("mov_val<?php echo $idx; ?>").value );
        
        movexec( "mov_vals<?php echo $idx; ?>"
               , ".movmsg<?php echo $idx; ?>"
               , <?php echo ($idx - 1 ) * 4 + 8; ?>
               );
    });
<?php } ?>
});

window.onload = function () {

<?php for($idx=1;$idx<=16;$idx++) { ?>
    <?php
    $array = array( "spanadd" . $idx
                  , "spansub" . $idx
                  , "spanaddl" . $idx
                  , "spansubl" . $idx
                  );
    foreach($array as $value){
    ?>
    
        var $Element<?php echo $value; ?> = document.getElementById( "<?php echo $value; ?>" );
        
        $Element<?php echo $value; ?>.onmousedown = function ( $event ) 
        {
            if( $event.button == 0 )
            {
                $intervalID = setInterval(
                    function()
                    {
                        countUpDown( "mov_vals<?php echo $idx ; ?>"
                                   , <?php
                                         if( $value == "spanadd" . $idx
                                          || $value == "spanaddl" . $idx)
                                             echo 1;
                                         else
                                             echo -1;
                                     ?>
                                   );
                    },
                    <?php
                        if( $value == "spanaddl" . $idx
                         || $value == "spansubl" . $idx)
                            echo 0;
                        else
                            echo 10;
                    ?>
                );
            }
        }
        
        $Element<?php echo $value; ?>.onmouseup = function ( $event ) 
        {
            if( $event.button == 0 )
            {
                clearInterval( $intervalID );
                movexec( "mov_vals<?php echo $idx ; ?>"
                       , '.movmsg<?php echo $idx ; ?>'
                       , <?php echo ($idx - 1 ) * 4 + 8; ?>
                       );
//                $("mov_vals<?php echo $idx ; ?>").value = "mov_vals<?php echo $idx ; ?>".innterHTML;
            }
        }
        
    <?php
    }
    ?>
<?php } ?>
}
function countUpDown( $textbox , $n ) {
//    $('.test_res').html( "[" + $textbox + "]" );
//    $('.test_res').html( "[" + $( '#' + $textbox).text() + "]" );
    var dat = parseInt( $( '#' + $textbox ).text() ) + $n;
    
    if( dat < 102 )
    {
        dat = 102;
    }
    if( dat > 492 )
    {
        dat = 492;
    }
    
    $( '#' + $textbox ).text( dat );

}
function movexec( $fldval , $fldmsg , $portno )
{
        $($fldmsg).html('Running...');
        $actno = $( '#' + $fldval ).text();
        $.ajax(
            { url: 'mov.php'
            , type: 'POST'
            , data:
                { 'actno': $actno
                , 'portno': $portno
                },
        }).done(function(data){
            $($fldmsg).html(data);
            
        }).fail(function(data){
            $($fldmsg).html('Err');
        });
        
}

// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

</script>

</body>
</html>

