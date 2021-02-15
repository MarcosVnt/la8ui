<?php namespace App\Http\Controllers;
use App\Subcategory;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SubcategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		//var_dump($request);
		//die();
		//on_category, 
		//$input['from_user'] = $request->user()->id;
		$input['on_category'] = $request->input('on_category');
		$input['name'] = $request->input('body');
		//$slug = $request->input('slug');
		//var_dump($input);
		//die();
		Subcategory::create( $input );
 	return redirect('/user/categories')->with('message','SUB-Categoria Actualizada correctamente');

		//return redirect($slug)->with('message', 'Comment published'); 	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		////
		$subcategoria = Subcategory::find($id);
		if($subcategoria->delete())
		{
			$message = 'Categoria Borrada correctamente';
		}
		else 
		{
			$message = 'ERROR al borrar la Categoria . Revise proceso';
		}
		
 	return redirect('/user/categories')->withMessage($message);

	}

}
