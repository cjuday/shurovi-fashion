<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Http;

use App\Models\Countries;

class CountrySync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pull:country';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = Http::get('https://restcountries.com/v3.1/all');

        $sanitized_data = json_decode($data);

        foreach($sanitized_data as $sanitized){
            //TLD
            $text = '';
            foreach($sanitized->tld as $tld){
                $text .= $tld.', ';
            }

            //Independent
            if($sanitized->independent == true){
                $independent = 1;
            }else{
                $independent = 0;
            }

            //Independent
            if($sanitized->unMember == true){
                $unmember = 1;
            }else{
                $unmember = 0;
            }
            //Suffix
            $suffix = '';
            foreach($sanitized->idd->suffixes as $suff){
                $suffix .= $suff.', ';
            }
            //Capital
            $cap = '';
            foreach($sanitized->capital as $capx){
                $cap .= $capx.', ';
            }
            dd($cap);
            $count = Countries::where('commonName',$sanitized->name->common)->count();
            if($count==0){
                Countries::create([
                    'commonName' => $sanitized->name->common,
                    'officialName' => $sanitized->name->official,
                    'tld' => $text,
                    'cca2' => $sanitized->cca2,
                    'ccn3' => $sanitized->ccn3,
                    'cca3' => $sanitized->cca3,
                    'cioc' => $sanitized->cioc,
                    'independent' => $independent,
                    'status' => $sanitized->status,
                    'unMember' => $unmember, 
                    'root' => $sanitized->idd->root,
                    'suffixes' => $suffix,
                    'capital' => $cap,
                    'region' => $sanitized->region,
                    'subRegion' => $sanitized->subregion,
                ]);
            }
        }
    }
}
