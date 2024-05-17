<?php


namespace App\Helpers;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class SeoKeyWords
{


	public static function getMetaKeywordsByLang($lang)
	{
		$func_name = $lang . 'MetaKeywords';
		return self::$func_name();

	}


	private static function enMetaKeywords(){
		$data['meta_title']    = "Hurghada & Sharm ElSheikh Tours | Explore the Best Tours in Hurghada & Sharm ElSheikh, Egypt";
		$data ['meta_desc']    = "Discover the wonders of Hurghada & Sharm ElSheikh  with our guided tours. Dive into the Red Sea, explore ancient ruins, and experience the vibrant culture of Egypt. Book your unforgettable adventure today!";
		$data['meta_keywords'] = "
		 Sharm El Sheikh tours,	
		 Egypt tours,	
		 Red Sea diving,	
		 Sharm El Sheikh excursions,	
		 cultural tours Sharm El Sheikh,	
		 Things to do in Sharm El Sheikh,	
		 Sharm El Sheikh sightseeing,	
		 Sharm El Sheikh day trips,	
		 Sharm El Sheikh diving tours,	
		 Sharm El Sheikh snorkeling tours,	
		 Sharm El Sheikh desert safari,	
		 Sharm El Sheikh boat trips,	
		 Sharm El Sheikh Red Sea tours,	
		 Best tours in Sharm El Sheikh,	
		 Sharm El Sheikh city tours,	
		 Sharm El Sheikh quad biking,	
		 Sharm El Sheikh jeep safari,	
		 Sharm El Sheikh adventure tours,	
		 Hurghada tours,	
		 Egypt tours,	
		 Red Sea diving,	
		 Hurghada excursions,	
		 cultural tours Hurghada,	
		 Things to do in HurgadaHurgada sightseeing,	
		 Hurgada day trips,	
		 Hurgada snorkeling tours,	
		 Hurgada diving tours,	
		 Hurgada desert safari,	
		 Hurgada boat trips,	
		 Hurgada Red Sea tours,	
		 Best tours in Hurgada,	
		 Hurgada city tours,	
		 Hurgada quad biking,	
		 Hurgada jeep safari,	
		 Hurgada adventure tours,	
		 reef,	
		 coral,	
		 sunrise,	
		 Egypt tours,	
		 Naama Bay,	
		 Ras Mohammed National Park,	
		 Shark's Bay,	
		 Soho Square,	
		 Tiran Island,	
		 Nabq Bay,	
		 Dolphin Reef,	
		 Mount Sinai,	
		 Dahab,	
		 Hurghada Marina,	
		 El Dahar,	
		 Hurghada Grand Aquarium,	
		 Makadi Bay,	
		 Giftun Islands,	
		 Sand City Hurghada,	
		 Senzo Mall,	
		 El Gouna,	
		 Hurghada Marina Boulevard,	
		 Sahl Hasheesh";

		return $data;

	}

	private static function itMetaKeywords()
	{
		$data['meta_title']    = "Tour di Hurghada e Sharm El Sheikh | Esplora i migliori tour a Hurghada e Sharm ElSheikh,	in Egitto";
		$data ['meta_desc']    = "Scopri le meraviglie di Hurghada e Sharm ElSheikh con le nostre visite guidate. Tuffati nel Mar Rosso, esplora antiche rovine e vivi la vibrante cultura dell'Egitto. Prenota oggi la tua avventura indimenticabile!";
		$data['meta_keywords'] = "Tour di Sharm El Sheikh,	
		Tour in Egitto, immersioni nel Mar Rosso,Escursioni a Sharm El Sheikh,tour culturali Sharm El Sheikh,Cose da fare a Sharm El Sheikh,Visita turistica di Sharm El Sheikh,Gite di un giorno a Sharm El Sheikh,Tour subacquei a Sharm El Sheikh,Tour di snorkeling a Sharm El Sheikh,Safari nel deserto di Sharm El Sheikh,Gite in barca a Sharm El Sheikh,Tour del Mar Rosso a Sharm El Sheikh,I migliori tour a Sharm El Sheikh,Tour della città di Sharm El Sheikh,Quad a Sharm El Sheikh,Safari in jeep a Sharm El Sheikh,Tour avventurosi di Sharm El Sheikh,Tour di Hurghada,Tour in Egitto,Immersioni nel Mar Rosso,Escursioni a Hurghada,tour culturali Hurghada,Cose da fare a HurgadaVisita di Hurgada,Gite di un giorno a Hurgada,Tour di snorkeling a Hurgada,Tour subacquei di Hurgada,Safari nel deserto di Hurgada,Gite in barca a Hurgada,Tour del Mar Rosso a Hurgada,I migliori tour a Hurgada,Tour della città di Hurgada,Quad di Hurgada,Safari in jeep a Hurgada,Tour avventurosi di Hurgada,barriera corallina,corallo,alba,Tour in Egitto,Baia di Naama,Parco Nazionale di Ras Mohammed,Baia degli Squali,Piazza Soho,Isola di Tiran,Baia di Nabq,Barriera corallina dei delfini,Monte Sinai,Dahab,Marina di Hurghada,El Dahar,Grande Acquario di Hurghada,Baia di Makadi,Isole Giftun,Città di sabbia di Hurghada,Centro Commerciale Senzo,El Gouna,Hurghada Marina Boulevard,Sahl Hasheesh";

		return $data;

	}

	private static function ruMetaKeywords()
	{
		$data['meta_title']    = "Туры в Хургаду и Шарм-эль-Шейх | Откройте для себя лучшие туры в Хургаде и Шарм-эль-Шейхе, Египет";
		$data ['meta_desc']    = "Откройте для себя чудеса Хургады и Шарм-эль-Шейха во время наших экскурсий. Погрузитесь в Красное море, исследуйте древние руины и познакомьтесь с яркой культурой Египта. Забронируйте свое незабываемое приключение сегодня!";
		$data['meta_keywords'] = "Экскурсии по Шарм-Эль-Шейху,Туры в Египет, дайвинг на Красном море,Экскурсии в Шарм-эль-Шейхе,культурные туры Шарм-эль-Шейх,Чем заняться в Шарм-эль-Шейхе?Осмотр достопримечательностей Шарм-эль-Шейха,Шарм-эль-Шейх: однодневные поездки,Шарм-эль-Шейх, дайвинг-туры,Шарм-эль-Шейх сноркелинг-туры,Сафари по пустыне Шарм-эль-Шейха,Шарм-эль-Шейх, морские прогулки,Шарм-эль-Шейх: туры на Красное море,Лучшие туры в Шарм-эль-Шейхе,Экскурсии по Шарм-эль-Шейху,Шарм-эль-Шейх катание на квадроциклах,Джип-сафари в Шарм-эль-Шейхе,Приключенческие туры в Шарм-эль-Шейхе,туры в Хургаду,туры в Египет,Дайвинг на Красном море,экскурсии по Хургаде,культурные туры Хургада,Чем заняться в Хургадеосмотр достопримечательностей Хургады,Однодневные поездки в Хургаду,подводное плавание в Хургаде,Дайв-туры в Хургаду,Сафари в пустыне Хургады,Морские прогулки по Хургаде,Экскурсии по Красному морю в Хургаде,Лучшие туры в Хургаду,экскурсии по Хургаде,Хургада катание на квадроциклах,Джип-сафари в Хургаде,приключенческие туры по Хургаде,риф,коралл,восход,туры в Египет,Наама Бэй,Национальный парк Рас Мохаммед,Шаркс Бэй,Площадь Сохо,остров Тиран,Набк Бэй,Дельфиний риф,гора Синай,Дахаб,Хургада Марина,Эль Дахар,Большой Аквариум Хургады,Макади Бэй,Острова Гифтун,Песчаный город Хургада,Торговый центр Сензо,Эль Гуна,Хургада Бульвар Марина,Сахл Хашиш";

		return $data;

	}


}
