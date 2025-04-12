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
    $persons = Person::all();
    return PersonResource::collection($persons)
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
      ]);
  }

  public function show($id)
  {
    $person = Person::findOrFail($id); // 404 если не найден
    return PersonResource::make($person)
      ->additional([
        'status' => 'success',
        'message' => 'получен !'
      ]);
  }
  public function update(StoreRequest $request, $id)
  {
    $person = Person::findOrFail($id);

    $data = $request->validated();
    $person->update($data);
    $person->fresh();

    return PersonResource::make($person)
      ->additional([
        'status' => 'success',
        'message' => 'Обновлен !'
      ]);
  }
  public function destroy(Person $person)
  {
    $person->delete();
    return response([]);
  }
}
