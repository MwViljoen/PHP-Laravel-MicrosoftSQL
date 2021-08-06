<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    /*Method used to go to home */
    public function home(){
        // select the latest 5 articles from the DB
        // here we use a raw select method which has a un uniform or standard query
        // this is not secure and only used once for learning in this project
        $articles = DB::table('ArticleInfo')
            ->orderBy('ArticleID', 'desc')
            ->selectRaw('TOP 5 *')
            ->get();
        // we then return the view home with the variable passed to that view
        return view('Home', ['articles'=>$articles]);
    }
// method to get a article from db and display that article there
    public function ArticleView($ArticleID){
        // here we get the article by id and save all the columns of that id in variable
        $articleRow = DB::table('ArticleInfo')->where('ArticleID', $ArticleID)->first();
        // we also get all tags related to that id in the Tags table
        $taggs = DB::table('Tags')->Where('TagID', '=', $ArticleID)->get();
        /*$articleRow = DB::table('ArticleInfo')->find($ArticleID);*/
        // return the article view with all information to that view regarding the article
        return view('ArticleView')
            ->with('articleRow', $articleRow)
            ->with('taggs', $taggs);
    }
// same as article view
    public function CategoryView($slug){
        /*$categories = DB::table('ArticleInfo')->where('Categories', '=', $slug);*/
        $categories = DB::table('ArticleInfo')->where('Category', '=', $slug)->get();
        return view('CategoryView')
            ->with('categories', $categories)
            ->with('title', $slug);
    }
/*here we do a similar thing as with the category view and article view but we use a Subquery to get data from one
table and use that data to search another table according to that data selected*/
    public function TagView($tag){
        $tagList = DB::table("ArticleInfo")->select('*')
            ->whereIn('ArticleID',function($query) use ($tag) {
                $query->select('TagID')->from('Tags')
                ->where('TagName', '=', $tag);
            })
            ->get();
        return view('TagView')
            ->with('tagList', $tagList)
            ->with('tagString', $tag);
    }
// this method is used to search for ids tags and categories in DB
    public function Search(Request $request){
        // if we post values from a form, we check which search was used by using the isset
        // it allows us to see which search was posted
        /*here we do a id search */
        if(isset($request->SearchID)){
            $SearchID = $request->SearchID;
            // When using get it returns a collection as an array so we need to access the params as array or using foreach loop
            //https://stackoverflow.com/questions/41366092/property-title-does-not-exist-on-this-collection-instance
            // where as when using first() we can access the values normally
            $articleRow = DB::table('ArticleInfo')->where('ArticleID', '=', $SearchID)->first();
            if(isset($articleRow)){
                $taggs = DB::table('Tags')->Where('TagID', '=', $SearchID)->get();
                return view('ArticleView')
                    ->with('articleRow', $articleRow)
                    ->with('taggs', $taggs);
            }
            // if the row turns up empty we know that it does not exist thus the else handles this
            else{
                return view('Search')->with('Messg', 'No Article found by ID: '.$SearchID);
            }
        }
        // same as above and we use the same code as in category view with different variables
        else if(isset($request->SearchCategory)){
            $SearchCategory = $request->SearchCategory;
            $categories = DB::table('ArticleInfo')->where('Category', '=', $SearchCategory)->get();
            if($categories->isNotEmpty()){
                return view('CategoryView')
                    ->with('categories', $categories)
                    ->with('title', $SearchCategory);
            }
            else{
                return view('Search')->with('Messg', 'No Article found by Category: '.$SearchCategory);
            }
        }
        // same as above if's bt with same code as tag view method using a subquery
        else if(isset($request->SearchTag)){
            $SearchTag = $request->SearchTag;
            $tagList = DB::table("ArticleInfo")->select('*')
                ->whereIn('ArticleID',function($query) use ($SearchTag) {
                    $query->select('TagID')->from('Tags')
                        ->where('TagName', '=', $SearchTag);
                })->get();
            if($tagList->isNotEmpty()){
                return view('TagView')
                    ->with('tagList', $tagList)
                    ->with('tagString', $SearchTag);
            }
            else{
                return view('Search')->with('Messg', 'No Article found by Tag: '.$SearchTag);
            }
        }
        else{
            return view('Search');
        }
    }

    public function AboutUs(){
        return view('AboutUs');
    }
// returns legal page
    public function Legal_Terms_Privacy(){
        return view('Legal_Terms_Privacy');
    }
}
