<?php

namespace Kleinespende\Http\Controllers;

use Illuminate\Http\Request;
use Kleinespende\Http\Requests;
use Kleinespende\Models\Button;

class ButtonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buttons = Button::where('user_id', $this->user->id)->get();
        return view('buttons.index', ['buttons' => $buttons ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buttons.edit');
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
     * @param  Button $button
     * @return \Illuminate\Http\Response
     */
    public function edit($button)
    {
        $this->checkAuth($button);
        return view('buttons.edit', ['button' => $button]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Button $button
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $button)
    {
        $this->checkAuth($button);
        if ($button->save($request->all())) {
            return redirect('button')->with('status', 'Button gespeichert!');
        }
        else {
            return redirect('button.edit')->with('status', 'Fehler');
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

    /**
     * Save a button click.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function click(Request $request, $id)
    {
        error_log(strftime("[%Y-%m-%d %H:%M:%S] Button {$id}\n"), 3, '/tmp/kleinespende.log');

        $button = Button::where('button_id', $id)->with('receiver')->first();
        if (!$button) {
            return response('Not found', 404);
        }
        $this->checkAuth($button);

        $receiver = $button->receiver;

        $receiver->open_donations += $button->amount;

        if ($receiver->open_donations >= $receiver->donation_threshold) {
            $receiver->month_total_donations += $receiver->open_donations;
            $receiver->month_total_donations =  min(
                $receiver->month_max_donations,
                $receiver->month_total_donations
            );
            $receiver->open_donations = 0;
        }

        $receiver->save();

        return response()->json([
            'time' => strftime('%H:%M:%S'),
            'status' => 'ok',
            'amount' => $button->amount,
            'open_donations' => $receiver->open_donations,
            'month_total_donations' => $receiver->month_total_donations,
        ]);
    }

}
