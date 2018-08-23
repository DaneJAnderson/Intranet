<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Document;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Utility;
use App\Exceptions\customValidationException;
use Exception;
//use App\Http\Middleware\Session_Manager;

class documentController extends Controller
{
	public function getDocumentTypes(Request $request)
	{	
		//Variables
		$Document = new Document();
		$Documents = $Document->Document_Types();
		
		return response()->json($Documents);
	}


	public function getDocumentByID(Request $request)
	{	
		//Variables
		$Document = new Document();
		$Utility = new Utility();
		$document_id = $request->input('type');

		if(isset($document_id) && $document_id!=NULL)
		{
			if(!empty($document_id) && is_numeric($document_id))
			{
				$document_id=$Utility->Clean_Data($document_id);
			}
			else
			{
				throw new customValidationException("A valid numeric document ID is required");
			}
		}
		else
		{
			throw new customValidationException("document ID required");
		}

		$documents = $Document->Document_by_Types($document_id);

		return response()->json($documents);
	}
}