<?php

namespace Kleinespende\Http\Controllers;

use Illuminate\Http\Request;
use Kleinespende\Http\Requests;
use Kleinespende\Models\Receiver;

class ReceiversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receivers = Receiver::where('user_id', $this->user->id)->get();
        return view('receivers.index', ['receivers' => $receivers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receivers.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($receiver)
    {
        $this->checkAuth($receiver);
        return view('receivers.edit', ['receiver' => $receiver]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $receiver)
    {
        $this->checkAuth($receiver);
        if ($receiver->save($request->all())) {
            return redirect('receiver')->with('status', 'Empfänger gespeichert!');
        }
        else {
            return redirect('receiver.edit')->with('status', 'Fehler');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
