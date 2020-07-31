<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Validator;

class SearchController extends Controller
{
    public function index(Request $request, $page = 1)
	{
		$this->validate($request, [
			'search' => 'required|min:3|regex:/(^([A-Z a-z]+$)+)/',
		]);
		
		$q = $request->search;
		
		\Illuminate\Pagination\Paginator::currentPageResolver( function() use($page){
				return $page;
		});
		
		$roles = post::where('title', 'LIKE', '%'.$q.'%')->where('body', 'LIKE', '%'.$q.'%')->orderBy('created_at', 'DESC')->paginate(50);

		$searched = 'You Searced For: '.$q;
		
			if($roles)
				return view('blog.search', compact('roles','searched'));
			else
				return redirect()->back()->with('p_message', 'No Project Found that Matches your Search');
	}				
}
