/* global $ */
$(document).ready(function()
{
	if(window.localStorage && window.sessionStorage)
	{
		var licznik=document.createElement("h6");
		licznik.className="licznik";
		
		if(localStorage.getItem("allviews")==null)
			localStorage.setItem("allviews", "1");
		else
			{
				var allviews=localStorage.getItem("allviews");
				++allviews;
				localStorage.setItem("allviews", allviews);
			}
		if(sessionStorage.getItem("noviews")==null)
			sessionStorage.setItem("noviews", "1");
		else
			{
				var noviews=sessionStorage.getItem("noviews");
				++noviews;
				sessionStorage.setItem("noviews", noviews);
			}
			
		var liczniktekst=document.createTextNode("Ogólnych wyświetleń:" +localStorage.getItem("allviews") +". Teraz wyświetleń:" +sessionStorage.getItem("noviews"));
		
		licznik.appendChild(liczniktekst);
		document.getElementsByTagName("footer")[0].appendChild(licznik);
	}
	
	var h3=document.getElementsByTagName("h3");
	
	for (var i=0; i<h3.length; i++)
	{
		h3[i].className="red";
	}
	
		$("#panel").addClass("hover");
		
		$(document).ready(function(){
			$("#flip").click(function(){
			$("#panel").slideToggle("slow");		
			});
		});
	
	
	
		$(".wpis").addClass("open");
		$(".obrazek.left").addClass("obraz");
		
		$(".wpis.ciekawostka").removeClass("ciekawostka").addClass("tabs3");	
		$("#flip").addClass("middle");
		$("#panel").addClass("middle");
		$(".obrazek.right").addClass("obraz2");
		
		$(".block").addClass("right");
		$(".hide").removeClass("hide");
		$("ul").addClass("center");
	
	
		$(function() {
				$( "#tabs" ).tabs({
				event: "mouseover"
			});
		});

		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
}
);

function showHint(str) 
{
	if (str.length == 0) {
		document.getElementById("txtHint").innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "front_controller.php?action=/ajax&q=" + str, true);
		xmlhttp.send();
	}
}

