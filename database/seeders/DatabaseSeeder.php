<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

use App\Models\Event;
use App\Models\EventPromo;
use App\Models\EventTicketCategory;
use App\Models\EventType;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserRole::insert([
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Customer'
            ],
            [
                'name' => 'Event Organizer'
            ]
        ]);

        User::create([
            'user_role_id' => '3',
            'firstname' => 'Test',
            'lastname' => 'Event Organizer',
            'email' => 'eo@gmail.com',
            'password' => 'eo123',
            'date_of_birth' => '2001-01-01',
            'phone' => '081234567890'
        ]);

        for ($i = 0; $i < 20; $i++)
        { 
            $customerID = $i + 2;

            User::create([
                'user_role_id' => '2',
                'firstname' => 'Test',
                'lastname' => "Customer {$customerID}",
                'email' => "customer{$customerID}@gmail.com",
                'password' => 'customer123',
                'date_of_birth' => '2001-01-01',
                'phone' => '081234567890'
            ]);
        }

        EventType::insert([
            [
                'name' => 'Fast Selling Ticket'
            ],
            [
                'name' => 'Regular Event'
            ]
        ]);

        Event::insert([
            [
                'event_organizer_id' => '1',
                'event_type_id' => '1',
                'name' => 'Born Pink World Tour',
                'artist' => 'Blackpink',
                'description' => 'Born Pink World Tour is the ongoing second worldwide concert tour by South Korean girl group Blackpink in support of their second Korean studio album Born Pink. The tour began on October 15, 2022 in Seoul, South Korea and is set to conclude on August 26, 2023 in Los Angeles, United States. Upon conclusion, the tour will have visited 21 countries in four continents.',
                'thumbnail_path' => 'born-pink-world-tour-thumbnail.jpg',
                'banner_path' => 'born-pink-world-tour-banner.png',
                'city_and_province' => 'Jakarta Pusat, DKI Jakarta',
                'place' => 'Gelora Bung Karno',
                'gradient_cover_color' => '#BF3861',
                'start_date' => '2023-03-11',
                'end_date' => '2023-03-12',
                'start_time' => '19:00:00',
                'end_time' => '23:30:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '1',
                'name' => 'Love On Tour',
                'artist' => 'Harry Styles',
                'description' => 'Love On Tour is the ongoing second concert tour by English singer-songwriter Harry Styles, in support of his second and third studio albums, Fine Line, which was released on 13 December 2019, and Harry\'s House, which was released on 20 May 2022. The tour consists of seven legs spreading over the course of 22 months starting on 4 September 2021 in Las Vegas, Nevada, and is set to finish on 22 July 2023 in Reggio Emilia, Italy.',
                'thumnail_path' => 'love-on-tour-thumbnail.png',
                'banner_path' => 'love-on-tour-banner.jpg',
                'city_and_province' => 'Jakarta Pusat, DKI Jakarta',
                'place' => 'Gelora Bung Karno',
                'gradient_cover_color' => '#BF3861',
                'start_date' => '2023-11-01',
                'end_date' => '2023-11-03',
                'start_time' => '16:00:00',
                'end_time' => '23:30:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '2',
                'name' => 'The Dream Show 2',
                'artist' => 'NCT Dream',
                'description' => 'The Dream Show 2: In A Dream (stylized as NCT DREAM TOUR \'THE DREAM SHOW2 : In A DREAM\') is an ongoing second concert tour headlined by NCT Dream, the third sub-unit of South Korean boy group NCT, in support of their second studio album Glitch Mode (2022). The tour, which kicked off in September 2022, was the group\'s first in-person concert tour in three years.',
                'thumnail_path' => 'the-dream-show-2-thumbnail.png',
                'banner_path' => 'the-dream-show-2-banner.jpg',
                'city_and_province' => 'Tangerang, Banten',
                'place' => 'Indonesia Convention Exhibition (ICE) BSD City',
                'gradient_cover_color' => '#F08455',
                'start_date' => '2023-03-04',
                'end_date' => '2023-03-06',
                'start_time' => '18:30:00',
                'end_time' => '22:30:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '2',
                'name' => 'Tau Tau Fest',
                'artist' => 'Rizky Febian, Raissa Anggiani, Efek Rumah Kaca, Juicy Luicy',
                'description' => 'Tau Tau Festival adalah festival musik yang digarap Seraya Group, promotor yang berbasis di Bandung. Seraya Group memiliki latar belakang ekspertis di bidang event management, mulai dari konser, festival sampai MICE. Seraya Group bertujuan memberikan pengalaman yang baru dan menyenangkan dengan rangkaian festival yang sudah ada.',
                'thumnail_path' => 'tau-tau-festival-thumbnail.jpg',
                'banner_path' => 'tau-tau-festival-banner.jpg',
                'city_and_province' => 'Bandung, Jawa Barat',
                'place' => 'Lapangan Pussenif',
                'gradient_cover_color' => '#000000',
                'start_date' => '2023-05-28',
                'end_date' => '2023-05-28',
                'start_time' => '12:00:00',
                'end_time' => '23:00:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '2',
                'name' => 'Semesta Berpesta',
                'artist' => 'Isyana Sarasvati, Ungu, Kunto Aji, Pamungkas, Anji',
                'description' => ' Indonesia akan dihentak oleh gelombang musik yang memikat dan semarak dengan hadirnya festival musik terbaru, Semesta Berpesta! Beberapa nama besar di dunia hiburan tanah air, termasuk Isyana Sarasvati, Ungu, Danilla, hingga Anji, akan turut memeriahkan festival musik Semesta Berpesta yang akan digelar selama dua hari berturut-turut, yaitu pada 3-4 Juni 2023 di Plaza Parkir ICE BSD Tangerang.',
                'thumnail_path' => 'semesta-berpesta-thumbnail.jpg',
                'banner_path' => 'semesta-berpesta-banner.jpg',
                'city_and_province' => 'Tangerang, Banten',
                'place' => 'Indonesia Convention Exhibition (ICE) BSD City',
                'gradient_cover_color' => '#000000',
                'start_date' => '2023-06-03',
                'end_date' => '2023-06-04',
                'start_time' => '10:00:00',
                'end_time' => '22:00:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '2',
                'name' => 'Podcast Festival Indonesia',
                'artist' => 'Isyana Saraswati, Ungu, Kunto Aji, Pamungkas, Anji',
                'description' => 'Festival Podcast Pertama di Indonesia oleh @podkesmasasia & @boss.creator bersama @spotifyid yang 100% tanpa sensor! #LucuTerusDiSpotify',
                'thumnail_path' => 'podcast-festival-indonesia-thumbnail.jpg',
                'banner_path' => 'podcast-festival-indonesia-banner.jpg',
                'city_and_province' => 'Jakarta Selatan, DKI Jakarta',
                'place' => 'M Bloc Space',
                'gradient_cover_color' => '#000000',
                'start_date' => '2023-06-03',
                'end_date' => '2023-06-03',
                'start_time' => '10:00:00',
                'end_time' => '22:00:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '2',
                'name' => 'Indonesia Open 2023',
                'artist' => 'Kapal Api Group',
                'description' => 'PP PBSI akan menggelar turnamen Indonesia Open 2023 pada bulan Juni mendatang. Induk organisasi bulutangkis nasional itu tengah dalam tahap pematangan dengan sponsor. Demikian disampaikan Ketua Komisi Pengembangan Komersial PP PBSI Armand Darmadji, yang juga Ketua panitia pelaksana Indonesia Open 2023, menyoal kesiapan tuan rumah menggelar event super 1000 tersebut.',
                'thumnail_path' => 'indonesia-open-2023-thumbnail.jpg',
                'banner_path' => 'indonesia-open-2023-banner.jpg',
                'city_and_province' => 'Jakarta Pusat, DKI Jakarta',
                'place' => 'Gelora Bung Karno',
                'gradient_cover_color' => '#000000',
                'start_date' => '2023-06-13',
                'end_date' => '2023-06-18',
                'start_time' => '12:00:00',
                'end_time' => '23:00:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '2',
                'name' => 'Festival Budaya Manggarai',
                'artist' => 'EventJakarta',
                'description' => 'Hai semua 🙋‍♀️

                Ada festival budaya yang unik & istimewa dari Timur Indonesia lho!

                Apalagi kalau bukan:
                FESTIVAL BUDAYA MANGGARAI 2023 🎉🎉🎉

                Yg masih bertanya-tanya, Manggarai itu dimana… Kalian pasti tahu Labuan Bajo, Pulau Komodo, Wae Rebo bukan? Nah destinasi wisata yang indah & menakjubkan ini terletak di Kabupaten Manggarai Barat dan Kabupaten Manggarai, Nusa Tenggara Timur. Kelompok etnis Manggarai mendiami daerah Manggarai yang terletak di pulau Flores, Nusa Tenggara Timur. Suku Manggarai mempunyai beragam budaya yang belum banyak dikenal luas.

                KPM (Komunitas Perempuan Manggarai) pertama kali memprakasai festival ini di tahun 2019. Kali ini dalam rangka Hari Ulang Tahun DKI Jakarta ke 496 bekerja sama dengan IKMKJ & IKAMASI dengan mengangkat tema “Ca Nai, Ca Manggarai, Tana Kuni Agu Kalo” (Satu Hati, Satu Manggarai, Tanah Tempat Kelahiran) KPM kembali menggelar Festival Budaya Manggarai, untuk menjadi sarana bagi khalayak luas mengenal lebih dalam tentang budaya Manggarai.

                Kegiatannya apa saja?

                Talk Show Budaya Manggarai
                Talk Show Pendidikan
                Misa Inkulturasi Manggarai
                Fashion Show Tenunan Manggarai
                Pentas Caci
                Pentas Musik & Seni Budaya
                Tarian Kolosal “Narasi Perempuan Manggarai”
                Bazaar UMKM kuliner, hasil alam & kerajinan tangan Manggarai & beragam produk lainnya
                Siap jatuh cinta dengan pesona budaya Tanah Manggarai? 💖
                Catat tanggal dan lokasinya ya!📝

                Yuuk datang ke #festivalbudayamanggarai2023

                Stay tune for more info!',
                'thumnail_path' => 'festival-budaya-manggarai-thumbnail.jpg',
                'banner_path' => 'festival-budaya-manggarai-banner.jpg',
                'city_and_province' => 'Jakarta Timur, DKI Jakarta',
                'place' => 'Anjungan NTT Taman Mini Indonesia Indah',
                'gradient_cover_color' => '#000000',
                'start_date' => '2023-06-24',
                'end_date' => '2023-06-25',
                'start_time' => '10:00:00',
                'end_time' => '22:00:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '2',
                'name' => 'RUPAREKA: MERAKI - "LIGHT UP YOUR PASSION"',
                'artist' => 'SEIV Paint, Jazlyn Eliana, Drs. M. Nashir Setiawan, M.Hum,',
                'description' => '❗ATTENTION PLEASE❗
                RUPAREKA 2023 : MERAKI finally will be launched this year 🥳

                Rupareka merupakan festival seni dan desain tahunan yang digelar oleh Badan Eksekutif Mahasiswa (BEM) Fakultas Seni Rupa dan Desain Universitas Tarumanagara setiap tahunnya. Tahun in Rupareka kembali digelar secara luar jaringan, setelah dua tahun penyelenggaraanya dilaksanakan melalui platform online.

                Save the date and join us the excitement this year 😁',
                'thumnail_path' => 'light-up-your-passion-thumbnail.png',
                'banner_path' => 'light-up-your-passion-banner.jpg',
                'city_and_province' => 'Jakarta Pusat, DKI Jakarta',
                'place' => 'Lapangan Benteng Park',
                'gradient_cover_color' => '#000000',
                'start_date' => '2023-06-08',
                'end_date' => '2023-06-01',
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
                'status' => 'APPROVED'
            ],
            [
                'event_organizer_id' => '1',
                'event_type_id' => '2',
                'name' => 'INDONESIA COMIC CON 2023',
                'artist' => 'Garry Gastonny, Rian CYD, Yumaki, Vestia Zeta, Kureiji Ollie',
                'description' => 'Bringing the Best Pop Culture Experience💥
                •
                INDONESIA COMIC CON “POP ASIA”
                23-25 June 2023',
                'thumnail_path' => 'indonesia-comic-con-2023-thumbnail.jpg',
                'banner_path' => 'indonesia-comic-con-2023-banner.jpg',
                'city_and_province' => 'Jakarta Pusat, DKI Jakarta',
                'place' => 'Jakarta Convention Center Hall A & B',
                'gradient_cover_color' => '#000000',
                'start_date' => '2023-06-23',
                'end_date' => '2023-06-25',
                'start_time' => '08:00:00',
                'end_time' => '18:00:00',
                'status' => 'APPROVED'
            ]
        ]);

        EventTicketCategory::insert([
            [
                'event_id' => '1',
                'category' => 'CAT 1',
                'price' => 2900000,
                'capacity' => 1000
            ],
            [
                'event_id' => '1',
                'category' => 'CAT 2',
                'price' => 2600000,
                'capacity' => 1000
            ],
            [
                'event_id' => '1',
                'category' => 'CAT 3',
                'price' => 21000000,
                'capacity' => 1000
            ],
            [
                'event_id' => '1',
                'category' => 'CAT 4',
                'price' => 1350000,
                'capacity' => 1000
            ],
            [
                'event_id' => '1',
                'category' => 'VIP',
                'price' => 3800000,
                'capacity' => 1000
            ],
            [
                'event_id' => '1',
                'category' => 'Platinum',
                'price' => 3400000,
                'capacity' => 1000
            ],
            [
                'event_id' => '2',
                'category' => 'CAT 1',
                'price' => 2500000,
                'capacity' => 1000
            ],
            [
                'event_id' => '2',
                'category' => 'CAT 2',
                'price' => 2000000,
                'capacity' => 1000
            ],
            [
                'event_id' => '2',
                'category' => 'VIP',
                'price' => 4200000,
                'capacity' => 1000
            ],
            [
                'event_id' => '3',
                'category' => 'CAT 1',
                'price' => 2750000,
                'capacity' => 1000
            ],
            [
                'event_id' => '3',
                'category' => 'CAT 2',
                'price' => 2550000,
                'capacity' => 1000
            ],
            [
                'event_id' => '3',
                'category' => 'CAT 3',
                'price' => 2450000,
                'capacity' => 1000
            ],
            [
                'event_id' => '3',
                'category' => 'CAT 4',
                'price' => 1700000,
                'capacity' => 1000
            ],
            [
                'event_id' => '3',
                'category' => 'CAT 5',
                'price' => 1500000,
                'capacity' => 1000
            ],
            [
                'event_id' => '3',
                'category' => 'CAT 6',
                'price' => 10000000,
                'capacity' => 1000
            ],
            [
                'event_id' => '4',
                'category' => 'Reguler',
                'price' => 170500,
                'capacity' => 1000
            ],
            [
                'event_id' => '4',
                'category' => 'VIP',
                'price' => 314500,
                'capacity' => 20
            ],
            [
                'event_id' => '5',
                'category' => 'GA Pass 1',
                'price' => 200000,
                'capacity' => 1000
            ],
            [
                'event_id' => '5',
                'category' => 'GA Pass 2',
                'price' => 350000,
                'capacity' => 1000
            ],
            [
                'event_id' => '6',
                'category' => 'Reguler',
                'price' => 125000,
                'capacity' => 1000
            ],
            [
                'event_id' => '6',
                'category' => 'VIP',
                'price' => 250000,
                'capacity' => 1000
            ],
            [
                'event_id' => '7',
                'category' => 'CAT 1',
                'price' => 350000,
                'capacity' => 1000
            ],
            [
                'event_id' => '7',
                'category' => 'CAT 2',
                'price' => 250000,
                'capacity' => 1000
            ],
            [
                'event_id' => '7',
                'category' => 'VIP',
                'price' => 550000,
                'capacity' => 1000
            ],
            [
                'event_id' => '8',
                'category' => 'Reguler',
                'price' => 10000,
                'capacity' => 1000
            ],
            [
                'event_id' => '9',
                'category' => 'Reguler',
                'price' => 50000,
                'capacity' => 1000
            ],
            [
                'event_id' => '10',
                'category' => 'General',
                'price' => 200000,
                'capacity' => 1000
            ],
            [
                'event_id' => '10',
                'category' => 'After Dark (Gold)',
                'price' => 650000,
                'capacity' => 1000
            ],
            [
                'event_id' => '10',
                'category' => 'After Dark (Diamond)',
                'price' => 750000,
                'capacity' => 1000
            ],
            [
                'event_id' => '10',
                'category' => 'Ultimate Access',
                'price' => 2500000,
                'capacity' => 1000
            ]
        ]);

        $dateNow = now();
        $dateAdd5Days = now()->addDays(5);

        for ($i = 0; $i < 20; $i++)
        { 
            EventPromo::create([
                'event_id' => rand(1, 10),
                'code' => Str::upper(Str::random(8)),
                'start_date' => $dateNow,
                'end_date' => $dateAdd5Days,
                'discount_percentage' => rand(20, 50),
                'description' => 'Lorem ipsum'
            ]);
        }

        $dummyTransactionDataCount = 1;
        while($dummyTransactionDataCount <= 60)
        {
            $randomCustomerID = rand(2, 21);
            $randomEventID = rand(1, 10);
            $randomEvent = Event::find($randomEventID);

            $earliestEventStartDate = Event::orderBy('start_date', 'asc')->first()->start_date;

            $ticketCategoryList = EventTicketCategory::where('event_id', $randomEventID)->get();
            $randomTicketCategoryIndex = rand(0, count($ticketCategoryList) - 1);
            $randomTicketCategory = $ticketCategoryList->slice($randomTicketCategoryIndex, 1)->first();

            $randomQty = rand(1, 10);

            if($randomEvent->event_type_id == 1)
            {
                // Fast Selling Ticket
                $checkUserCanOnlyBuyOneTicket = Transaction::where('customer_id', $randomCustomerID)->where('event_id', $randomEventID)->get();
                if($checkUserCanOnlyBuyOneTicket->sum('qty') >= 2)
                {
                    continue;
                }

                $randomQty = rand(1, 2);
            }

            $ticketAvailable = $randomTicketCategory->capacity - Transaction::where('event_ticket_category_id', $randomTicketCategory->id)->sum('qty');
            if($ticketAvailable - $randomQty < 0)
            {
                continue;
            }
            
            $randomDay = rand(0, 60);

            Transaction::create([
                'customer_id' => $randomCustomerID,
                'event_id' => $randomEventID,
                'event_ticket_category_id' => $randomTicketCategory->id,
                'event_promo_id' => NULL,
                'selected_date' => $randomEvent->start_date,
                'purchase_date' => $earliestEventStartDate->modify("-$randomDay day"),
                'qty' => $randomQty,
                'total_price' => ($randomTicketCategory->price * $randomQty) + ($randomTicketCategory->price * $randomQty * 0.03),
                'start_pay_date' => $randomEvent->start_date,
                'payment_method' => 'BCA',
                'status' => 'PAID'
            ]);

            $dummyTransactionDataCount++;
        }
    }
}
