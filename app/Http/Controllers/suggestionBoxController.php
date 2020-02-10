<?php

namespace App\Http\Controllers;

use DB;
use App\Models\suggestionBox;

use Illuminate\Http\Response;

use Illuminate\Http\Request;

use App\Http\Requests;

class suggestionBoxController extends Controller
{
    function shows() {
    
         return view('tools_include_suggest_box.suggestions');
    }

    function show_suggest() {
        
         return view('tools_include_suggest_box.showSuggestions');
    }

    function creates(Request $request){

        $input = $request->only(['subject', 'suggestion']);
        $SuggestionBox = new suggestionBox();
        $suggest = $SuggestionBox->suggestion($input);

        return response()->json($suggest);

    }

    function updates(Request $request){

       // return "Am here";

        $input = $request->input('id');
        $SuggestionBox = new suggestionBox();
        $suggest = $SuggestionBox->updates($input);

        return response()->json($suggest);

    }

    function retrieves(){
        
        $SuggestionBox = new suggestionBox();
        $suggest = $SuggestionBox->retrieveSuggest();

        return response()->json($suggest);

    }
}
