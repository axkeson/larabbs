<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoriesController extends Controller
{
    /**
     * @param Category $category
     * @param Request  $request
     * @param Topic    $topic
     * @param User     $user
     * @param Link     $link
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category, Request $request, Topic $topic, User $user, Link $link)
    {
        $topics = $topic->withOrder($request->order)
            ->where('category_id', $category->id)
            ->paginate(20);

        // 活跃用户列表
        $active_users = $user->getActiveUsers();
        $links = $link->getAllCached();

        return view('topics.index', compact('topics', 'category', 'active_users', 'links'));
    }
}
