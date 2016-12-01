$(function(){
	// 获取表格信息
	addtable();
	// 绑定删除按钮事件
	$("body").on("click",".delete",function(){
		var uid = parseInt($(this).closest("tr").children(".id").html());
		$.ajax({
			url: "/php/deleteuser.php",
			type: "POST",
			dataType: "json",
			data: {id: uid},
			success:function(data){
				if(data.success != undefined){
					alert("删除成功");
					// 重新加载表格
					addtable();
				}else{
					alert("数据库连接失败");
				}
			},
			error:function(data){
				alert("服务器链接失败");
			}
		});
		
	});
	// 绑定更新按钮事件
	$("body").on("click",".update",function(){
		var uid = parseInt($(this).closest("tr").children(".id").html());
		window.location.href= "/html/adduser.html?id="+uid;
	});
});

// 加载表格数据
function tableadddata(data){
	for(var i=0; i<data.length; i++){
		var label = '<tr>'
						+'<td class="id">'+data[i].id+'</td>'
						+'<td>'+ data[i].username+'</td>'
						+'<td>'+data[i].age+'</td>'
						+'<td>'
							+'<a href="#" class="delete">删除</a>|'
							+'<a href="#" class="update">更新</a>'
						+'</td>'
					+'</tr>';
		$("tbody").append(label);
	}
}

// 异步加载表格数据
function addtable(){
	$.ajax({
		url: "/php/userall.php",
		type: "POST",
		dataType: "json",
		data: {action: "all"},
		success:function(data){
			if(data.success != undefined){
				// 清理表格
				$("tr").has("td").remove();
				// 加载表格数据
				tableadddata(data.data);
			}else{
				// 输出错误信息
				alert("数据库信息获取失败！");
				console.log(data.error);
			}
		},
		error:function(){
			alert("服务器链接失败！");
		}
	});
}