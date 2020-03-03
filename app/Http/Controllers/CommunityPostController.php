<?php

namespace App\Http\Controllers;

use App\Models\CommunityPost;
use App\Models\Tag;
use App\Models\TagCommunityPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $communityPosts = CommunityPost::select()
            ->with('user')
            ->where('type', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->limit(6)
            ->get()->toArray();

        foreach($communityPosts as $communityPost) {
            $date = $communityPost['created_at'];
            
            $communityPost['date'] = date("d/m/Y H:i", strtotime($date));

            $data[] = $communityPost;
        }

        // dd($data);

        return view('community.index', ['communityPosts' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('community.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $str = str_replace(' ', '', $data['slug']);

        $tags = explode(',', $str);

        unset($data['slug']);
        unset($data['_token']);

        $data['user_id'] = Auth::user()->id;

        // dd($data);
        $communityPost = CommunityPost::create($data);

        foreach($tags as $tag){
            $slug = strtolower($this->removeSpecialCharacters($tag));

            $result = Tag::select()->where('slug', '=', $slug)->get()->toArray();

            if(empty($result)) {
                $createdTag = Tag::create(['slug' => $slug]);
                TagCommunityPost::create(['tags_id' => $createdTag->id, 'community_post_id' => $communityPost->id]);
            } else {
                TagCommunityPost::create(['tags_id' => current($result)['id'], 'community_post_id' => $communityPost->id]);
            }
        }

        return redirect('/community/' . $communityPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataAnswer = [];
        $post = CommunityPost::find($id);

        $answers = CommunityPost::select()
            ->with('user')
            ->where('type', '=', '1')
            ->where('parent_id', '=', $id)
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()->toArray();

        
        foreach($answers as $answer) {
        
            $date = $answer['created_at'];
            
            $answer['date'] = date("d/m/Y H:i", strtotime($date));

            $dataAnswer[] = $answer;

        }
        
        return view('community.show', [
            'post' => $post,
            'answers' => $dataAnswer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }

    private function removeSpecialCharacters($str) 
    {
        return preg_replace("[^a-zA-Z0-9_]", "", strtr($str, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC"));

    }
}