<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use App\Category;
use App\Subcategory;

use App\Http\Requests\CreateCategoriesRequest;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function lista(Request $request)	{
		//var_dump( $request->get('id'));
		//die();

		if($request->ajax()) {
      $data = Input::all();
      $categories = Subcategory::all();
      print_r($categories);die;
    }
        $categories = Category::where('id',$request->get('id'));
		/*var_dump($categories);
		die();	

		$title = 'Lista de Categorias';*/
		
		return $categories;
	}
	public function index()
	{
        $categories = Category::orderBy('created_at','desc')->paginate(10);
		$title = 'Lista de Categorias';
		
		return view('categories.list')->withCategories($categories)->withTitle($title);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		//
		$title = 'Crear Nueva Categoria';
					return view('categories.create')->withTitle($title);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateCategoriesRequest $request)
	{
		//var_dump($request->all());
	    $hay = Category::where('name' , '=' , $request->get('title'))->first();
		if($hay){
			//$message= ' Ya existe esta categoria . ';

			//return redirect($slug)->with('message', 'Comment published'); 	
			
			return redirect('nueva-categoria/')->with('message', 'Categoria no guardada .Ya existe esta categoria'); 
		}else{
		
		$category = new Category();

		$category->name = $request->get('title');

		$category->save();


		return redirect('nueva-categoria')->with('message','Categoria creada correctamente');



	}
	  
		

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
		//$category = Category::find($id);
return view('categories.edit')->withCategory(Category::find($id))->withTitle('Editanto categoria');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		//var_dump($request);
		//die();
		$category_id =$request->input('category_id');
		$category = Category::find($category_id);

	    $hay = Category::where('name' , '=' , $request->get('title'))->first();
		if($hay){

			return view('categories.edit')->withCategory($hay)->withTitle('Editanto categoria')->withMessage('Nombre ya existe, no ha sido guardado.');
		
		}else{
			$category->name = $request->get('title');
			$category->save();

		//return redirect('nueva-categoria')->with('message','Categoria actualizada correctamente');
	return redirect('/user/categories')->with('message','Categoria Actualizada correctamente');



	     }


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
$category = Category::find($id);

 
	
		if ($category->delete()){
			$data = 'Post deleted Successfully';
		}
		else 
		{
			$data = 'Invalid Operation. You have not sufficient permissions';
		}

 
	return redirect('/user/categories')->with('message','Categoria borrada');
	}

}
