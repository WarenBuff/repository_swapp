<?php

namespace App\Console\Commands;

use App\Guild;
use App\Member;
use Sunra\PhpSimple\HtmlDomParser;
use Illuminate\Console\Command;

class UpdateGuildMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guild:updatemembers {guild}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update guild members';



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
        $this->storemembers($guild);
    }

    private function storemembers($guild_id)
    {
        $guilds = Guild::find($guild_id);
        $dom = HtmlDomParser::file_get_html("https://swgoh.gg/g/".$guilds->id."/".$guilds->slug."/" );
        $members_table = $dom->find('table', 0);
        foreach ($members_table->find('tr') as $char) {
            if (isset($char->find('td a', 0)->plaintext) and isset($char->find('td a', 0)->href)){
                $full_href = explode('/',(string)$char->find('td a', 0)->href);
                $guilds->members()->firstOrCreate(['name'=> $char->find('td a', 0)->plaintext, 'href'=>$char->find('td a', 0)->href, 'slug'=>$full_href[2]]);
                //$member = Member::where('slug', $full_href[2])->first();
                $slugs[] = $full_href[2];
            }
        }
        Member::whereNotIn('slug', $slugs)->delete();
    }
}
