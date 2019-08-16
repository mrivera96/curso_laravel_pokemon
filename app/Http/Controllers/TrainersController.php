<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainer;
use App\Http\Requests\StoreTrainerRequest;
class TrainersController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    if($request->user()){
      $request->user()->authorizeRoles('user');
      $trainers = Trainer::all();
      return view('trainers.index', compact('trainers'));
    }
    return '<div class="alert alert-danger" role="alert"><p>Necesitas estar logueado para acceder aquí.</p></div>';

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {

    return view('trainers.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(StoreTrainerRequest $request)
  {


    $request->validate([

    ]);
    if( $request->hasFile('avatar')){

      $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
      $request->avatar->move(public_path('images'), $imageName);
      $trainer = new Trainer();
      $trainer->name=$request->name;
      $trainer->avatar = $imageName;
      $trainer->slug=str_replace(" ","-",strtolower($request->name));
      $trainer->save();

      return redirect()->route('trainers.index');

    }


  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Trainer $trainer)
  {

    return view('trainers.show', compact('trainer'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Trainer $trainer)
  {

    return view('trainers.edit',compact('trainer'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request,Trainer $trainer)
  {
    $trainer->fill($request->except('avatar'));
    if( $request->hasFile('avatar')){
      if(!$this->validate($request,['avatar'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'])){
        return response()->json('La imagen debe pesar por máximo 2 MB y ser de formato jpeg, png, jpg, gif o svg.', 400);
      }
      $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
      $request->avatar->move(public_path('images'), $imageName);
      $trainer->avatar = $imageName;

    }
    $trainer->save();
    return redirect()->route('trainers.show', [$trainer])->with('status','Entrenador actualizado correctamente');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Trainer $trainer)
  {
    $file_path = public_path('images').'/'.$trainer->avatar;
    \File::delete($file_path);
    $trainer->delete();
    return redirect()->route('trainers.index');
  }
}
