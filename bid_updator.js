
try{
var xmlHttp=new XMLHttpRequest();
//document.getElementById("abc").innerHTML="<p>gsff</p>";
}
catch(e)
{
	alert("error in xml object");
}

var flag=1;
var c,bid;


function timedCount() {
	if(c<=0)
	{
		c=30;
		flag=0;
		if(xmlHttp.readyState==0 || xmlHttp.readyState==4)
		{
			//document.getElementById("abc").innerHTML="changeauction called";
			xmlHttp.open("GET","change_auction_player.php",true);
			xmlHttp.onreadystatechange=free_the_flag;
			xmlHttp.send(null);
		}
		
	}
    document.getElementById("txt").innerHTML= c;
    c = c - 1;
	
    setTimeout(function(){ timedCount() }, 1000);
}

function free_the_flag()
{
	
	flag=1;
}
function bid_update()
{
		if(xmlHttp.readyState==0 || xmlHttp.readyState==4)
		{
			bid=(document.getElementById("bid_field").innerHTML);
			
			//var xmlHttp=new XMLHttpRequest();
			xmlHttp.open("GET","get_bid_update.php",true);
			xmlHttp.onreadystatechange=handleServerResponse;
			xmlHttp.send(null);
		}
		else
		{
		setTimeout('bid_update()',1000);
		}
	
}

function handleServerResponse()
{
	//document.getElementById("abc").innerHTML=c;
	if(xmlHttp.readyState==4)
	{
		
		if(xmlHttp.status==200)
		{
			
			
			/*xmlResponse=xmlHttp.responseXML;
			xmlDocumentElement=xmlResponse.documentElement;
			new_data=xmlDocumentElement.firstChild.data.split(",");
			document.getElementById("abc").innerHTML=new_data[0]; */ 
			response=xmlHttp.responseText.split(",");
			if(bid!=response[0])
			{
				document.getElementById("bid_field").innerHTML=response[0];
				document.getElementById("team_field").innerHTML=response[1];
				document.getElementById("player_field").innerHTML=response[2];
				c=30;
			}
			
			//alert(response[0]);
			//document.getElementById("abc").innerHTML=response;
			setTimeout('bid_update()',1000);
		}
		else
		{
			alert("something went wrong");
		}
	}

}
