App.factory('cartItemFactory', ['$http','$q', 'APP_Config', 'productsFactory', 'shoppingCartService',function($http,$q, APP_Config, productsFactory, shoppingCartService)
{
	/*[Description]*/
	/*This Factory contains attributes and functions for the shopping code item*/
	
	var cartItemFactory = {};//empty oject that will store multiple function and Values
	
	/*[Attributes]*/
	cartItemFactory.shoppingCartServiceItem = null;
	cartItemFactory.Product = null;
	
	
	
	/*[Methods]*/
	
	/**
	*	@Description:	Constructor function for the cartItemFAcroty Class
	*
	*	@param:	(Void)
	*
	*	@return: (Object) - The instance of a cartItemFactory object
	*/
	var cartItemFactory = function()
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
    cartItemFactory.gettest = function()
	{
		Item = {};
		
		//Item.ID = cartItem.ID;
		
		 return Item;
    };
	
	
    return cartItemFactory; //return the cartItem object
}]);