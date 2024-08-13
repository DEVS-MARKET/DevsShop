<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'site_name' => 'My Site',
            'site_description' => 'My Site Description',
            'site_google_analytics' => '',
            'payment_settings' => json_encode([
                'transfer' => 'stripe',
                'paypal' => 'paypal',
                'direct_billing' => 'hotpay',
                'paysafecard' => 'paysafecard',
            ]),
            'social_links' => json_encode([
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'youtube' => '',
                'discord' => '',
            ]),
            'footer_links' => json_encode([
                'terms' => '',
                'privacy' => '',
                'imprint' => '',
            ]),
            'paypal' => json_encode([
                'client_id' => '',
                'client_secret' => '',
                'mode' => 'sandbox',
            ]),
            'stripe' => json_encode([
                'secret_key' => '',
                'webhook_secret' => '',
                'mode' => 'sandbox',
            ]),
            'hotpay' => json_encode([
                'secret' => '',
                'notification_password' => '',
            ]),
            'cashbill' => json_encode([
                'shopId' => '',
                'shopKey' => '',
                'mode' => 'sandbox',
            ]),
            'paybylink' => json_encode([
                'shopId' => '',
                'hash' => '',
                'mode' => 'sandbox',
            ]),
            'dpay' => json_encode([
                'serviceName' => '',
                'serviceHash' => '',
                'guid' => '',
                'secretKey' => '',
                'mode' => 'sandbox',
            ]),
            'przelewy24' => json_encode([
                'merchantId' => '',
                'posId' => '',
                'crc' => '',
                'raportKey' => '',
                'mode' => 'sandbox',
            ]),
            'simpay' => json_encode([
                'api_key' => '',
                'api_secret' => '',
                'mode' => 'sandbox',
            ]),
            'getpay' => json_encode([
                'api_key' => '',
                'api_secret' => '',
                'mode' => 'sandbox',
            ]),
            'imoje' => json_encode([
                'merchantId' => '',
                'serviceId' => '',
                'api_secret' => '',
                'mode' => 'sandbox',
            ]),
        ];

        foreach ($settings as $key => $value) {
            $setting = new Setting();
            $setting->key = $key;
            $setting->value = $value;
            $setting->save();
        }
    }
}
