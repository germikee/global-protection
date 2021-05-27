<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PersonResource
     */
    public function index()
    {
        $people = QueryBuilder::for(Person::class)
            ->defaultSort('created_at')
            ->allowedSorts([
                'created_at'
            ])
            ->paginate(10)
            ->appends(request()->query());

        return PersonResource::collection($people);
    }

    /**
     * Store person's personal data from PIPL API.
     *
     * @param  \App\Http\Requests\PersonRequest  $request
     *
     * @return \App\Http\Resources\PersonResource
     */
    public function store(PersonRequest $request)
    {
        $people = Person::factory($request->count ?? 5)->create();

        return PersonResource::collection($people);
    }

    /**
     * Get statistics of people.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return  mixed
     */
    public function statistics(Request $request)
    {
        $people = Person::all();

        return response()->json([
            'data' => [
                'Total' => $people->count(),
                'Average Age' => round($people->avg('age'), 2),
                'Gender' => [
                    'Male' => Person::gender()->count(),
                    'Female' => Person::gender('female')->count(),
                ],
                'Countries' => $people->pluck('country')->unique()->values()
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $id
     *
     * @return \App\Http\Resources\PersonResource
     */
    public function show(Person $person)
    {
        return new PersonResource($person);
    }

    /**
     * Update person's avatar using RoboHash.
     *
     * @param  \Illuminate\Http\PersonRequest  $request
     *
     * @param  \App\Models\Person  $person
     *
     * @return \App\Http\Resources\PersonResource
     */
    public function update(PersonRequest $request, Person $person)
    {
        $value = $request->avatar ?? $person->name;

        $person->fill(['avatar' => 'https://robohash.org/'.$value.'.png'])->save();

        return new PersonResource($person);
    }
}
