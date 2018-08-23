App.factory('productsFactory', ['$http','$q', 'APP_Config',function($http,$q, APP_Config)
{
	/*Description*/
	/*This Factory holds a standuart product item, with all its attributes and related funtions*/
	
	var productsFactory = {};//empty oject that will store multiple function and Values
	
	/*Attributes*/
	productsFactory.ID = 0;
	productsFactory.Name = "";
	productsFactory.Amount = 0;
	productsFactory.Selections = [];
	
	
	
	/*Methods*/
	
	/**
	*	@Description:	Constructor function for the productsFactory Class
	*
	*	@param:	(Void)
	*
	*	@return: (Object) - The instance of a productsFactory object
	*/
	var productsFactory = function()
	{
		//this.cartItem = cartItem;
	};

	/**
	*	@Description:	
	*
	*	@param:	(Void)
	*
	*	@return: (JSON ARRAY) - 
	*/
    productsFactory.getProductObject = function()
	{
		Item = {};
		
		Item.ID = productsFactory.ID;
		Item.Name = productsFactory.Name;
		Item.Amount = productsFactory.Amount;
		Item.Selections = productsFactory.Selections;
		
		 return Item;
    };
	
	
    return productsFactory; //return the event object
}]);