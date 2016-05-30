<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
	private $resultsPerPage = 12;

	public function __construct(Profile $profile)
	{
		$this->profile = $profile;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
        	'profile.browse',
        	['profiles'=>$this->profile->paginate($this->resultsPerPage)]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // @todo Finish profile create REST method
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // @todo Finish profile store REST method
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        return view(
            'profile.view',
            ['user' => User::where('username', $username)->first()]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // @todo Finish profile edit method
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // @todo Finish update REST method
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // @todo Finish deleting profile
    }

    public function editFirstPage()
    {
        return view('profile.edit');
    }

    public function sendMessage(Request $request)
    {
        // @todo Finish sending messages from profile page
    }
}
