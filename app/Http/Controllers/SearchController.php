<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->input('search');
        $max_page = 20;
        $results = $this->search($q, $max_page);
        return view('themes.besmart.search', compact('results', 'q'));
    }

    /**
     * Полнотекстовый поиск.
     *
     * @param string $q Строка содержащая поисковый запрос. Может быть несколько фраз разделенных пробелом.
     * @param integer $count Количество найденных результатов выводимых на одной странице (для пагинации)
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function search($q, $count){
        $query = mb_strtolower($q, 'UTF-8');
        $arr = explode(" ", $query); //разбивает строку на массив по разделителю
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($arr as $word)
        {
            $len = mb_strlen($word, 'UTF-8');
            switch (true)
            {
                case ($len <= 3):
                    {
                        $query[] = $word . "*";
                        break;
                    }
                case ($len > 3 && $len <= 6):
                    {
                        $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 6 && $len <= 9):
                    {
                        $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 9):
                    {
                        $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query); //объединяет массив в строку
        // Таблица для поиска
        $results = Product::whereRaw(
            "MATCH(title,full_description) AGAINST(? IN BOOLEAN MODE)", // name,email - поля, по которым нужно искать
            $qQeury)->paginate($count) ;
        return $results;
    }
}
