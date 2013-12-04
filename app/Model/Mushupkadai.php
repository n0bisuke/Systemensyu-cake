<?php
class Mushupkadai extends Model{
	public $name = 'Mushupkadai';
	public $useTable = false;

	public function useapi(){
		//はてなブックまーく
        $url = "http://b.hatena.ne.jp/rsksound/favorite.rss?limit=10";
        $hatena = simplexml_load_file($url);
        //キーフレーズ
        $url =  "http://jlp.yahooapis.jp/KeyphraseService/V1/extract";
        $url .= "?appid=dj0zaiZpPWE3Z2FyaFVqZ1RMYyZzPWNvbnN1bWVyc2VjcmV0Jng9Yzc-";
        $url .= "&sentence=";
        
        $output['title'] = (string)$hatena->channel->title;
        foreach ($hatena->item as $key => $value){
            //ブックマークたいとる
            $tmp['title'] = (string)$value->title;
            //ブックマークのキーワード
            $url2 = $url.$value->title;
            $keyword = simplexml_load_file($url2);
            $tmp['keyword'] = (string)$keyword->Result[0]->Keyphrase;
            //ブックマークURL
            $tmp['link'] = (string)$value->link;
            //ブックマークの説明
            $tmp['description'] = (string)$value->description;
            $output['content'][] = $tmp;
        }
        return $output;
	}
}
?>