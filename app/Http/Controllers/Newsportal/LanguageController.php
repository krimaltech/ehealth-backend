<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Video;
use App\Gallery;
use App\Advertisement;
use App\Detail;
use App\Member;
use App\Models\Newsmodel\Language;
use App\Models\Newsmodel\Menu;
use App\Models\Newsmodel\News;

class LanguageController extends Controller
{
    private $path='public/images/';

    public function __construct()
    {
        $this->middleware('admin');
        $this->random = substr(str_shuffle("0123456hdgafshgdfahaiudvfgybsauydgafueGFHFVDAHSFH"), 0, 5);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages= Language::orderBy('id','desc')->get();
        return view('admin.language.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'language'=>'required|unique:languages',
            'code'=>'required|unique:languages',
        ]);

       $code = trim(strtolower(substr($request->code, 0, 2)));

        // Add new BD Columns
        $this->db_language_add($code);
        $success = false;
        $language = Language::where("code", $code)->first();
        if (empty($language)) {
            // Generate Lang files
            if ($code == "en") {
                $success = true;
            } else {
                $success = \File::copyDirectory(base_path("resources/lang/en"), base_path("resources/lang/$code"));
            }
            if ($success) {
               
               $language= new Language;
                $language->user_id=Auth::user()->id;
                $language->language=$request->language;
                $language->code=$code;
                $language->status=$request->status ? 1:0;
                if ($request->image) {
                    $imageName = 'flag_'.$this->random . '_' . $request->file('image')->getClientOriginalName();
                    $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
                    $language->image = $imageName;
                }

                $language->save();
                return redirect()->route('language.index')->with('success','Language added successfully');
            }

        }
        
    return redirect()->route('language.index')->with('error','Something wrong');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return redirect()->route('language.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin.language.create',compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'language'=>'required|unique:languages,language,'.$language->id,

        ]);
        if($language->code=='en')
            { $status=1; } 
        else{
           $status=$request->status ? 1:0;
       }
       $language->language=$request->language;
       $language->status= $status;
       if ($request->image) {
        $oldImage = $this->path . $language->image;
        if (Storage::exists($oldImage)) {
            Storage::delete($oldImage);
        }

        $imageName = 'flag_'.$this->random . '_' . $request->file('image')->getClientOriginalName();
        $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
        $language->image = $imageName;
    }

    $language->update();
    return redirect()->route('language.index')->with('success','Language update successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $this->db_language_destroy($language->code);

                  if ($language->code == "en") {
                        $success = true;
                    } else {
                        $success = \File::deleteDirectory(base_path("resources/lang/" . $language->code));
                    }

               if($success){
                    $oldImage = $this->path. $language->image;
                    if (Storage::exists($oldImage)) {
                        Storage::delete($oldImage);
                    }
                    $language->delete();
                    return redirect()->route('language.index')->with('success','Language deleted successfully');
               }
                   

        return redirect()->route('language.index')->with('error','Something wrong');
    }

    public function db_language_add($code)
    {
       try {
            // menus table
        Schema::table('menus', function (Blueprint $table) use ($code) {
            $table->string('title_' . $code)->nullable();
            $table->longText('description_' . $code)->nullable();

        });
            // copy data to new language columns

        Menu::where('id', '>', 0)->update(['title_' . $code => DB::raw('title_en')]);
        Menu::where('id', '>', 0)->update(['description_' . $code => DB::raw('description_en')]);

    } 
    catch (\Exception $e) {
    }

    try {
            // news table
        Schema::table('news', function (Blueprint $table) use ($code) {
            $table->string('title_' . $code)->nullable();
            $table->longText('description_' . $code)->nullable();
            $table->string('seo_title_' . $code)->nullable();
            $table->text('seo_keywords_' . $code)->nullable();
            $table->text('seo_description_' . $code)->nullable();

        });
            // copy data to new language columns
        News::where('id', '>', 0)->update(['title_' . $code => DB::raw('title_en')]);
        News::where('id', '>', 0)->update(['description_' . $code => DB::raw('description_en')]);
        News::where('id', '>', 0)->update(['seo_title_' . $code => DB::raw('seo_title_en')]);
        News::where('id', '>', 0)->update(['seo_keywords_' . $code => DB::raw('seo_keywords_en')]);
        News::where('id', '>', 0)->update(['seo_description_' . $code => DB::raw('seo_description_en')]);

    } 
    catch (\Exception $e) {
    }

    try {
            // videos table
        Schema::table('videos', function (Blueprint $table) use ($code) {
            $table->string('title_' . $code)->nullable();
        });
            // copy data to new language columns

        Video::where('id', '>', 0)->update(['title_' . $code => DB::raw('title_en')]);
    } 
    catch (\Exception $e) {
    }
    try {
            // galleries table
        Schema::table('galleries', function (Blueprint $table) use ($code) {
            $table->string('title_' . $code)->nullable();
        });
            // copy data to new language columns

        Gallery::where('id', '>', 0)->update(['title_' . $code => DB::raw('title_en')]);
    } 
    catch (\Exception $e) {
    }
    try {
            // advertisements table
        Schema::table('advertisements', function (Blueprint $table) use ($code) {
            $table->string('title_' . $code)->nullable();
        });
            // copy data to new language columns

        Advertisement::where('id', '>', 0)->update(['title_' . $code => DB::raw('title_en')]);
    } 
    catch (\Exception $e) {
    }
    try {
            // details table
        Schema::table('details', function (Blueprint $table) use ($code) {
            $table->string('title_' . $code)->nullable();
            $table->text('description_' . $code)->nullable();
            $table->string('address_' . $code)->nullable();
        });
            // copy data to new language columns

        Detail::where('id', '>', 0)->update(['title_' . $code => DB::raw('title_en')]);
        Detail::where('id', '>', 0)->update(['description_' . $code => DB::raw('description_en')]);
        Detail::where('id', '>', 0)->update(['address_' . $code => DB::raw('address_en')]);
    } 
    catch (\Exception $e) {
    }

    try {
            // members table
        Schema::table('members', function (Blueprint $table) use ($code) {
            $table->string('name_' . $code)->nullable();
            $table->string('address_' . $code)->nullable();
            $table->text('description_' . $code)->nullable();
            $table->string('post_' . $code)->nullable();
        });
            // copy data to new language columns

        Member::where('id', '>', 0)->update(['name_' . $code => DB::raw('title_en')]);
        Member::where('id', '>', 0)->update(['address_' . $code => DB::raw('address_en')]);
        Member::where('id', '>', 0)->update(['description_' . $code => DB::raw('description_en')]);
        Member::where('id', '>', 0)->update(['post_' . $code => DB::raw('post_en')]);
    } 
    catch (\Exception $e) {
    }



}
public function db_language_destroy($code)
{
            try {
                    // menus table
            Schema::table('menus', function (Blueprint $table) use ($code) {
                $table->dropColumn('title_' . $code);
                $table->dropColumn('description_' . $code);
            });

            } catch (\Exception $e) {

            } 

            try {
                    // news table
            Schema::table('news', function (Blueprint $table) use ($code) {
                $table->dropColumn('title_' . $code);
                $table->dropColumn('description_' . $code);
                $table->dropColumn('seo_title_' . $code);
                $table->dropColumn('seo_keywords_' . $code);
                $table->dropColumn('seo_description_' . $code);
            });

            } catch (\Exception $e) {

            } 

            try {
                    // videos table
            Schema::table('videos', function (Blueprint $table) use ($code) {
                $table->dropColumn('title_' . $code);
            });

            } catch (\Exception $e) {

            } 
            try {
                    // galleries table
            Schema::table('galleries', function (Blueprint $table) use ($code) {
                $table->dropColumn('title_' . $code);
            });

            } catch (\Exception $e) {

            }
            try {
                    // advertisements table
            Schema::table('advertisements', function (Blueprint $table) use ($code) {
                $table->dropColumn('title_' . $code);
            });

            } catch (\Exception $e) {

            }
            try {
                    // details table
            Schema::table('details', function (Blueprint $table) use ($code) {
                $table->dropColumn('title_' . $code);
                $table->dropColumn('description_' . $code);
                $table->dropColumn('address_' . $code);
            });

            } catch (\Exception $e) {

            }

            try {
                    // members table
            Schema::table('members', function (Blueprint $table) use ($code) {
                $table->dropColumn('name_' . $code);
                $table->dropColumn('address_' . $code);
                $table->dropColumn('description_' . $code);
                $table->dropColumn('post_' . $code);
            });

            } catch (\Exception $e) {

            }


}



}
