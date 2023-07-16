<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LangController extends Controller
{
    //
    public function techWeb_langChange(Request $request)
    {

        // language setting function end
        $language = Language::where('language',$request->lang)->first();
        $language->status = 1;
        $language->save();



        $languagess =  Language::where('language','!=',$request->lang)->get();

        foreach ($languagess as $language){

            $update=Language::find($language->id);
            $update->status = 0;
            $update->save();
        }
        Alert::toast('Language Updated Successfully', 'Toast Type');

        return back();
    }

    // language setting function end

}
