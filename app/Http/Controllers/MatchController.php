<?php

namespace App\Http\Controllers;

use App\Match;
use App\Equipe;
use App\Http\Requests\StoreMatchPost;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $matches = Match::with(['equipeA','equipeB'])->orderBy('created_at', 'DESC')->paginate(3);
        return response()->json([
            'matches' => $matches
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatchPost $request)
    {
        $matches = Match::create($request->all());
        $validated = $request->validated();

        if ($matches) {
            return $this->refresh();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::with(['equipeA','equipeB'])->find($id);
        return response()->json($match);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $match = Match::find($id);
        $match->id_equipeA = request('id_equipeA');
        $match->id_equipeB = request('id_equipeB');
        $match->save();

        if($match) {
            return $this->refresh();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::find($id);
        $match->delete();
        return $this->refresh();
    }

    private function refresh() {
        $matches = Match::with(['equipeA','equipeB'])->orderBy('created_at', 'DESC')->paginate(3);
        return response()->json([
            'matches' => $matches
        ]);
    }
    // private function refresh() {
    //     $matches = Match::orderBy('created_at', 'DESC')->paginate(3);

    //         return response()->json($matches);
    // }
}
