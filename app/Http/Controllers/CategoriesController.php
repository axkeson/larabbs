<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoriesController extends Controller
{
    /**
     * @param Category $category
     * @param Request  $request
     * @param Topic    $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category, Request $request, Topic $topic)
    {
        $topics = $topic->withOrder($request->order)
            ->where('category_id', $category->id)
            ->paginate(20);

        return view('topics.index', compact('topics', 'category'));
    }
}
