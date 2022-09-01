<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToggleReactionRequest;
use App\Http\Resources\PostCollection;
use App\Models\Like;
use App\Models\Post;
use App\Rules\DisallowSelfReact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function list(): PostCollection
    {
        return new PostCollection(
            Post::with('tags')->withCount('likes')->paginate(15)
        );
    }
    
    public function toggleReaction(Post $post, ToggleReactionRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();
        $like = Like::where('post_id', $post->id)
                        ->where('user_id', $user->id)
                        ->first();
        if($like) {
            $like->delete();
            return response()->json([
                'status' => 200,
                'message' => 'You unlike this post successfully'
            ]);
        }

        Like::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'You like this post successfully'
        ]);
    }
}
