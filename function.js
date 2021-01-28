function singleDelete(data,name)
{
	console.log(routes[data]);
	var r = confirm('Are you sure you want to DELETE "'+routes[data].name+'"');
	  if (r == true) {
	  	console.log('\nsingleDelete() ::: confirmed is deleted');

	  	// $.get('routes_operation.php');
	  	$.post('routes_operation.php?method=deleteBySingle', 
	 	{
	 		routes: routes,
	 		id: data,
	 		name: name,
	 	}, 
		    function(returnedData){
		         console.log(returnedData);
		         location.reload(true);
		}).fail(function(){
		      console.log("error");
		});

	  } else {
	  	console.log('\nsingleDelete() ::: confirmed is cancelled');
	  }
}


function displayRouteList()
{
	var htmlWrap = "";
	var button = "";
	for(var i=0; i<routes.length; i++){
		if(i==0)
		{
			button = "&nbsp;";
		}
		else
		{
			button = "<button onclick='singleDelete("+i+","+'"'+routes[i].name+'"'+")'>DELETE</button>";
		}

		htmlWrap += "<tr><td>"+routes[i].name+"</td><td>"+routes[i].path+"</td><td>"+routes[i].url+"</td><td>"+button+"</td>";
	}
	$("#route_list > tbody").html(htmlWrap);
}


function runAdd()
{
	var name = $('#name').val();
	var page_data = {
		'page_type' : $('#page_type').val(),
		'title_header_type' : $('#title_header_type').val(),
		'menu_types' : $('#menu_types').val(),
	};

	if($.trim(name) == ''){
		alert("Please Enter Value of Page Title");
	}
	else
	{
		var nameList = [];
		$.each(routes,function(index,valueOf){
			var res = valueOf.name;
			nameList.push(res.toLowerCase());
		});

		var lowername = name.split(' ').join('_').toLowerCase(); //(from title name to variable name)
		if(jQuery.inArray(lowername, nameList) !== -1)
		{
			// console.log("page exists");
			alert("Page Exists");
		}
		else
		{
			// console.log("page not exists")
			$.post('routes_operation.php?method=addSingleRecord', 
		 	{
		 		routes: routes,
		 		name: name,
		 		page_data: page_data,
		 	}, 
			    function(returnedData){
			         console.log(returnedData);
			         location.reload(true);
			}).fail(function(){
			      console.log("error");
			});
		}




		
	}
 
}