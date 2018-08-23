/*
*	Authors		: Gavin Palmer
*	Author URL	: http://www.gp-tech-co.com
*	Project		: The Tech Store
*	License		: 
*	License URL	: 
*/

/**
*	Discription: Returns the value of the named request vairiable
*
*	@para (String) name - the name of the get request variable sent in the url
*
*	@return (void)
*/
function get(name)
{
	if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
			return decodeURIComponent(name[1]);
}

function get_date_string(date_string)
{
		//Variables
		var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"];
		
		var date = new Date(date_string);
		var day = date.getDate();
		var monthIndex = date.getMonth();
		var year = date.getFullYear();
		
		//false to return a date
		if(isNaN(day) || isNaN(monthIndex) || isNaN(year))
		{
			return "";
		}
		
		return  monthNames[monthIndex]+' '+day+', '+year;
}


function lazy_load_images()
{
	$('.photo').each(function()
		{
			var photo_address = $(this).attr("photo_address");
			var img = $(this);
			img.attr("src", photo_address);
		});
}



/*$[G-P]$*/