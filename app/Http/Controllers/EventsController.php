<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Picture;
use Illuminate\Http\Response;

class EventsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$pictures = Picture::all();

		return view('Event.index', compact('pictures'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('Event/create');
	}

	public function addPicture() {
		$file = Request::file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));

		$picture = new Picture();
		$picture->title = Request::input('title');
		$picture->mime = $file->getClientMimeType();
		$picture->original_filename = $file->getClientOriginalName();
		$picture->filename = $file->getFilename().'.'.$extension;

		$picture->save();

		return redirect('event');
		
	}

	public function get($filename){


		$picture = Picture::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($picture->filename);

		return (new Response($file, 200))
              ->header('Content-Type', $picture->mime);



	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
