<?php

namespace App\Http\Controllers;

use App\Company;
use App\Player;
use App\Team;
use App\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

        //return Redirect::route('players.index');
        return back();
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
//        return Redirect::route('players.index');
        return back();
    }

    public function saveSignature(Request $request)
    {
        $player = Player::findOrFail($request->id);
        $signature = new Signature();

        $data_uri = $request->signature;
//        $encoded_image = explode(",", $data_uri)[1];
//        $decoded_image = base64_decode($encoded_image);

        $sig_hash = sha1($data_uri);
        $signature->player_id = $player->id;
        $signature->signator = $player->firstName . " " . $player->lastName;
        $signature->signature = $data_uri;
        $signature->sig_hash = $sig_hash;
        $signature->save();

//        $url = 'Signature' . '-' . $player->id . '-' . $player->firstName . '-' . $player->lastName .'-' . rand(111,9999).'.png';

//        $name = 'ID' . $player->id . '-Rand-' . rand(111,9999) . '-' . rand(111,9999) . '-' . rand(111,9999);
//        $player_id = $player->id;
//
//        $data=array(
//            'user_id' => $player_id,
//            'name' => $name,
//            'url' => $url,
//        );

//        file_put_contents('../storage/app/signatures/' . $url, $decoded_image);


//        $player->waiverSign = $url;
//        $player->waiverTime = \DateTime::createFromFormat();
//        $player->save();

        return back();
    }

    public function checkin()
    {
        return "checked";
    }
}
