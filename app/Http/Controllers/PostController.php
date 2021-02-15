<?php namespace App\Http\Controllers;
use Auth;
use App\Posts;
use App\User;
use App\Category;
use App\Subcategory;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use Illuminate\Http\Request;
// note: use true and false for active posts in postgresql database
// here '0' and '1' are used for active posts because of mysql database
class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$categorias=Category::all();
/*$categorias = Category::take(5)->skip(2)->get();
var_dump($categorias);
die();*/

/*echo "index";
die();*/
        $posts = Posts::where('active','1')->orderBy('created_at','desc')->paginate(3);
        $title = 'Latest Posts';
        return view('home')->withPosts($posts)->withTitle($title);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        /*echo "create";
        die();*/

        $categorias = Category::all();
        //$categorias = Category::where('id','27')->first();
        //$post = $categorias->subcategories;
        $subcategorias = Subcategory::all();

        //$subcategory = $categorias->subcategories;
        //var_dump($subcategorias);
        //die();
        // 

        if($request->user()->can_post())
        {
            return view('posts.create')->withCategorias($categorias)->withSubcategorias($subcategorias);
        }   
        else 
        {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostFormRequest $request)
    {

        $post = new Posts();
        $post->title = $request->get('title');
        
        /* quitamos acetos al titulo*/
        $titu2= PostController::scanear_string($request->get('title'));
        $post->slug = str_slug($titu2);


        $post->body = $request->get('body');

        $post->author_id = $request->user()->id;
        $post->category_id = $request->get('categoria_id');
        $post->subcategory_id = $request->get('subcategoria_id');
        

        if($request->has('save'))
        {
            $post->active = 0;
            $message = 'Post saved successfully';           
        
        }           
        else 
        {
            $post->active = 1;
            $message = 'Post published successfully';


        }
        $message =" guardamos datos";

        if($post->save()){
            if($request->get('imagen')<>''){
                $image_name='Articulo-'.$post->id.'.'.$request->file('imagen')->getClientOriginalExtension();


// move dos paramentors .::
                $request->file('imagen')->move(
                    config('upload.imagespath'),$image_name
                    );
//aqui el archivo ya esta subido y redimensionamos la imagen
                \Image::make(config('upload.imagespath').$image_name)->resize(300,300)->save();
                $post->imagen = $image_name;
            }
                $post->save();



                //die();

                // procesar imagen . ver fichero config/upload.php
                /*$request->file('imagen')->move(
                    config('upload.images.path').$image_name,
                    );*/

                    return redirect('edit/'.$post->slug)->withMessage($message);


        }else{
                    return redirect('edit/'.$post->slug)->withErrors('No se ha podido guardar el articulo');

        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        /*echo "show";
        die();*/
        $post = Posts::where('slug',$slug)->first();
        

        if($post)
        {
            if($post->active == false)
                return redirect('/')->withErrors('requested page not found');
            $comments = $post->comments;    
        }
        else 
        {
            return redirect('/')->withErrors('requested page not found');
        }
        //var_dump($comments);
        //die();
        return view('posts.show')->withPost($post)->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request,$slug)
    {
        /*echo "edit";
        die();*/
        $categorias = Category::all();
        //$categorias = Category::where('id','27')->first();
        //$post = $categorias->subcategories;
        $subcategorias = Subcategory::all();
        //var_dump($categorias);

        $post = Posts::where('slug',$slug)->first();
        if($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
            return view('posts.edit')->with('post',$post)->withCategorias($categorias)->withSubcategorias($subcategorias);
        else 
        {
            return redirect('/')->withErrors('you have not sufficient permissions');
;
        }
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
        $post_id = $request->input('post_id');

        $post = Posts::find($post_id);
        $category_id= $request->input('categoria_id');
        $subcategory_id= $request->input('subcategoria_id');
        $body= $request->input('content');
        
/*var_dump($post_id);
var_dump($category_id);
var_dump($subcategory_id);
var_dump($body);
die();*/

        if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
        {
            $title = $request->input('title');
            
            PostController::scanear_string($title);
            $slug = str_slug($title);


            $duplicate = Posts::where('slug',$slug)->first();
            if($duplicate)
            {
                if($duplicate->id != $post_id)
                {
                    return redirect('edit/'.$post->slug)->withErrors('Title already exists.')->withInput();
                }
                else 
                {
                    $post->slug = $slug;
                }
            }
            $post->category_id= $category_id;
            $post->subcategory_id= $subcategory_id;;

            $post->title = $title;
            $post->body = $body;
            
            if($request->has('save'))
            {
                $post->active = 0;
                $message = 'Artículo guardado correctamente';
                $landing = 'edit/'.$post->slug;
            }           
            else {
                $post->active = 1;
                $message = 'Artículo actualizado correctamente';
                $landing = $post->slug;
            }
            $message =' registro actualizado ';

            if($post->save()){
                if($request->hasFile('imagen')){

                        $image_name='Articulo-'.$post->id.'.'.$request->file('imagen')->getClientOriginalExtension();


        // move dos paramentors .::
                        $request->file('imagen')->move(
                            config('upload.imagespath'),$image_name
                            );
        //aqui el archivo ya esta subido y redimensionamos la imagen
                        \Image::make(config('upload.imagespath').$image_name)->resize(300,300)->save();
                        $post->imagen = $image_name;
                    
                    $post->save();
                }


                    //die();

                    // procesar imagen . ver fichero config/upload.php
                    /*$request->file('imagen')->move(
                        config('upload.images.path').$image_name,
                        );*/

                        return redirect('edit/'.$landing)->withMessage($message);


            }else{
                        //return redirect('edit/'.$post->slug)->withErrors('No se ha podido guardar el articulo');
                return redirect()->back()->with('errores','No se ha podido crear el artículo');

            }









        }
        else
        {
            return redirect('/')->withErrors('Permisos Insuficientes');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        //
        //$post = Posts::find($id);
        $post = Posts::findOrFail($id);
        \File::delete(config('upload.imagespath').$post->imagen);
        //$errors='';
        $message='Eliminando...';

        if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
        {
            $post->delete();
            $message = 'Artículo Eliminado correctamente!!!';
        }
        else 
        {
            //$errors= 'Invalid Operation. You have not sufficient permissions';
        }
        
    //  return redirect('/')->with($data);
        return  redirect('/user/'.Auth::id().'/posts')->withMessage($message);
    }


    

 public function scanear_string($string){
 
                        $string = trim($string);
 
                        $string = str_replace(
                            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
                            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
                            $string
                        );
 
                        $string = str_replace(
                            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
                            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
                            $string
                        );
 
                        $string = str_replace(
                            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
                            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
                            $string
                        );
 
                        $string = str_replace(
                            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
                            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
                            $string
                        );
 
                        $string = str_replace(
                            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
                            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
                            $string
                        );
 
                        $string = str_replace(
                            array('ñ', 'Ñ', 'ç', 'Ç'),
                            array('n', 'N', 'c', 'C',),
                            $string
                        );
 
                        //Esta parte se encarga de eliminar cualquier caracter extraño
                        $string = str_replace(
                            array("\\", "¨", "º", "-", "~",
                                 "#", "@", "|", "!", "\"",
                                 "·", "$", "%", "&", "/",
                                 "(", ")", "?", "'", "¡",
                                 "¿", "[", "^", "`", "]",
                                 "+", "}", "{", "¨", "´",
                                 ">", "< ", ";", ",", ":",
                                 "."),
                            '',
                            $string
                        );
 
 
                        return $string;
                    }


}
