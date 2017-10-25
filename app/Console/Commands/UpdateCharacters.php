<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Character;
use Sunra\PhpSimple\HtmlDomParser;

class UpdateCharacters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guild:updatecharacters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновляет список известных персонажей';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->storechars();
    }

    public function storechars()
    {
        $dom = HtmlDomParser::file_get_html("https://swgoh.gg/u/ferr/collection/");
        foreach ($dom->find('div.collection-char') as $char) {
            if (isset($char->find('a.char-portrait-full-link', 0)->href) and isset($char->find('div.collection-char-name', 0)->plaintext)) {
                $full_href = explode('/',(string)$char->find('a.char-portrait-full-link', 0)->href);
                $temp = ['id'=>$full_href[4], 'slug'=>$full_href[5], 'name'=>$char->find('div.collection-char-name', 0)->plaintext];
                $res[]=$temp;

            }
        }
        foreach ($res as $char1) {
            Character::firstOrCreate(['name' => $char1['name'], 'id'=>$char1['id'], 'slug'=>$char1['slug']]);
        }
    }
}
