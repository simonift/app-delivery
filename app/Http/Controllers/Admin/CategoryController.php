<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use File;

class CategoryController extends Controller
{
	public function index() // Nos devolvera las categorías, 
    {
    	$categories = Category::orderBy('name')->paginate(10); // Paginadas de 10, ordenadas por nombre
    	return view('admin.categories.index')->with(compact('categories')); // Devuelve una vista pasandole la variable categories
    }

    public function create()
    {
    	return view('admin.categories.create'); // formulario de registro
    }

    public function store(Request $request)
    {
        // validar datos
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para la categoria.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.max' => 'La descripción corta solo admite hasta 250 caracteres.',
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:250',
        ];
        $this->validate($request, Category::$rules, Category::$messages);

        //registrar en la bd
        $category = Category::create($request->only('name', 'description')); //

        if ($request->hasFile('image')) { //Si existe el campo image
            $file = $request->file('image'); //obtendremos una referencia
            $path = public_path() . '/images/categories'; // se guardan como path en images categories
            $fileName = uniqid() . '-' . $file->getClientOriginalName(); //nombre de archivo id + nombre original
            $moved = $file->move($path, $fileName); // el archivo temporal se guarda moved=true
            
            // Actualización de categoría
            if ($moved) {
                $category->image = $fileName; // guardamos el nombre del archivo en el campo image
                $category->save(); // Actualizamos
            }
        }

        return redirect('/admin/categories');
    }

    public function edit(Category $category) //Recibir id directamente
    {
        return view('admin.categories.edit')->with(compact('category')); // formulario de edición
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category->update($request->only('name', 'description'));
        // Procesa la imagen, si ésta se sube
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            // Actualiza la categoría y la imagen
            if ($moved) {
                $previousPath = $path . '/' . $category->image;

                $category->image = $fileName;
                $saved = $category->save(); // Actualizamos

                if ($saved)
                    File::delete($previousPath);
            }
        }        

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete(); // Realiza una eliminación de la categoría
        return back();
    }
}
