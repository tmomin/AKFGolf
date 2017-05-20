<?php

namespace App\Http\Controllers;

use App\Company;
use App\Player;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        $companies = Company::all();
        $teams = Team::all();

        return view('players.index', compact('players', 'companies', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $teams = Team::all();

        return view('players.create', compact('companies', 'teams'));
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
            $player = new Player();
            $player->firstName = $request->firstName;
            $player->lastName = $request->lastName;
            $player->companyId = $request->companyId;
            $player->email = $request->email;
            $player->teamId = $request->teamId;
            $player->save();
        } catch (QueryException $e) {
            \Session::flash('flash_message','Duplicate Player Entry. Please Try Again.');
            return Redirect::route('players.index');
        }

        return Redirect::route('players.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        $companies = Company::all();
        $teams = Team::all();

        return view('players.edit',compact('player','companies', 'teams'));
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
        try {
            $player = Player::findOrFail($id);
            $player->firstName = $request->firstName;
            $player->lastName = $request->lastName;
            $player->companyId = $request->companyId;
            $player->email = $request->email;
            $player->teamId = $request->teamId;
            $player->save();
        } catch (QueryException $e) {
            \Session::flash('flash_message','Duplicate Player Entry. Please Try Again.');
            return Redirect::route('players.index');
        }

        return Redirect::route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Player::findOrFail($id)->delete();
        return Redirect::route('players.index');
    }

    public function saveSignature(Redirect $request)
    {
//        $player = Player::findOrFail($request->id);
//
//        $data_uri = $request->signature;
//        $encoded_image = explode(",", $data_uri)[1];
//
//        $sig = sha1($request->firstName.$request->lastName). "_signature.png";
//        $folder = '/uploads/signatures/';
//
//        Storage::put($folder, $sig);
//
//        $player->waiverSign = $encoded_image;
//        $player->save();
//
//        return back();

        return ('Save Signature');
    }
}
