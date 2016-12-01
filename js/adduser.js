$(function(){
	// 获取id值
	var reg = /\?id=(\d.*)$/;
	var result = reg.exec(window.location.href);
	if(result != null){
		var uid = parseInt(result[1]);
		// 获取用户数据
		$.ajax({
			url: "/php/selectuser.php",
			type: "POST",
			dataType: "json",
			data: {id: uid},
			success:function(data){
				// 加载数据
				adddata(data);
			},
			error:function(){
				alert("服务器链接失败！");
			}
		});
		
	}
});

// 加载数据
function adddata(data){
	$("#username").val(data.username);
	$("#password").val(data.password);
	$("#age").val(data.age);
}