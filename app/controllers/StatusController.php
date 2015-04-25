<?php

use Hypebook\Core\CommandBus;
use Hypebook\Forms\PublishStatusForm;
use Hypebook\Statuses\PublishStatusCommand;
use Hypebook\Statuses\StatusRepository;
use Laracasts\Flash\Flash;

class StatusController extends \BaseController {

	use CommandBus;

	protected $statusRepository;
    /**
     * @var PublishStatusForm
     */
    protected $publishStatusForm;

    /**
     * @param PublishStatusForm $publishStatusForm
     * @param StatusRepository $statusRepository
     */
	function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
	{
        $this->publishStatusForm = $publishStatusForm;
        $this->statusRepository = $statusRepository;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = $this->statusRepository->getAllForUser(Auth::user());

		return View::make('statuses.index', compact('statuses'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->publishStatusForm->validate(Input::only('body'));

		$command = new PublishStatusCommand(Input::get('body'), Auth::user()->id);

		$this->execute($command);

		Flash::message('Your status has been updated!');

		return Redirect::refresh();
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
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
	}


}
