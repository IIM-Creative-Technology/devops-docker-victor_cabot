<?php

namespace App\Http\Controllers;
use App\Equipe;
use Illuminate\Http\Request;


class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('q') !== null) {
            $equipes['data'] = Equipe::where("name", 'like', '%' . request('q') . '%') ->get();
            return response()->json($equipes);
        } else {
            return $this->refresh();
        }
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
    public function store(Request $request)
    {
        $equipe = Equipe::create($request->all());

        if($equipe) {
            return $this->refresh();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipe = Equipe::find($id);

        return response()->json($equipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $equipe = Equipe::find($id);
        $equipe->name = request('name');
        $equipe->nombre_de_joueurs = request('nombre_de_joueurs');
        $equipe->save();

        if($equipe){
            return $this->refresh();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipe = Equipe::find($id);
        
        
        if ($equipe->delete()){
            return $this->refresh();
        } else {
            return response()->json(['error' => 'Destroy method has failed.'], 425);
        }
    }

    private function refresh() {
        $equipes = Equipe::orderBy('created_at', 'DESC')->paginate(3);

            return response()->json($equipes);
    }
}
