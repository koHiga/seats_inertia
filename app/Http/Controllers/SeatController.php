<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Models\Seat;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // データベーステーブルを確認するメソッド
        //dd(Seat::all());
        // Index.vueを返すルーティイング（web.phpにて、'/'へアクセスするとこのコントローラーを参照する様に設定済み。
        return Inertia::render('Index');
    }

    /**
     * Confirmation of input and seleted seats are available or not.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, Seat $seat)
    {
        $request->validateWithBag(
            'confirm',
            [
                'guestsCountInput' => 'required',
                'selectedSeatTypes' => 'required'
            ]
        );

        $guestsCount = $request->guestsCountInput;
        $selectedSeats = $request->selectedSeatTypes;

        // array([ 選択された席種 => その席種の最大定員 ])
        $maxGuestsPerSeatBySelectedSeats = [];

        // array([ 選択された席種 => 空席の数 ])
        $remainingPerSeatTypes = [];

        // array([ 選択された席種 => 空席があるか否か ])
        $selectedSeatsAvailabilities = [];

        // array([ 選択された席種 => 席種の最大定員の余り ]) : 余りの少ない順
        $prioritizedOrderForGuidance = [];

        foreach ($selectedSeats as $selectedSeat) {

            // 席種の最大定員をKeyValuePairとして配列に追加
            $maxGuests = $seat::where('seatType', $selectedSeat)
                ->select('maxGuestsPerSeat')->first();
            array_push($maxGuestsPerSeatBySelectedSeats, [$selectedSeat => $maxGuests->maxGuestsPerSeat]);

            // 席種の空席の数をKeyValuePairとして配列に追加
            $remaining = $seat::where('seatType', $selectedSeat)
                ->select('remainingSeats')->first();
            array_push($remainingPerSeatTypes, [$selectedSeat => $remaining->remainingSeats]);

            // お客さんの人数と、空席の数及びその席種の最大定員を掛けた数を比較して
            // 後者が前者を上回らない場合に、availabilityをtrueとするKeyValuePairを配列に追加
            $maxPeopleByRemainingSeat = $maxGuests->maxGuestsPerSeat * $remaining->remainingSeats;
            if ($guestsCount <= $maxPeopleByRemainingSeat) {

                // 入力された人数と席種の最大定員に応じて、空席があるか否かを返す
                array_push($selectedSeatsAvailabilities, [$selectedSeat => true]);

                // 上記でtrueとなった場合に、最大定員により近い席種を上位に並べた配列を作成
                // 席種の最大定員からお客さんの数を引いて余る数
                $remainOfOneSeatType = 0;

                switch ($guestsCount) {
                    case $guestsCount % $maxGuests->maxGuestsPerSeat == 0:
                        array_push($prioritizedOrderForGuidance, [$selectedSeat => 0]);
                        break;

                    case $guestsCount % $maxGuests->maxGuestsPerSeat != 0:
                        $remainOfOneSeatType = $maxGuests->maxGuestsPerSeat - ($guestsCount % $maxGuests->maxGuestsPerSeat);
                        array_push($prioritizedOrderForGuidance, [$selectedSeat => $remainOfOneSeatType]);
                        break;

                    default:
                        return Redirect::route('index');
                        break;
                }
            } else {
                array_push($selectedSeatsAvailabilities, [$selectedSeat => false]);
            };
        }

        // 一つの席で余る数の少ない順に並び替える
        uasort($prioritizedOrderForGuidance, function ($v1, $v2) {
            return $v1 < $v2;
        });

        //dd($maxGuestsPerSeatBySelectedSeats, $remainingPerSeatTypes, $selectedSeatsAvailabilities, $prioritizedOrderForGuidance);


        return Inertia::render('Confirm', [
            'request' => $request,
            'seats' => $seat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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
