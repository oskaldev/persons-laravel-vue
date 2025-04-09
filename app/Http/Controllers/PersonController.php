<?php

namespace App\Http\Controllers;

use App\Http\Requests\Person\StoreRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
  public function index()
  {
    $personsList = Person::all();
    return PersonResource::collection($personsList)
      ->additional([
        'status' => 'success',
        'message' => 'Список успешно получен !'
      ]);
  }
  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    // return $data;
    $person = Person::create($data);
    return PersonResource::make($person)
      ->additional([
        'status' => 'success',
        'message' => 'Создан !'
      ])
    ;
  }
  public function show($id)
  {
    $person = Person::findOrFail($id); // 404 если не найден
    return response()->json($person);
  }
  public function update(Request $request, $id)
  {
    $person = Person::findOrFail($id);

    $person->update($request->only(['name', 'age', 'job']));
    $person = $person->fresh();

    return response()->json(['message' => 'Person updated successfully', 'person' => $person]);
  }
  public function destroy(Person $person)
  {

    $person->delete();
    return response([]);
  }
}
