<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class suggestionBox extends Model
{
    function suggestion ($suggest){

        $subject = $suggest['subject'];
        $suggestion = $suggest['suggestion'];

        $SuggestBox = DB::insert("insert into suggestions (suggestion,subject) values (?,?)", [$subject, $suggestion]);

        return $SuggestBox;

    }

    public function retrieveSuggest()
    { 
        $Suggest = DB::select("SELECT *FROM suggestions where status <> 3");               
        return $Suggest;
    }

    public function updates($id)
    { 
        $Suggest = DB::update('update suggestions set status = 3 where id = ?', [$id]);              
        return $Suggest;
    }
}
