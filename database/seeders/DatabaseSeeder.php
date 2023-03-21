<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->runCard();
        $this->runBattle();
    }

    private function runCard()
    {
        DB::table('cards')->truncate();
        DB::table('cards')->insert($this->getCharactersInfo());
    }

    private function runBattle()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('battles')->truncate();
        DB::table('players')->truncate();
        DB::table('decks')->truncate();
        // DB::table('deck_player')->truncate();
        DB::table('card_deck')->truncate();
        $list = [
            // 'https://statsroyale.com/watch/73002030/1638262286_%2320QJJ9LPJ_%2328LGQ2RC',
            // 'https://statsroyale.com/watch/73003562/1595699299_%2328U0CP2UP_%23YVQPUP0CL',
            'https://statsroyale.com/watch/classic/1569422007_%232PCYPCQR_%232PJ8Y8RYY',
            'https://statsroyale.com/watch/classic/1577936356_%238PJJ99GLU_%23LV09JQ90',
            'https://statsroyale.com/watch/grand/1550112012_%2392C0089P0_%23L90RUL',
            'https://statsroyale.com/watch/grand/1550159922_%2392V0LC92_%23U2G0Y0YU',
            'https://statsroyale.com/watch/grand/1550399415_%238JG2RPJ2Q_%23PC8PPC2VY',
            'https://statsroyale.com/watch/grand/1550417433_%23P9UCLCVU2_%23RPVLRC0U',
            'https://statsroyale.com/watch/grand/1550483236_%2398Q8LPQ9_%23YRVJ2R',
            'https://statsroyale.com/watch/grand/1550546284_%23L8V0QLCP_%23QC8JQ0GR',
            'https://statsroyale.com/watch/grand/1550556249_%238Q20LRC8Y_%23JC9RR88G',
            'https://statsroyale.com/watch/grand/1550621668_%239PGV9YLPV_%23GUC2RPV',
            'https://statsroyale.com/watch/grand/1550638479_%2382Q8YY8L_%23QULJR90C',
            'https://statsroyale.com/watch/grand/1550685801_%239288V8CCQ_%23GG829JGY',
            'https://statsroyale.com/watch/grand/1550690024_%232CJYQGQ89_%23GUC2RPV',
            'https://statsroyale.com/watch/grand/1550705489_%23GUC2RPV_%23PC8YQYR',
            'https://statsroyale.com/watch/grand/1550830718_%239288V8CCQ_%23JQ8YY9LV',
            'https://statsroyale.com/watch/grand/1551178942_%2399P0LLLC_%23PL0LPPP8',
            'https://statsroyale.com/watch/grand/1551192821_%232RQVCJVC_%23PCJULYVQ',
            'https://statsroyale.com/watch/grand/1551549562_%2398QY9YCG_%23Q0CVUVUG',
            'https://statsroyale.com/watch/grand/1552042078_%232G9UGQ0V_%232GPGYVRRG',
            'https://statsroyale.com/watch/grand/1552114050_%232CYCG0LJJ_%232U9YPGG',
            'https://statsroyale.com/watch/grand/1552497867_%232PYCV92_%2380J8LV2LC',
            'https://statsroyale.com/watch/grand/1555992687_%238PYGRPCG_%23VLU8U9V',
            'https://statsroyale.com/watch/grand/1557878643_%23JYUV2UC9_%23QLYG29J',
            'https://statsroyale.com/watch/grand/1559142663_%23L0R2JV0U_%23YJ89UUL2',
            'https://statsroyale.com/watch/grand/1559955702_%239QP9Y29UG_%23QL0Y0J0V',
            'https://statsroyale.com/watch/grand/1561323173_%232U0QCLGVJ_%23890LRQCLQ',
            'https://statsroyale.com/watch/grand/1562247237_%2380PRRVCR_%23YJPPGL00',
            'https://statsroyale.com/watch/grand/1562904635_%23PP9L8JJ8L_%23Y20U9RGQP',
            'https://statsroyale.com/watch/grand/1563156999_%23GGC0PPGQ_%23QCPQVCP0',
            'https://statsroyale.com/watch/grand/1563768547_%238U2YRQ2J_%238YQCUCC2P',
            'https://statsroyale.com/watch/grand/1563963857_%2322JLY28L2_%239QQUYVL2C',
            'https://statsroyale.com/watch/grand/1564618746_%232C2U20GL_%232PC0UJCG',
            'https://statsroyale.com/watch/grand/1565085758_%232VYJYJ09_%23Y20U9RGQP',
            'https://statsroyale.com/watch/grand/1565317736_%232URVYU2Q_%23C0C9RJC9',
            'https://statsroyale.com/watch/grand/1565795927_%23L28G222C_%23LQL89CL8',
            'https://statsroyale.com/watch/grand/1565954968_%232GP0RQYCU_%232RCYR9JR',
            'https://statsroyale.com/watch/grand/1566249457_%238G0QVRLC_%23QCVGPY9Y',
            'https://statsroyale.com/watch/grand/1566318727_%238VPC9VU_%23P89L09Y2U',
            'https://statsroyale.com/watch/grand/1566351722_%2322PPUL2P8_%23PCPL8L8',
            'https://statsroyale.com/watch/grand/1566592031_%232CCGPG9JC_%2388RV22QP',
            'https://statsroyale.com/watch/grand/1566598374_%2390C2Y8VV_%23VR9YPYVV',
            'https://statsroyale.com/watch/grand/1566875418_%23209U29L2P_%2328Q2892G8',
            'https://statsroyale.com/watch/grand/1567552792_%23L8PVPUPV_%23VR0RJVC',
            'https://statsroyale.com/watch/grand/1568056471_%232VGC9C8Q_%238LCL8GLJ9',
            'https://statsroyale.com/watch/grand/1568397140_%2322V002V_%239QY882J8U',
            'https://statsroyale.com/watch/grand/1568512511_%23CPR29808_%23PJ8RCRGC',
            'https://statsroyale.com/watch/grand/1568708919_%23P9QJCL00_%23QYY28Q29',
            'https://statsroyale.com/watch/grand/1568996146_%232QJ0PRPLJ_%23UVYGCQU0',
            'https://statsroyale.com/watch/grand/1569139005_%232Q0G8LP_%238QLL882C2',
            'https://statsroyale.com/watch/grand/1569961905_%232YYQLJQYP_%23YR8R0CCR',
            'https://statsroyale.com/watch/grand/1570270407_%23PQYYGPPCC_%23VGUGPQ9',
            'https://statsroyale.com/watch/grand/1573155986_%238R2LUY88_%239QGPVU2J',
            'https://statsroyale.com/watch/grand/1573185823_%239JUQGVCCV_%23Q9J8GRYP',
            'https://statsroyale.com/watch/grand/1573424343_%23L2VYV8YL_%23L8PVPUPV',
            'https://statsroyale.com/watch/grand/1573925746_%232UGR22RCP_%239J8GQQQU',
            'https://statsroyale.com/watch/grand/1574698764_%2329GGPU0CG_%239RCC80JY',
            'https://statsroyale.com/watch/grand/1576159990_%238LJ92G8UG_%23PV2YYCJ2Y',
            'https://statsroyale.com/watch/grand/1576382371_%23P0U0VYGJ8_%23RVJLVQJ9',
            'https://statsroyale.com/watch/grand/1576699591_%232PV0QLV2V_%23YJ992YP0Q',
            'https://statsroyale.com/watch/grand/1578363865_%23CJPJP9G_%23QV2C99YY',
            'https://statsroyale.com/watch/grand/1580648327_%232YC0YJQY_%2382UVCUR2R',
            'https://statsroyale.com/watch/grand/1581175060_%2380QJVRU9P_%23PCJULYVQ',
            'https://statsroyale.com/watch/grand/1583433588_%23202RU2GLC_%232JL99LQ92',
            'https://statsroyale.com/watch/grand/1584947923_%232098LPPYJ_%232JVJUUY00',
            'https://statsroyale.com/watch/grand/1591689031_%238JQCVPL0_%238QGV89UV',
            'https://statsroyale.com/watch/grand/1595997863_%23P0PRL09JU_%23PYUR2G8Q2',
            'https://statsroyale.com/watch/grand/1601529826_%2392GC09UCY_%23V02UJGV0',
            'https://statsroyale.com/watch/grand/1602300106_%23P8YCUCYUY_%23P9LR9PP02',
            'https://statsroyale.com/watch/grand/1603612449_%232LGCL2PP2_%23PVCR09PU',
            'https://statsroyale.com/watch/grand/1603853916_%23Y22VPC280_%23YCUGGP00',
            'https://statsroyale.com/watch/grand/1606234764_%23LYY009LCV_%23PY9UCL0Y',
            'https://statsroyale.com/watch/grand/1611680418_%23LRGC8URPP_%23YCP9CLCC9',
            'https://statsroyale.com/watch/grand/1612081700_%239LGVUQR2P_%23QVLRL0CQQ',
            'https://statsroyale.com/watch/grand/1615482959_%23JVC2GPPV_%23QVVP2VQ2V',
            'https://statsroyale.com/watch/grand/1616116165_%238G2CR0GG8_%239UQ9LJYG2',
            'https://statsroyale.com/watch/grand/1616175227_%23LRYQU2V_%23U2G2YYGL',
            'https://statsroyale.com/watch/grand/1616219775_%23L809UL0LV_%23QL8V8JRJ',
            'https://statsroyale.com/watch/grand/1617989360_%232LRGJGYCR_%232R29GVRP',
            'https://statsroyale.com/watch/grand/1638677864_%23C9Q2VJ9_%23JC88UJRRJ',
            'https://statsroyale.com/watch/grand/1638678121_%232Y0VPJCLC_%23RJ0LYP89',
            'https://statsroyale.com/watch/grand/1638682671_%23P2GCQ9VQC_%23PRC0UYVGL',
            'https://statsroyale.com/watch/grand/1638783238_%2322URY2VVY_%2380UVQLLQL',
            'https://statsroyale.com/watch/grand/1639241938_%232V8PQUYU2_%23809G0VQUC',
            'https://statsroyale.com/watch/grand/1640304996_%238Q20LRC8Y_%238YRUVG2RG',
            'https://statsroyale.com/watch/grand/1642275888_%232V92C2U_%23CYYQJL2JR',
            'https://statsroyale.com/watch/grand/1643606164_%23JC88UJRRJ_%23P8LQLG2JG',
            'https://statsroyale.com/watch/grand/1643742161_%23P0CLJ90LV_%23PLLUCPUQU',
            'https://statsroyale.com/watch/grand/1643804838_%238PQ8Y8UQ_%239RV8G000',
            'https://statsroyale.com/watch/grand/1644390018_%23QRYJ8VJJQ_%23Y8VP898C9',
            'https://statsroyale.com/watch/grand/1645009804_%2320YVPVLL0_%232CR9QVJLQ',
            'https://statsroyale.com/watch/grand/1645103377_%23GVRUVUYUG_%23J98J22QY',
            'https://statsroyale.com/watch/grand/1645106078_%23CJCRVVRR0_%23RURYJ2LG2',
            'https://statsroyale.com/watch/grand/1645692581_%2320YVPVLL0_%23QGR8VUUGR',
            'https://statsroyale.com/watch/grand/1645770953_%238GVVYVCL0_%238YUPP8CU',
            'https://statsroyale.com/watch/grand/1646369931_%2320GPRPYL2_%232CYC8UJYQ',
            'https://statsroyale.com/watch/grand/1650441578_%23LJ029YC0G_%23RUY88RC99',
            'https://statsroyale.com/watch/grand/1650799194_%232QUY9P8CV_%232R29GVRP',
            'https://statsroyale.com/watch/grand/1650814679_%2320YGVQR0R_%239UU92RCR0',
            'https://statsroyale.com/watch/grand/1651155870_%23290VRQCYC_%239Q8YU9CQY',
            'https://statsroyale.com/watch/grand/1651214267_%23RRU00YR8Y_%23Y2YCP2QGP',
            'https://statsroyale.com/watch/grand/1651312305_%2380UVQLLQL_%23C9VR8L2Y0',
            'https://statsroyale.com/watch/grand/1651415968_%23LU8V29C0_%23PYRGGPUVQ',
            'https://statsroyale.com/watch/grand/1651426983_%2390UGQGQJG_%23PQCJGVQ0',
            'https://statsroyale.com/watch/grand/1651891865_%238UGYQU8PP_%238VLRU82PY',
            'https://statsroyale.com/watch/grand/1651981624_%232LGVLLYC_%23YPJLCC8YR',
            'https://statsroyale.com/watch/grand/1652144774_%23GVLJRL98L_%23LGQ9LVY9U',
            'https://statsroyale.com/watch/grand/1652769210_%23CVUY8YY9_%23V0GQQU0V',
            'https://statsroyale.com/watch/grand/1653034379_%23PPV2JUUGU_%23UP2VL099',
            'https://statsroyale.com/watch/grand/1653473563_%239RG08LG8Y_%23Q2Q0RGUPU',
            'https://statsroyale.com/watch/grand/1653576108_%239QP9Y29UG_%23LQUY0G0QU',
            'https://statsroyale.com/watch/grand/1653611742_%232PC0UJCG_%238UC98G8QP',
            'https://statsroyale.com/watch/grand/1653734345_%2322Y8J9PUR_%23PLYYVLRRJ',
            'https://statsroyale.com/watch/grand/1653751366_%232YLRGVVC_%23RL2G0VRJQ',
            'https://statsroyale.com/watch/grand/1654293386_%232YJ9Y8CY9_%23GGRJRYP2',
            'https://statsroyale.com/watch/grand/1654632342_%23G0QG0YY0Q_%23UQQG80GU9',
            'https://statsroyale.com/watch/grand/1654634275_%232C8GV0RQ8_%232L0UCYJC',
            'https://statsroyale.com/watch/grand/1654678630_%238Q20LRC8Y_%239QC8P9CPG',
            'https://statsroyale.com/watch/grand/1654687283_%2322Q0RJLJC_%232ULQRQCGJ',
            'https://statsroyale.com/watch/grand/1655105400_%232RQPVPPJJ_%238GC0LG8C2',
            'https://statsroyale.com/watch/top200/1550818951_%23PUURVPJR_%23QJ8PV9RP',
            'https://statsroyale.com/watch/top200/1551682896_%2398Q8LPQ9_%23LQ9RYVJC',
            'https://statsroyale.com/watch/top200/1555936079_%232RCCGG9V_%23CQ28URY0',
            'https://statsroyale.com/watch/top200/1565623604_%23V9QYP0G_%23VPVYY98',
            'https://statsroyale.com/watch/top200/1580667671_%232RGQQQJLQ_%2398QY9YCG',
            'https://statsroyale.com/watch/top200/1600164888_%23298CCJGJ2_%23VRR09LV9',
            'https://statsroyale.com/watch/top200/1602108006_%2399JQY2UU2_%239LGVVQ9C0',
            'https://statsroyale.com/watch/top200/1639070397_%238JRYJP82_%23LG9U2JPC',
            'https://statsroyale.com/watch/top200/1639453775_%2320J2QURU_%23298CCJGJ2',
            'https://statsroyale.com/watch/top200/1639809057_%2320P8LJPU9_%232R2RVYLR9',
            'https://statsroyale.com/watch/top200/1640473954_%239C8RPQ8G8_%23PURL2PGRP',
            'https://statsroyale.com/watch/top200/1644865209_%239R99CPCPL_%23PY2VP2YY9',
        ];

        $battle_id = $win_deck_id = $win_player_id = 1;
        foreach($list as $key => $item) {
            $contents = file_get_contents($item);
            preg_match('#(https://youtube.com/.*).autoplay#',$contents,$matches);
            $url = $matches[1];
            preg_match('# class="replayPlayer__name ui__mediumText ui__link"> (.*) </a>#',$contents,$nameMatches);
            preg_match_all('#deck=(.*)" class="copyButton#',$contents,$deckMatches);
            $winners_deck = $deckMatches[1][0];
            $losers_deck = $deckMatches[1][1];
            $arr = explode('_%23',$item);
            $winners_id = $arr[1];
            $losers_id = $arr[2];
            $this->saveBattle($battle_id,$url);
            $lose_player_id = $win_player_id + 1;
            $lose_deck_id = $win_deck_id + 1;
            $this->savePlayer($battle_id,$win_player_id,$winners_id,$lose_player_id,$losers_id);
            $this->saveDeck($battle_id,$win_deck_id,$winners_deck,$lose_deck_id,$losers_deck);
            $this->saveDeckPlayer($win_deck_id,$win_player_id,$lose_deck_id,$lose_player_id);
            $this->saveCardDeck($win_deck_id,$winners_deck,$lose_deck_id,$losers_deck);

            $battle_id++;
            $win_deck_id = $lose_deck_id + 1;
            $win_player_id = $win_player_id + 2;
        }
    }

    /**
     * 
     */
    private function saveBattle($battle_id,$url)
    {
        $result_battle = [
            'id' => $battle_id,
            'url' => $url,
            'created_at' => now(),
            'updated_at' => now()  
        ];
        DB::table('battles')->insert($result_battle);
    }

    /**
     * 
     */
    private function savePlayer($battle_id,$win_player_id,$winners_id,$lose_player_id,$losers_id)
    {
        $result_players = [
            [
                'id' => $win_player_id,
                'battle_id' => $battle_id,
                'cr_id' => $winners_id,
                // 'winners_name' => $nameMatches[1][0],
                // 'deck' => $winners_deck,
                'result' => 1,
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'id' => $lose_player_id,
                'battle_id' => $battle_id,
                'cr_id' => $losers_id,
                // 'winners_name' => $nameMatches[1][0],
                // 'deck' => $losers_deck,
                'result' => 0,
                'created_at' => now(),
                'updated_at' => now() 
            ],
        ];
        DB::table('players')->insert($result_players);
    }

    private function saveDeck($battle_id,$win_deck_id,$winners_deck,$lose_deck_id,$losers_deck)
    {
        $deck_result = [
            [
                'id' => $win_deck_id,
                'battle_id' => $battle_id,
                'name' => $this->createDeckName($winners_deck),
                'result' => 1,
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'id' => $lose_deck_id,
                'battle_id' => $battle_id,
                'name' => $this->createDeckName($losers_deck),
                'result' => 0,
                'created_at' => now(),
                'updated_at' => now()  
            ],
        ];
        DB::table('decks')->insert($deck_result);
    }

    /**
     * 
     */
    private function saveDeckPlayer($win_deck_id,$win_player_id,$lose_deck_id,$lose_player_id)
    {
        $deck_player_result = [
            [
                'deck_id' => $win_deck_id,
                'player_id' => $win_player_id,
                'created_at' => now(),
                'updated_at' => now()  
            ],
            [
                'deck_id' => $lose_deck_id,
                'player_id' => $lose_player_id,
                'created_at' => now(),
                'updated_at' => now()  
            ]                
        ];

        DB::table('deck_player')->insert($deck_player_result);
    }

    private function saveCardDeck($win_deck_id,$winners_deck,$lose_deck_id,$losers_deck)
    {
        $card_deck_result = [];

        $win_card_id_list = explode(';',$winners_deck);
        foreach($win_card_id_list as $win_card_id) {
            $card_deck_result[] = [
                'deck_id' => $win_deck_id,
                'card_id' => $win_card_id,
                'created_at' => now(),
                'updated_at' => now() 
            ];
        }
        $lose_card_id_list = explode(';',$losers_deck);
        foreach($lose_card_id_list as $lose_card_id) {
            $card_deck_result[] = [
                'deck_id' => $lose_deck_id,
                'card_id' => $lose_card_id,
                'created_at' => now(),
                'updated_at' => now() 
            ];
        }

        DB::table('card_deck')->insert($card_deck_result);
    }

    /**
     * デッキの名前を決める
     */
    private function createDeckName($deck)
    {
        return 'ペッカ攻城'; // todo
    }


    /*
     * クラロワAPIからカードの情報を登録
     */

    private function getCharactersInfo() {
        $data = [];
        $sourcePath = "https://raw.githubusercontent.com/RoyaleAPI/cr-api-data/master/docs/json/cards_i18n.json";
        $content = file_get_contents($sourcePath, false);
        $allCard = json_decode($content,true);
        foreach($allCard as $card){
            $index = rtrim($card['sc_key'],"s");
            $data[$index] = [
                'id' => $card['id'],
                'key' => $card['key'],
                'name_jp' => $card['_lang']['name']['jp'],
                'description_jp' => $card['_lang']['description']['jp'],
                'elixir' => $card['elixir'],
                'type' => $card['type'],
                'rarity' => $card['rarity'],
                'arena' => $card['arena'],
                'created_at' => now(),
                'updated_at' => now()  
            ];
        }
        return $data;
    }
}
