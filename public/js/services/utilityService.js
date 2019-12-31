App.service('utilityService', ['$http', '$q', 'APP_Config', function($http, $q, APP_Config)
{
	/*Description*/
	/*Provides General utility function to the web app.*/
	
	/*Attributes*/
	//this.test = 0;
	
	/*Methods*/

	/**
	*	@Description:	Allows for the printing of console log message only when the debug option is turned on.
	*
	*	@param:	messages (String) - The message to be printed to the conosole.
	*
	*	@return: (Void)
	*/
    this.console_log = function (message)
	{
		if(APP_Config.Debug == true)
		{
			console.log(message);
		}
	}


	/**
	*	Discription: Returns the value of the named request vairiable
	*
	*	@para (String) name - the name of the get request variable sent in the url
	*
	*	@return (void)
	*/
	this.get = function (name)
	{
		if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
				return decodeURIComponent(name[1]);
	}


	/**
	*	Discription: Returns the value of the named request vairiable
	*
	*	@para (String) name - the name of the get request variable sent in the url
	*
	*	@return (void)
	*/
	this.get_date_string = function (date_string)
	{
			//Variables
			//alert(date_string);
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
	
}]);