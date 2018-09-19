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


function Show_Photo() 
{
	function lightboxPhoto() {
	
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'fast',
			slideshow:5000,
			theme:'light_rounded',
			show_title:false,
			overlay_gallery: false
		});
	
	}
	
		if(jQuery().prettyPhoto) {
	
		lightboxPhoto(); 
			
	}
	
	
	if (jQuery().quicksand) {

	 	// Clone applications to get a second collection
		var $data = $(".portfolio-area").clone();
		
		//NOTE: Only filter on the main portfolio page, not on the subcategory pages
		$('.portfolio-categ li').click(function(e) {
			$(".filter li").removeClass("active");	
			// Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
			var filterClass=$(this).attr('class').split(' ').slice(-1)[0];
			
			if (filterClass == 'all') {
				var $filteredData = $data.find('.portfolio-item2');
			} else {
				var $filteredData = $data.find('.portfolio-item2[data-type=' + filterClass + ']');
			}
			$(".portfolio-area").quicksand($filteredData, {
				duration: 600,
				adjustHeight: 'auto'
			}, function () {

					lightboxPhoto();
							});		
			$(this).addClass("active"); 			
			return false;
		});
		
	}//if quicksand
}



/*$[G-P]$*/