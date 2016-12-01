$(function(){
	// 获取表格信息
	addtable();
});

// 加载表格数据
function tableadddata(data){
	for(var i=0; i<data.length; i++){
		var label = '<tr>'
						+'<td>'+data[i].id+'</td>'
						+'<td>'+ data[i].username+'</td>'
						+'<td>'+data[i].age+'</td>'
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