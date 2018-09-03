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


	public function getPhotosGalleryByID(Request $request, $id)
	{	
		//Variables
		$Gallery = new Gallery();
		$Utility = new Utility();
		$gallery_id=$id;

		if(isset($gallery_id) && $gallery_id!=NULL)
		{
			if(!empty($gallery_id) && is_numeric($gallery_id))
			{
				$gallery_id=$Utility->Clean_Data($gallery_id);
			}
			else
			{
				throw new customValidationException("A valid numeric Gallery ID is required");
			}
		}
		else
		{
			throw new customValidationException("Gallery ID required");
		}

		$photos = $Gallery->Photos($gallery_id);

		return response()->json($photos);
	}
}