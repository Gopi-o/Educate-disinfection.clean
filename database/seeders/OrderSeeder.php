<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'user_id'        => 2,
                'service_id'     => 2,
                'client_name'    => 'Иван Петров',
                'client_phone'   => '+7 (900) 111-11-11',
                'client_email'   => 'ivan@mail.ru',
                'address'        => 'г. Москва, ул. Ленина, д. 15, кв. 42',
                'comment'        => 'Тараканы в кухне и ванной, срочно',
                'status'         => 'completed',
                'admin_comment'  => 'Обработка выполнена. Рекомендована повторная обработка через 14 дней.',
            ],
            [
                'user_id'        => 3,
                'service_id'     => 1,
                'client_name'    => 'Мария Сидорова',
                'client_phone'   => '+7 (900) 222-22-22',
                'client_email'   => 'maria@mail.ru',
                'address'        => 'г. Москва, пр. Мира, д. 100, офис 305',
                'comment'        => 'Дезинфекция офиса после COVID',
                'status'         => 'completed',
                'admin_comment'  => null,
            ],
            [
                'user_id'        => null,
                'service_id'     => 4,
                'client_name'    => 'Алексей К.',
                'client_phone'   => '+7 (900) 444-44-44',
                'client_email'   => null,
                'address'        => 'г. Москва, ул. Строителей, д. 8',
                'comment'        => 'Запах гари после пожара в подъезде',
                'status'         => 'processing',
                'admin_comment'  => 'Выезд назначен на завтра 10:00.',
            ],
            [
                'user_id'        => 4,
                'service_id'     => 3,
                'client_name'    => 'Алексей Кузнецов',
                'client_phone'   => '+7 (900) 333-33-33',
                'client_email'   => 'alex@mail.ru',
                'address'        => 'г. Москва, ш. Энтузиастов, д. 20, склад №5',
                'comment'        => 'Мыши на складе, нужна дератизация',
                'status'         => 'new',
                'admin_comment'  => null,
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
