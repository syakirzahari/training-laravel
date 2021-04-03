<?php

namespace App\Http\Controllers;

use App\Timetable;
use App\Hall;
use App\Subject;
use App\Day;

use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Timetable::all();

        return view('timetables.index',compact('table'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = Day::pluck('name', 'id');

        $halls = Hall::pluck('name', 'id');

        $subjects = Subject::pluck('name', 'id', 'subject_code');

        return view('timetables.create', compact('days', 'subjects', 'halls'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Timetable::create($request->all());
        Timetable::create([
    		'student_id' => auth()->user()->id,
    		'day_id' => $request->day_id,
            'subject_id' => $request->subject_id,
    		'hall_id' => $request->hall_id,
    		'time_from' => $request->time_from,
            'time_to' => $request->time_to,
    	]);

        return redirect()->route('timetables.index')
                        ->with('success','Timetables created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        $days = Day::pluck('name', 'id');

        $halls = Hall::pluck('name', 'id');

        $subjects = Subject::pluck('name', 'id', 'subject_code');

        return view('timetables.edit',compact('days', 'subjects', 'halls', 'timetable'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        $timetable->update($request->all());

        return redirect()->route('timetables.index')
                        ->with('success','Timetables updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();

        return redirect()->route('timetables.index')
        ->with('success','Timetables deleted successfully');
    }
}
