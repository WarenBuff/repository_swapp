<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Sunra\PhpSimple\HtmlDomParser;
use App\Member;

class UpdateMembersCharacters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guild:updatememberscharacters {guild}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновляет информацию о персонажах членов гильдии';

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
        $guild = $this->argument('guild');
        $this->storememberscharacters($guild);
    }

    private function storememberscharacters($guild_id)
    {
        $members = Member::where('guild_id', $guild_id)->get();
        $bar = $this->output->createProgressBar(count($members));
        foreach ($members as $member) {
            $bar->advance();
            $dom = HtmlDomParser::file_get_html("https://swgoh.gg/u/" . $member->slug . "/collection/");
            foreach ($dom->find('div.collection-char') as $char) {
                if (isset($char->find('a.char-portrait-full-link', 0)->href) and isset($char->find('div.collection-char-name', 0)->plaintext) and isset($char->find('div.char-portrait-full-gear-level', 0)->plaintext) and isset($char->find('div.char-portrait-full-level', 0)->plaintext)) {
                    $full_href = explode('/',(string)$char->find('a.char-portrait-full-link', 0)->href);
                    //echo json_encode(());
                    $hasChar = $member->characters()->where('id', $full_href[4])->exists();
                    if ($hasChar) {
                        $member->characters()->updateExistingPivot($full_href[4], ['gear'=>$this->Gear($char->find('div.char-portrait-full-gear-level', 0)->plaintext), 'level'=>$char->find('div.char-portrait-full-level', 0)->plaintext, 'star'=>(7-count($char->find('div[class*=star-inactive]')))]);
                    } else {
                        $member->characters()->attach($full_href[4], ['gear'=>$this->Gear($char->find('div.char-portrait-full-gear-level', 0)->plaintext), 'level'=>$char->find('div.char-portrait-full-level', 0)->plaintext, 'star'=>(7-count($char->find('div[class*=star-inactive]')))]);
                    }

                }
            }

        }
        $bar->finish();
    }
    private function Gear($gear)
    {
        switch (trim((string)$gear)) {
            case 'I':
                return "1";
                break;
            case 'II':
                return "2";
                break;
            case 'III':
                return "3";
                break;
            case 'IV':
                return "4";
                break;
            case 'V':
                return "5";
                break;
            case 'VI':
                return "6";
                break;
            case 'VII':
                return "7";
                break;
            case 'VIII':
                return "8";
                break;
            case 'IX':
                return "9";
                break;
            case 'X':
                return "10";
                break;
            case 'XI':
                return "11";
                break;
            case 'XII':
                return "12";
                break;
        }


    }
}
