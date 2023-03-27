<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemons = [
            'charmeleon' => [
                'title' => 'Charmeleon #005',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/005.png',
                'desc' => 'Charmeleon mercilessly destroys its foes using its sharp claws. If it
            encounters a strong foe, it turns aggressive. In this excited state, the flame at the
            tip of its tail flares with a bluish white color.'
            ],
            'wartortle' => [
                'title' => 'Wartortle #008',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/008.png',
                'desc' => 'Its tail is large and covered with a rich, thick fur. The tail
            becomes increasingly deeper in color as Wartortle ages. The scratches on its shell are
            evidence of this Pokémons toughness as a battler.'
            ],
            'butterfree' => [
                'title' => 'Butterfree #012',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/012.png',
                'desc' => 'Its wings are covered in toxic scales. If it finds bird Pokémon going
            after Caterpie, Butterfree sprinkles its scales on them to drive them off.'
            ],
        ];

        return  view('pokemons.list', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pokemons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pokemon =
            [
                'title' => $request->input('title'),
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/008.png',
                'desc' => $request->input('desc')
            ];

        return view('pokemons.show', compact('pokemon'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $pokemons = [
            'charmeleon' => [
                'title' => 'Charmeleon #005',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/005.png',
                'desc' => 'Charmeleon mercilessly destroys its foes using its sharp claws. If it
            encounters a strong foe, it turns aggressive. In this excited state, the flame at the
            tip of its tail flares with a bluish white color.'
            ],
            'wartortle' => [
                'title' => 'Wartortle #008',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/008.png',
                'desc' => 'Its tail is large and covered with a rich, thick fur. The tail
            becomes increasingly deeper in color as Wartortle ages. The scratches on its shell are
            evidence of this Pokémons toughness as a battler.'
            ],
            'butterfree' => [
                'title' => 'Butterfree #012',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/012.png',
                'desc' => 'Its wings are covered in toxic scales. If it finds bird Pokémon going
            after Caterpie, Butterfree sprinkles its scales on them to drive them off.'
            ],
        ];

        if (!array_key_exists($title, $pokemons)) {
            abort(404);
        } else {

            $pokemon = $pokemons[$title];
            return  view('pokemons.show', compact('pokemon'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
