//赞 js
function request(thing_id){
 $.post("../Things/AddRequest.php", { "thing_id": thing_id },
   function(data){
     if(data=="ok")
	 {}
	 else{
    alert("对不起，失败了！");
   }
   }, "text");  
  //获取当前“赞”的次数并加1
  var request = parseInt($(".request"+thing_id).html())+1;
  //更新“赞”的次数
  $(".request"+thing_id).html(request);
}