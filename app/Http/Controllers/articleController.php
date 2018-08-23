<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Article;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Utility;
use App\Exceptions\customValidationException;
use Exception;
//use App\Http\Middleware\Session_Manager;

class articleController extends Controller
{
	public function getLatestArticles(Request $request)
	{	
		//Variables
		$Article = new Article();
		$Articles = $Article->Lastest_Articles();
		
		return response()->json($Articles);
	}


	public function getArticleByID(Request $request, $id)
	{	
		//Variables
		$Article = new Article();
		$Utility = new Utility();
		$article_id = $id;
		/*$Session_Manager = new Session_Manager();
		$Session_Object = $Session_Manager->get_Session_Object($request);
		$Session_Object = (array) $Session_Object;*/

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
	}
}