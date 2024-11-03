<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\type;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'title' => 'About Us',
            'description' => '<p><strong>Cobell Shot</strong> adalah studio fotografi yang didirikan dengan semangat untuk menangkap momen-momen berharga dalam hidup Anda. Kami percaya bahwa setiap foto adalah cerita yang unik, dan kami berkomitmen untuk membantu Anda mendokumentasikan kisah tersebut dengan cara yang kreatif dan profesional.</p><p>Dengan pengalaman yang luas dalam berbagai genre fotografi, termasuk pernikahan, pre-wedding, acara korporat, dan potret pribadi, tim kami terdiri dari fotografer berpengalaman yang memiliki keahlian dalam menciptakan gambar yang tidak hanya indah tetapi juga penuh emosi. Kami memahami betapa pentingnya setiap momen, dan kami berusaha untuk memberikan layanan terbaik dengan perhatian penuh terhadap detail.</p><p>Di Cobell Shot, kami menggunakan peralatan fotografi terkini dan teknik pengeditan modern untuk memastikan setiap hasil foto memenuhi standar tertinggi. Kami percaya bahwa komunikasi yang baik dengan klien adalah kunci untuk menciptakan gambar yang sesuai dengan visi Anda. Oleh karena itu, kami selalu mendengarkan keinginan dan kebutuhan Anda untuk menghasilkan karya yang tepat dan memuaskan.</p><p>Bergabunglah dengan kami dalam perjalanan ini untuk mengabadikan kenangan indah Anda. Setiap klik adalah kesempatan untuk menciptakan sesuatu yang luar biasa. Hubungi kami hari ini untuk menjadwalkan sesi pemotretan atau untuk mendiskusikan ide-ide Anda!</p>',
            'type' => 'aboutus',
        ]);

        Page::create([
            'title' => 'Contact Us',
            'description' => 'Pasir Kaliki, Bandung, Indonesia<br>',
            'type' => 'contactus',
            'email' => 'infocobell@gmail.com',
            'phone_number' => '6222732335',
        ]);
    }
}
