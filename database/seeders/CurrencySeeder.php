<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            ['symbol' => '$', 'name' => 'Dollar'],
            ['symbol' => '€', 'name' => 'Euro'],
            ['symbol' => '£', 'name' => 'Pound Sterling'],
            ['symbol' => '¥', 'name' => 'Yen'],
            ['symbol' => '₹', 'name' => 'Rupee'],
            ['symbol' => 'A$', 'name' => 'Australian Dollar'],
            ['symbol' => 'C$', 'name' => 'Canadian Dollar'],
            ['symbol' => 'CHF', 'name' => 'Swiss Franc'],
            ['symbol' => '₩', 'name' => 'South Korean Won'],
            ['symbol' => '₽', 'name' => 'Russian Ruble'],
            ['symbol' => 'R$', 'name' => 'Brazilian Real'],
            ['symbol' => 'MX$', 'name' => 'Mexican Peso'],
            ['symbol' => 'R', 'name' => 'South African Rand'],
            ['symbol' => '₪', 'name' => 'Israeli Shekel'],
            ['symbol' => 'S$', 'name' => 'Singapore Dollar'],
            ['symbol' => 'HK$', 'name' => 'Hong Kong Dollar'],
            ['symbol' => 'kr', 'name' => 'Swedish Krona'],
            ['symbol' => 'kr', 'name' => 'Norwegian Krone'],
            ['symbol' => 'kr', 'name' => 'Danish Krone'],
            ['symbol' => 'NZ$', 'name' => 'New Zealand Dollar'],
            ['symbol' => 'NT$', 'name' => 'New Taiwan Dollar'],
            ['symbol' => '฿', 'name' => 'Thai Baht'],
            ['symbol' => '₫', 'name' => 'Vietnamese Dong'],
            ['symbol' => '₦', 'name' => 'Nigerian Naira'],
            ['symbol' => '₵', 'name' => 'Ghanaian Cedi'],
            ['symbol' => 'Q', 'name' => 'Guatemalan Quetzal'],
            ['symbol' => 'L', 'name' => 'Honduran Lempira'],
            ['symbol' => 'C$', 'name' => 'Nicaraguan Cordoba'],
            ['symbol' => 'RD$', 'name' => 'Dominican Peso'],
            ['symbol' => 'B$', 'name' => 'Bahamian Dollar'],
            ['symbol' => 'Bds$', 'name' => 'Barbadian Dollar'],
            ['symbol' => 'J$', 'name' => 'Jamaican Dollar'],
            ['symbol' => 'TT$', 'name' => 'Trinidad and Tobago Dollar'],
            ['symbol' => 'EC$', 'name' => 'East Caribbean Dollar'],
            ['symbol' => 'G$', 'name' => 'Guyanese Dollar'],
            ['symbol' => 'B$', 'name' => 'Belize Dollar'],
            ['symbol' => 'GHS', 'name' => 'Ghanaian Cedi'],
            ['symbol' => 'Ksh', 'name' => 'Kenyan Shilling'],
            ['symbol' => 'Tsh', 'name' => 'Tanzanian Shilling'],
            ['symbol' => 'USh', 'name' => 'Ugandan Shilling'],
            ['symbol' => 'EGP', 'name' => 'Egyptian Pound'],
            ['symbol' => 'MAD', 'name' => 'Moroccan Dirham'],
            ['symbol' => 'Dhs', 'name' => 'United Arab Emirates Dirham'],
            ['symbol' => 'SAR', 'name' => 'Saudi Riyal'],
            ['symbol' => 'KWD', 'name' => 'Kuwaiti Dinar'],
            ['symbol' => 'BHD', 'name' => 'Bahraini Dinar'],
            ['symbol' => 'OMR', 'name' => 'Omani Rial'],
            ['symbol' => 'JOD', 'name' => 'Jordanian Dinar'],
            ['symbol' => 'IQD', 'name' => 'Iraqi Dinar'],
            ['symbol' => 'PKR', 'name' => 'Pakistani Rupee'],
            ['symbol' => 'PLN', 'name' => 'Polish Zloty'],
            ['symbol' => 'CZK', 'name' => 'Czech Koruna'],
            ['symbol' => 'HUF', 'name' => 'Hungarian Forint'],
            ['symbol' => 'TRY', 'name' => 'Turkish Lira'],
            ['symbol' => 'PHP', 'name' => 'Philippine Peso'],
            ['symbol' => 'MYR', 'name' => 'Malaysian Ringgit'],
            ['symbol' => 'IDR', 'name' => 'Indonesian Rupiah'],
            ['symbol' => 'BDT', 'name' => 'Bangladeshi Taka'],
            ['symbol' => 'LKR', 'name' => 'Sri Lankan Rupee'],
            ['symbol' => 'MMK', 'name' => 'Myanmar Kyat'],
        ];

        DB::table('currencies')->insert($currencies);
    }
}
