<?php

namespace Database\Seeders;

use App\Models\Sonko\Sonko;
use Illuminate\Database\Seeder;

class SonkoSeeder extends Seeder
{
    public function run()
    {
        $sonkos = [
            [
                'title' => 'АВТОНОМНАЯ НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ "ЦЕНТР ПСИХОЛОГИИ И РАЗВИТИЯ ЧЕЛОВЕКА "СФЕРА"',
                'address' => 'г Брянск, ул Молодой Гвардии, д 41, кв 3',
            ],
            [
                'title' => 'УЛЬЯНОВСКАЯ ОБЛАСТНАЯ ОБЩЕСТВЕННАЯ ОРГАНИЗАЦИЯ "СОВЕТ РОДИТЕЛЕЙ И ЧЛЕНОВ СЕМЕЙ ВОЕННОСЛУЖАЩИХ"',
                'address' => 'г Пенза, ул Кижеватова, д 14, кв 89',
            ],
            [
                'title' => 'САХАЛИНСКАЯ РЕГИОНАЛЬНАЯ ОБЩЕСТВЕННАЯ ОРГАНИЗАЦИЯ "УЧЕБНО-КУЛЬТУРНЫЙ ЦЕНТР "ТУГАН ТЕЛ" (РОДНОЙ ЯЗЫК)"',
                'address' => 'г Улан-Удэ, ул Жердева, д 88, оф 22',
            ],
            [
                'title' => 'БЛАГОТВОРИТЕЛЬНЫЙ ФОНД ОКАЗАНИЯ ПОМОЩИ ДЕТЯМ "РОСТОЧЕК"',
                'address' => 'г Ижевск, ул Пермская, д 20',
            ],
            [
                'title' => 'ФОНД ВОЗРОЖДЕНИЯ ИСТОРИЧЕСКОГО НАСЛЕДИЯ "ГУННСКИЙ ФОНД"',
                'address' => 'г Новосибирск, ул Учительская, д 61',
            ],
        ];

        foreach ($sonkos as $key => $sonko) {
            Sonko::query()->create([
                'title' => $sonko['title'],
                'address' => $sonko['address'],
                'email' => 'mail_' . $key .'_@mail.ru',
                'head' => 'Head_' . $key,
                'workers' => '1',
                'description' => 'desc',
                'phone' => '79999998899',
                'status' => 'active',
                'inn' => '325599012' . $key,
                'ogrn' => '111320000084' . $key
            ]);
        }
    }
}
