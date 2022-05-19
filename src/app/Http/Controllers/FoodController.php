<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Http\Requests\StoreFood;
use Carbon\Carbon;

class FoodController extends Controller
{

    public function homeIndex()
    {
        // 認証されているユーザーのIDを取得
        $id = Auth::id();
        // 認証されているユーザーの情報を取得
        $user = User::find($id);
        // 今日の日付を取得
        $today = Carbon::today();
        // 今日から7日後の日付を取得
        $sevendays = Carbon::today()->addDay(7);
        
        // 賞味期限7日前のデータ取得
        $query = $user->foods();
        $query->whereDate('expiry', '<=', $sevendays);
        $query->orderBy('expiry', 'asc');
        $expiry_sevendays_ago_food = $query->get();

        // 賞味期限切れのデータ取得
        $query =$user->foods();
        $query->whereDate('expiry', '<', $today);
        $query->orderBy('expiry', 'asc');
        $expired_foods = $query->get();

        return view('home', compact('expiry_sevendays_ago_food', 'expired_foods'));
    }

    public function refrigeratorIndex(Request $request)
    {
        // 検索キーワード
        $search = $request->input('search');
        
        // 認証されているユーザーのIDを取得
        $id = Auth::id();
        // 認証されているユーザーの情報を取得
        $user = User::find($id);

        $query = $user->foods();
        $query->where('storage', '冷蔵庫');

        // 検索キーワードがあった場合の処理
        if($search !== null){
            // 全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');

            // 空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回す
            foreach($search_split2 as $value){
                $query->where('food_name', 'like', '%'.$value.'%');
            }
        };

        $query->orderBy('expiry', 'asc');
        $refrigerator_foods = $query->paginate(10);


        return view('refrigerator', compact('refrigerator_foods'));
    }

    public function vegetableIndex(Request $request)
    {
        // 検索キーワード
        $search = $request->input('search');

        // 認証されているユーザーのIDを取得
        $id = Auth::id();
        // 認証されているユーザーの情報を取得
        $user = User::find($id);

        $query = $user->foods();
        $query->where('storage', '野菜室');

        // 検索キーワードがあった場合の処理
        if($search !== null){
            // 全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');

            // 空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回す
            foreach($search_split2 as $value){
                $query->where('food_name', 'like', '%'.$value.'%');
            }
        };

        $query->orderBy('expiry', 'asc');
        $vegetable_foods = $query->paginate(10);

        return view('vegetable', compact('vegetable_foods'));
    }

    public function freezerIndex(Request $request)
    {
        // 検索キーワード
        $search = $request->input('search');

        // 認証されているユーザーのIDを取得
        $id = Auth::id();
        // 認証されているユーザーの情報を取得
        $user = User::find($id);

        $query = $user->foods();
        $query->where('storage', '冷凍庫');

        // 検索キーワードがあった場合の処理
        if($search !== null){
            // 全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');

            // 空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回す
            foreach($search_split2 as $value){
                $query->where('food_name', 'like', '%'.$value.'%');
            }
        };

        $query->orderBy('expiry', 'asc');
        $freezer_foods = $query->paginate(10);

        return view('freezer', compact('freezer_foods'));
    }

    public function create()
    {
        // 認証しているユーザーのIDを取得
        $user_id = Auth::id();

        return view('create', compact('user_id'));
    }

    public function store(StoreFood $request)
    {
        $food = new Food;

        $food->user_id = $request->input('user_id');
        $food->food_name = $request->input('food_name');
        $food->amount = $request->input('amount');
        $food->expiry = $request->input('expiry');
        $food->storage = $request->input('storage');
        $food->memo = $request->input('memo');

        $food->save();

        return redirect('/refrigerator');
    }

    public function edit($id)
    {
        $food = Food::find($id);

        return view('edit', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $food = Food::find($id);

        $food->user_id = $request->input('user_id');
        $food->food_name = $request->input('food_name');
        $food->amount = $request->input('amount');
        $food->expiry = $request->input('expiry');
        $food->expiry = $request->input('expiry');
        $food->storage = $request->input('storage');
        $food->memo = $request->input('memo');

        $food->save();

        return redirect('/refrigerator');
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect('/refrigerator');
    }
}
