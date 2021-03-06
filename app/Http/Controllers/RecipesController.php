<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\CategoryRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Provider;
use Illuminate\Support\Facades\Validator;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $provider = Auth::user()->provider()->first();
        $recipes = Recipe::where('provider_id', $provider->id)->get();
        $categoryRecipes = CategoryRecipe::all();

        $data = [
            'recipes' => $recipes,
            'categoryRecipes' => $categoryRecipes
        ];

        return view('recipes.provider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryRecipes = CategoryRecipe::all();

        return view('recipes.provider.create', [
            'categoryRecipes' => $categoryRecipes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:191',
            'ingredients' => 'required|string',
            'preparation_method' => 'required|string',
            'category_recipes_id' => 'required',
            'price' => 'required',
            'imageRecipe' => 'required|image|mimes:jpeg,jpg,png',
            'stock' => 'required|numeric'
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é :max',
            'mimes' => 'Formato inválido',
            'image' => 'Coloque uma imagem',
            'required' => 'Campo obrigatório',
            'mimes' => 'Formato inválido',
            'numeric' => 'Digite o número em estoque'
        ]);

        $data = $request->only([
            'name',
            'ingredients',
            'preparation_method',
            'category_recipes_id',
            'stock'
        ]);

        $data['price'] = str_replace(['.',','] , ['','.'] ,$request->input('price'));

        $validator = Validator::make($data,[
            'price' => ['numeric']
        ]);

        if ($validator->fails()) {
            return redirect()->route('recipes.create');
        }

        $imageName = time() . '.jpg';

        $request->imageRecipe->move(public_path('app/imageRecipes/'), $imageName);

        $data['imageRecipe'] = $imageName;

        $provider = Auth::user()->provider()->first();

        $data['provider_id'] = $provider->id;

        $this->createRecipe($data);

        return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $recipe = Recipe::find($id);
        return view('recipes.provider.show', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        $categoryRecipes = CategoryRecipe::all();

        return view('recipes.provider.edit', [
            'recipe' => $recipe,
            'categoryRecipes' => $categoryRecipes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'imageRecipe' => 'image|mimes:jpeg,jpg,png',
            'ingredients' => 'required|string',
            'preparation_method' => 'required|string',
            'price' => 'required',
            'stock' => 'required|numeric'
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é :max',
            'numeric' => 'Digite o número em estoque'
        ]);

        $data = $request->only([
            'name',
            'ingredients',
            'preparation_method',
            'numeric',
            'stock'
        ]);

        $data['price'] = str_replace(['.',','] , ['','.'] ,$request->input('price'));

        $validator = Validator::make($data,[
            'price' => ['numeric']
        ]);

        if ($validator->fails()) {
            return redirect()->route('recipes.create');
        }

        $recipe = Recipe::find($id);

        if (!empty($request->imageRecipe)) {
            $imageName = $recipe->image;

            $request->imageRecipe->move(public_path('app/imageRecipes/'), $imageName);

            $data['imageRecipe'] = $imageName;
        }

        // $recipe->name = $data['name'];
        // $recipe->ingredients = $data['ingredients'];
        // $recipe->preparation_method = $data['preparation_method'];
        // $recipe->save();

        $this->updateRecipe($data, $id);

        return redirect('/recipes/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->deleted_at = NOW();
        $recipe->save();

        return redirect()->route('recipes.index');
    }

    protected function createRecipe(array $data)
    {
        return Recipe::create([
            'provider_id' => $data['provider_id'],
            'category_recipes_id' => intval($data['category_recipes_id']),
            'name' => $data['name'],
            'image' => $data['imageRecipe'],
            'price' => $data['price'],
            'ingredients' => $data['ingredients'],
            'preparation_method' => $data['preparation_method'],
            'stock' => $data['stock']
        ]);
    }

    public function filter($category)
    {
        $recipes = Recipe::whereRaw("category_recipes_id IN ({$category})")->get()->toArray();

        echo json_encode($recipes);
    }

    protected function updateRecipe(array $data, int $id)
    {
        return Recipe::where('id', $id)
            ->update([
                'name' => $data['name'],
                'ingredients' => $data['ingredients'],
                'preparation_method' => $data['preparation_method'],
                'price' => $data['price'],
                'stock' => $data['stock']
            ]);
    }
}
