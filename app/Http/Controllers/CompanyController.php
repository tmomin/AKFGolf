<?php

namespace App\Http\Controllers;

use App\Company;
use App\Player;
use App\Sponsor;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all()->sortBy('companyName');
        $sponsors = Sponsor::all();

        return view('companies.index', compact('companies', 'sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sponsors = Sponsor::all();

        return view('companies.create', compact('sponsors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $company = new Company();
            $company->companyName = $request->companyName;
            $company->sponsorId = $request->sponsorshipLevel;
            $company->save();
        } catch (QueryException $e) {
            \Session::flash('flash_message','Duplicate Company Entry. Please Try Again.');
            return Redirect::route('companies.index');
        }

        return Redirect::route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $players = Player::Where('companyId', $id)->get();
        $companies = Company::all();
        $teams = Team::all();

        return view('companies.show', compact('players', 'companies', 'teams', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $sponsors = Sponsor::all();
        return view('companies.edit', compact('company', 'sponsors'));
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
        $company = Company::findOrFail($id);

        $this->validate($request, [
            'companyName' => 'required',
            'sponsorId' => 'required',
        ]);

        $input = $request->all();

        $company->fill($input)->save();

        return Redirect::route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::findOrFail($id)->delete();
        return Redirect::route('companies.index');
    }
}
