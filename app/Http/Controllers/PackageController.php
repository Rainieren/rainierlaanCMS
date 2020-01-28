<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        $client =  new \GuzzleHttp\Client();
        $packagist = new \Spatie\Packagist\Packagist($client);

        $packages = $packagist->getPackagesByVendor('rainieren');

        // TODO:: Alle packages ophalen vanaf de main site waar deze staan opgelagen door middel van een API call. (Maybe hier ook een package van maken)
        // TODO:: Alle packages die opgehaald zijn in de database zetten met de juiste velden.
        // TODO:: Lijst met packages altijd up-to-date houden. Als er een package van de main site verdwenen is. Checken de lijst ook overeen komt met de lijst in het CMS. Zoniet, update dan alle packages. (Is er een weg? een weghalen, eentje bij? doe er een bij)

        // TODO:: Op een of andere manier ook checken of een package al in de composer.json zit. Zoja laat dan een andere knop zien (bijv een disabled knop met 'installed'), Zo niet kan men deze installeren.
        // TODO:: Wanneer een user een package installeerd moet er een melding getoont worden (Een popup met meer info en wanneer de user op downloaden klikt word er een downloadbalk geshowd. ook word er een waarschuwing getoont) en moeten de commandos 'composer update' en 'php artisan migrate:refresh --seed' op de achtergrond uitgevoerd worden.
        // TODO:: Voeg ook een handleiding toe aan de popup bijvoorbeeld "When installing this package. An extra menu item under the section Content will appear" met eventuele screenshots van de paginas
        // TODO:: Deze data word allemaal opgehaald via een API call en in de database van de CMS gepropt (Ook eventuele fotos) met link naar die foto

        return view('packages.index', compact('packages'));
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
