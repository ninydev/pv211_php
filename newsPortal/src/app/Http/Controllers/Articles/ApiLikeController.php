<?php
//
//namespace App\Http\Controllers\Articles;
//
////use App\Models\Article;
////use App\Models\Like;
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class ApiLikeController extends Controller
//{
//    public function toggleLike(Request $request, $articleId)
//    {
//        $user = Auth::user();
//        $article = Article::findOrFail($articleId);
//
//        $like = Like::where('article_id', $articleId)->where('user_id', $user->id)->first();
//
//        if ($like) {
//            $like->delete();
//            return response()->json(['message' => 'Like removed'], 200);
//        } else {
//            Like::create(['article_id' => $articleId, 'user_id' => $user->id,]);
//            return response()->json(['message' => 'Like added'], 201);
//        }
//    }
//}
