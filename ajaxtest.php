<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<a href="http://google.com">Google</a>
<script type="text/javascript">
$(function(){
    $("a[href^='http://']").attr("target","_blank");
});
</script>
<script type="text/javascript">
$.ajax({
     success : function(response){
         alert('成功');
     },
     error: function(){
         //通信失敗時の処
         alert('通信失敗');
     }
 });
</script>

