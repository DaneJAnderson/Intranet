<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Gallery;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Utility;
use App\Exceptions\customValidationException;
use Exception;
//use App\Http\Middleware\Session_Manager;

class galleryController extends Controller
{
	public function getGalleries(Request $request)
	{	
		//Variables
		$Gallery = new Gallery();
		$Galleries = $Gallery->Galleries();
		
		return response()->json($Galleries);
	}


	/*public function getArticleByID(Request $request, $id)
	{	
		//Variables
		$Article = new Article();
		$Utility = new Utility();
		$article_id = $id;

		if(isset($article_id) && $article_id!=NULL)
		{
			if(!empty($article_id) && is_numeric($article_id))
			{
				$article_id=$Utility->Clean_Data($article_id);
			}
			else
			{
				throw new customValidationException("A valid numeric Article ID is required");
			}
		}
		else
		{
			throw new customValidationException("Article ID required");
		}

		$articles = $Article->Articles_by_ID($article_id);

		return response()->json($articles);
	}*/
}