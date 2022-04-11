<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use App\Http\Requests\RestauranteRequest;

/**
 * Class RestauranteController
 * @package App\Http\Controllers
 */
class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantes = Restaurante::paginate();

        return view('restaurante.index', compact('restaurantes'))
            ->with('i', (request()->input('page', 1) - 1) * $restaurantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Restaurante::all();
        
    }

    public function createId($id)
    {
        return Restaurante::find($id);
    }

    
    public function store(Request $request)
    {
        $restaurante = new Restaurante();
        $restaurante->fill($request->all());
        $restaurante->save();

        return $restaurante;
    }

    public function update(Request $request)
    {
        $restaurante = Restaurante::find($request->get('id'));

        $restaurante->update($request->all());

        return $restaurante;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $restaurante = Restaurante::find($id)->delete();
        return [];
    }
}
