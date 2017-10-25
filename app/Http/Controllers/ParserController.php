<?php

namespace App\Http\Controllers;

use App\Squad;
use Illuminate\Http\Request;
use App\Member;
use App\Character;
use App\Guild;
use Illuminate\Support\Collection;
use Sunra\PhpSimple\HtmlDomParser;

class ParserController extends Controller
{
    /*
     * Заполнение таблицы персонажей c swgoh.gg
     *
     * */
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
    /*
     * Сбор и сохранение данных по членам гильдии
     * Обходит все гильдии из таблицы guilds и забирает все зарегистрированные профили на swgoh.gg
     *
     *
     * */
    public static function storemembers($id)
    {
        $guild = Guild::find($id);
            $dom = HtmlDomParser::file_get_html("https://swgoh.gg/g/".$guild->id."/".$guild->slug."/" );
            $members_table = $dom->find('table', 0);
            foreach ($members_table->find('tr') as $char) {
                if (isset($char->find('td a', 0)->plaintext) and isset($char->find('td a', 0)->href)){
                    $full_href = explode('/',(string)$char->find('td a', 0)->href);
                    $member = new Member(['name'=> $char->find('td a', 0)->plaintext, 'href'=>$char->find('td a', 0)->href, 'slug'=>$full_href[2]]);
                    $guild->members()->firstOrNew($member);
                }
            }

    }

    public function storememberscharacters()
    {
        $members = Member::all();
        foreach ($members as $member) {
            //echo "https://swgoh.gg/u/" . $member->slug . "/collection/"."<br>";
            $dom = HtmlDomParser::file_get_html("https://swgoh.gg/u/" . $member->slug . "/collection/");
            foreach ($dom->find('div.collection-char') as $char) {
                if (isset($char->find('a.char-portrait-full-link', 0)->href) and isset($char->find('div.collection-char-name', 0)->plaintext) and isset($char->find('div.char-portrait-full-gear-level', 0)->plaintext) and isset($char->find('div.char-portrait-full-level', 0)->plaintext)) {
                    $full_href = explode('/',(string)$char->find('a.char-portrait-full-link', 0)->href);
                    //echo json_encode(());

                    $member->characters()->attach($full_href[4], ['gear'=>$this->Gear($char->find('div.char-portrait-full-gear-level', 0)->plaintext), 'level'=>$char->find('div.char-portrait-full-level', 0)->plaintext, 'star'=>(7-count($char->find('div[class*=star-inactive]')))]);
                }
            }

        }
    }
    public function Gear($gear)
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

    public function show()
    {
        $members = Member::all();
        foreach ($members as $member){
            echo $member->name.'<br>';
            foreach ($member->characters as $character) {
                echo $character->pivot->gear . "<br>";
            }

        }
    }

    public function index(Request $request)
    {
        $id = $request->id;
        //$guilds = Guild::with('members.characters')->orderBy('id')->findOrFail($id);
        $members = Member::with('characters')->orderBy('id')->where('guild_id','=',$id)->get();
        $characters = Character::all()->keyBy('id');
        //echo json_encode($characters[1]);

        return view('table',compact('members','characters'));
    }

    public function squad(Request $request)
    {
        $id = $request->id;
        $squad = Squad::with('characters')->findOrFail($id);
        $characters = $squad -> characters ->keyBy('id');
        $members = Member::with('characters')->orderBy('id')->get();
        //echo json_encode($characters);

        return view('table',compact('members','characters'));
    }

}
