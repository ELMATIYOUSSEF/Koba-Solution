<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFeedBackRequest;
use App\Http\Requests\UpdateFeedBackRequest;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $feedback = FeedBack::select('feed_backs.*', 'users.name as user_name')
                    ->leftJoin('users', 'users.id', '=', 'feed_backs.user_id')
                    ->orderBy('feed_backs.id', 'desc')
                    ->paginate(4);

        return view('feedbacks.show',['feedbacks'=>$feedback]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeedBackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedBackRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $data['DateTimeFeedback']= date('Y-m-d H:i:s');
        $user->feedbacks()->create($data);
        return view('welcome'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function show(FeedBack $feedBack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function edit(FeedBack $feedBack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeedBackRequest  $request
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedBackRequest $request, FeedBack $feedBack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedBack $feedBack)
    {
        $feedBack-> delete();
        return redirect()
        ->back()
        ->with('success', 'feedBack has been deleted !!');
    }
}
