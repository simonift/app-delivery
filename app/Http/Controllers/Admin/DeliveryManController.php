<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\DeliveryMan;
use App\Restaurants;

class DeliveryManController extends Controller
{
    public function index()
    {
    	$delivery_men = DeliveryMan::paginate(10);
    	return view('admin.delivery_men.index')->with(compact('delivery_men')); // listado
    }

    public function create()
    {
        $restaurants = Restaurants::orderBy('name')->get(); //
    	return view('admin.delivery_men.create')->with(compact('restaurants')); // formulario de registro
    }

    public function store(Request $request)
    {
        // validar
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el repartidor.',
            'name.min' => 'El nombre del repartidor debe tener al menos 3 caracteres.',
            'description.max' => 'La descripción solo admite hasta 200 caracteres.',
            'phone.required' => 'Es obligatorio definir un telefono para el repartidor.',
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'phone' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);


        $product = new DeliveryMan(); 
        $product->name = $request->input('name'); //se asignan los valores 
        $product->rut = $request->input('rut'); //se asignan los valores 
        $product->description = $request->input('description'); //se asignan los valores
        $product->phone = $request->input('phone'); //se asignan los valores
        $product->restaurants_id = $request->restaurants_id == 0 ? null : $request->restaurants_id; //
        $product->save(); // Insert en la tabla 

        return redirect('/admin/delivery_men'); //Se redirige a la ruta definida
    }

    public function edit($id)
    {
        $restaurants = Restaurants::orderBy('name')->get();
        $delivery_men = DeliveryMan::find($id);
        return view('admin.delivery_men.edit')->with(compact('delivery_men', 'restaurants')); // form de edición
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el repartidor.',
            'name.min' => 'El nombre del repartidor debe tener al menos 3 caracteres.',
            'description.max' => 'La descripción solo admite hasta 200 caracteres.',
            'phone.required' => 'Es obligatorio definir un telefono para el repartidor.',
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'phone' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);
        // dd($request->all());
        $delivery_men = DeliveryMan::find($id);
        $delivery_men->name = $request->input('name');
        $delivery_men->rut = $request->input('rut');
        $delivery_men->description = $request->input('description');
        $delivery_men->phone = $request->input('phone');
        $delivery_men->restaurants_id = $request->restaurants_id == 0 ? null : $request->restaurants_id;
        $delivery_men->save(); // UPDATE

        return redirect('/admin/delivery_men');
    }

    public function destroy($id)
    {

        $delivery_men = DeliveryMan::find($id);
        $delivery_men->delete(); // DELETE

        return back();
    }


}
