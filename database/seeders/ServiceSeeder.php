<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title'       => 'Дезинфекция помещений',
                'slug'        => 'dezinfekciya-pomeshchenij',
                'description' => 'Уничтожение вирусов, бактерий, грибков и патогенных микроорганизмов на любых поверхностях. Используем сертифицированные препараты 4 класса опасности — безопасно для людей и животных. Обработка методом холодного и горячего тумана.',
                'image'       => 'services/dezinfekciya.jpg',
                'price'       => 1500.00,
                'sort_order'  => 1,
            ],
            [
                'title'       => 'Дезинсекция',
                'slug'        => 'dezinsekciya',
                'description' => 'Уничтожение тараканов, клопов, блох, муравьев, ос, комаров и других насекомых-вредителей. Гарантия отсутствия насекомых — 12 месяцев. Бесплатный повторный выезд при необходимости.',
                'image'       => 'services/dezinsekciya.jpg',
                'price'       => 2000.00,
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Дератизация',
                'slug'        => 'deratizaciya',
                'description' => 'Борьба с крысами, мышами и другими грызунами. Закрытие входных отверстий, установка приманок и капканов. Разработка плана профилактики для предприятий.',
                'image'       => 'services/deratizaciya.jpg',
                'price'       => 2500.00,
                'sort_order'  => 3,
            ],
            [
                'title'       => 'Дезодорация',
                'slug'        => 'dezodoraciya',
                'description' => 'Устранение неприятных запахов после пожара, затопления, разложения органики, табака, животных. Используем профессиональные озонаторы и абсорбенты.',
                'image'       => 'services/dezodoraciya.jpg',
                'price'       => 3000.00,
                'sort_order'  => 4,
            ],
            [
                'title'       => 'СЭС-заключение',
                'slug'        => 'ses-zaklyuchenie',
                'description' => 'Оформление санитарно-эпидемиологического заключения для ресторанов, кафе, производств, школ, детских садов. Помощь в подготовке к проверке Роспотребнадзора.',
                'image'       => 'services/ses.jpg',
                'price'       => 15000.00,
                'sort_order'  => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
