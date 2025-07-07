<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('industries')->delete();
        
        DB::table('industries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'label' => 'Accounting',
                'slug' => 'accounting',
                'created_at' => '2024-10-12 10:57:37',
                'updated_at' => '2024-10-12 10:57:37',
            ),
            1 => 
            array (
                'id' => 2,
                'label' => 'Airlines/Aviation',
                'slug' => 'airlinesaviation',
                'created_at' => '2024-10-12 10:58:05',
                'updated_at' => '2024-10-12 10:58:05',
            ),
            2 => 
            array (
                'id' => 3,
                'label' => 'Alternative Dispute Resolution',
                'slug' => 'alternative-dispute-resolution',
                'created_at' => '2024-10-12 10:58:35',
                'updated_at' => '2024-10-12 10:58:35',
            ),
            3 => 
            array (
                'id' => 4,
                'label' => 'Alternative Medicine',
                'slug' => 'alternative-medicine',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            4 => 
            array (
                'id' => 5,
                'label' => 'Animation',
                'slug' => 'animation',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            5 => 
            array (
                'id' => 6,
                'label' => 'Apparel And Fashion',
                'slug' => 'apparel-and-fashion',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            6 => 
            array (
                'id' => 7,
                'label' => 'Architecture And Planning',
                'slug' => 'architecture-and-planning',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            7 => 
            array (
                'id' => 8,
                'label' => 'Arts And Crafts',
                'slug' => 'arts-and-crafts',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            8 => 
            array (
                'id' => 9,
                'label' => 'Automotive',
                'slug' => 'automotive',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            9 => 
            array (
                'id' => 10,
                'label' => 'Aviation And Aerospace',
                'slug' => 'aviation-and-aerospace',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            10 => 
            array (
                'id' => 11,
                'label' => 'Banking',
                'slug' => 'banking',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            11 => 
            array (
                'id' => 12,
                'label' => 'Biotechnology',
                'slug' => 'biotechnology',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            12 => 
            array (
                'id' => 13,
                'label' => 'Broadcast Media',
                'slug' => 'broadcast-media',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            13 => 
            array (
                'id' => 14,
                'label' => 'Building Materials',
                'slug' => 'building-materials',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            14 => 
            array (
                'id' => 15,
                'label' => 'Business Supplies And Equipment',
                'slug' => 'business-supplies-and-equipment',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            15 => 
            array (
                'id' => 16,
                'label' => 'Capital Markets',
                'slug' => 'capital-markets',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            16 => 
            array (
                'id' => 17,
                'label' => 'Chemicals',
                'slug' => 'chemicals',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            17 => 
            array (
                'id' => 18,
                'label' => 'Civic And Social Organization',
                'slug' => 'civic-and-social-organization',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            18 => 
            array (
                'id' => 19,
                'label' => 'Civil Engineering',
                'slug' => 'civil-engineering',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            19 => 
            array (
                'id' => 20,
                'label' => 'Commercial Real Estate',
                'slug' => 'commercial-real-estate',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            20 => 
            array (
                'id' => 21,
                'label' => 'Computer And Network Security',
                'slug' => 'computer-and-network-security',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            21 => 
            array (
                'id' => 22,
                'label' => 'Computer Games',
                'slug' => 'computer-games',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            22 => 
            array (
                'id' => 23,
                'label' => 'Computer Hardware',
                'slug' => 'computer-hardware',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            23 => 
            array (
                'id' => 24,
                'label' => 'Computer Networking',
                'slug' => 'computer-networking',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            24 => 
            array (
                'id' => 25,
                'label' => 'Computer Software',
                'slug' => 'computer-software',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            25 => 
            array (
                'id' => 26,
                'label' => 'Construction',
                'slug' => 'construction',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            26 => 
            array (
                'id' => 27,
                'label' => 'Consumer Electronics',
                'slug' => 'consumer-electronics',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            27 => 
            array (
                'id' => 28,
                'label' => 'Consumer Goods',
                'slug' => 'consumer-goods',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            28 => 
            array (
                'id' => 29,
                'label' => 'Consumer Services',
                'slug' => 'consumer-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            29 => 
            array (
                'id' => 30,
                'label' => 'Cosmetics',
                'slug' => 'cosmetics',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            30 => 
            array (
                'id' => 31,
                'label' => 'Dairy',
                'slug' => 'dairy',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            31 => 
            array (
                'id' => 32,
                'label' => 'Defense And Space',
                'slug' => 'defense-and-space',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            32 => 
            array (
                'id' => 33,
                'label' => 'Design',
                'slug' => 'design',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            33 => 
            array (
                'id' => 34,
                'label' => 'Education Management',
                'slug' => 'education-management',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            34 => 
            array (
                'id' => 35,
                'label' => 'E-Learning',
                'slug' => 'e-learning',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            35 => 
            array (
                'id' => 36,
                'label' => 'Electrical And Electronic Manufacturing',
                'slug' => 'electrical-and-electronic-manufacturing',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            36 => 
            array (
                'id' => 37,
                'label' => 'Entertainment',
                'slug' => 'entertainment',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            37 => 
            array (
                'id' => 38,
                'label' => 'Environmental Services',
                'slug' => 'environmental-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            38 => 
            array (
                'id' => 39,
                'label' => 'Events Services',
                'slug' => 'events-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            39 => 
            array (
                'id' => 40,
                'label' => 'Executive Office',
                'slug' => 'executive-office',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            40 => 
            array (
                'id' => 41,
                'label' => 'Facilities Services',
                'slug' => 'facilities-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            41 => 
            array (
                'id' => 42,
                'label' => 'Farming',
                'slug' => 'farming',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            42 => 
            array (
                'id' => 43,
                'label' => 'Financial Services',
                'slug' => 'financial-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            43 => 
            array (
                'id' => 44,
                'label' => 'Fine Art',
                'slug' => 'fine-art',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            44 => 
            array (
                'id' => 45,
                'label' => 'Fishery',
                'slug' => 'fishery',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            45 => 
            array (
                'id' => 46,
                'label' => 'Food And Beverages',
                'slug' => 'food-and-beverages',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            46 => 
            array (
                'id' => 47,
                'label' => 'Food Production',
                'slug' => 'food-production',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            47 => 
            array (
                'id' => 48,
                'label' => 'Fundraising',
                'slug' => 'fundraising',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            48 => 
            array (
                'id' => 49,
                'label' => 'Furniture',
                'slug' => 'furniture',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            49 => 
            array (
                'id' => 50,
                'label' => 'Gambling And Casinos',
                'slug' => 'gambling-and-casinos',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            50 => 
            array (
                'id' => 51,
                'label' => 'Glass, Ceramics And Concrete',
                'slug' => 'glass-ceramics-and-concrete',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            51 => 
            array (
                'id' => 52,
                'label' => 'Government Administration',
                'slug' => 'government-administration',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            52 => 
            array (
                'id' => 53,
                'label' => 'Government Relations',
                'slug' => 'government-relations',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            53 => 
            array (
                'id' => 54,
                'label' => 'Graphic Design',
                'slug' => 'graphic-design',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            54 => 
            array (
                'id' => 55,
                'label' => 'Health, Wellness And Fitness',
                'slug' => 'health-wellness-and-fitness',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            55 => 
            array (
                'id' => 56,
                'label' => 'Higher Education',
                'slug' => 'higher-education',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            56 => 
            array (
                'id' => 57,
                'label' => 'Hospital And Health Care',
                'slug' => 'hospital-and-health-care',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            57 => 
            array (
                'id' => 58,
                'label' => 'Hospitality',
                'slug' => 'hospitality',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            58 => 
            array (
                'id' => 59,
                'label' => 'Human Resources',
                'slug' => 'human-resources',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            59 => 
            array (
                'id' => 60,
                'label' => 'Import And Export',
                'slug' => 'import-and-export',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            60 => 
            array (
                'id' => 61,
                'label' => 'Individual And Family Services',
                'slug' => 'individual-and-family-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            61 => 
            array (
                'id' => 62,
                'label' => 'Industrial Automation',
                'slug' => 'industrial-automation',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            62 => 
            array (
                'id' => 63,
                'label' => 'Information Services',
                'slug' => 'information-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            63 => 
            array (
                'id' => 64,
                'label' => 'Information Technology And Services',
                'slug' => 'information-technology-and-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            64 => 
            array (
                'id' => 65,
                'label' => 'Insurance',
                'slug' => 'insurance',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            65 => 
            array (
                'id' => 66,
                'label' => 'International Affairs',
                'slug' => 'international-affairs',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            66 => 
            array (
                'id' => 67,
                'label' => 'International Trade And Development',
                'slug' => 'international-trade-and-development',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            67 => 
            array (
                'id' => 68,
                'label' => 'Internet',
                'slug' => 'internet',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            68 => 
            array (
                'id' => 69,
                'label' => 'Investment Banking/Venture',
                'slug' => 'investment-bankingventure',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            69 => 
            array (
                'id' => 70,
                'label' => 'Investment Management',
                'slug' => 'investment-management',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            70 => 
            array (
                'id' => 71,
                'label' => 'Judiciary',
                'slug' => 'judiciary',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            71 => 
            array (
                'id' => 72,
                'label' => 'Law Enforcement',
                'slug' => 'law-enforcement',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            72 => 
            array (
                'id' => 73,
                'label' => 'Law Practice',
                'slug' => 'law-practice',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            73 => 
            array (
                'id' => 74,
                'label' => 'Legal Services',
                'slug' => 'legal-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            74 => 
            array (
                'id' => 75,
                'label' => 'Legislative Office',
                'slug' => 'legislative-office',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            75 => 
            array (
                'id' => 76,
                'label' => 'Leisure And Travel',
                'slug' => 'leisure-and-travel',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            76 => 
            array (
                'id' => 77,
                'label' => 'Libraries',
                'slug' => 'libraries',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            77 => 
            array (
                'id' => 78,
                'label' => 'Logistics And Supply Chain',
                'slug' => 'logistics-and-supply-chain',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            78 => 
            array (
                'id' => 79,
                'label' => 'Luxury Goods And Jewelry',
                'slug' => 'luxury-goods-and-jewelry',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            79 => 
            array (
                'id' => 80,
                'label' => 'Machinery',
                'slug' => 'machinery',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            80 => 
            array (
                'id' => 81,
                'label' => 'Management Consulting',
                'slug' => 'management-consulting',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            81 => 
            array (
                'id' => 82,
                'label' => 'Maritime',
                'slug' => 'maritime',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            82 => 
            array (
                'id' => 83,
                'label' => 'Marketing And Advertising',
                'slug' => 'marketing-and-advertising',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            83 => 
            array (
                'id' => 84,
                'label' => 'Market Research',
                'slug' => 'market-research',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            84 => 
            array (
                'id' => 85,
                'label' => 'Mechanical Or Industrial Engineering',
                'slug' => 'mechanical-or-industrial-engineering',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            85 => 
            array (
                'id' => 86,
                'label' => 'Media Production',
                'slug' => 'media-production',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            86 => 
            array (
                'id' => 87,
                'label' => 'Medical Device',
                'slug' => 'medical-device',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            87 => 
            array (
                'id' => 88,
                'label' => 'Medical Practice',
                'slug' => 'medical-practice',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            88 => 
            array (
                'id' => 89,
                'label' => 'Mental Health Care',
                'slug' => 'mental-health-care',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            89 => 
            array (
                'id' => 90,
                'label' => 'Military',
                'slug' => 'military',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            90 => 
            array (
                'id' => 91,
                'label' => 'Mining And Metals',
                'slug' => 'mining-and-metals',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            91 => 
            array (
                'id' => 92,
                'label' => 'Motion Pictures And Film',
                'slug' => 'motion-pictures-and-film',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            92 => 
            array (
                'id' => 93,
                'label' => 'Museums And Institutions',
                'slug' => 'museums-and-institutions',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            93 => 
            array (
                'id' => 94,
                'label' => 'Music',
                'slug' => 'music',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            94 => 
            array (
                'id' => 95,
                'label' => 'Nanotechnology',
                'slug' => 'nanotechnology',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            95 => 
            array (
                'id' => 96,
                'label' => 'Newspapers',
                'slug' => 'newspapers',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            96 => 
            array (
                'id' => 97,
                'label' => 'Non-Profit Organization Management',
                'slug' => 'non-profit-organization-management',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            97 => 
            array (
                'id' => 98,
                'label' => 'Oil And Energy',
                'slug' => 'oil-and-energy',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            98 => 
            array (
                'id' => 99,
                'label' => 'Online Publishing',
                'slug' => 'online-publishing',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            99 => 
            array (
                'id' => 100,
                'label' => 'Outsourcing/Offshoring',
                'slug' => 'outsourcingoffshoring',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            100 => 
            array (
                'id' => 101,
                'label' => 'Package/Freight Delivery',
                'slug' => 'packagefreight-delivery',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            101 => 
            array (
                'id' => 102,
                'label' => 'Packaging And Containers',
                'slug' => 'packaging-and-containers',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            102 => 
            array (
                'id' => 103,
                'label' => 'Paper And Forest Products',
                'slug' => 'paper-and-forest-products',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            103 => 
            array (
                'id' => 104,
                'label' => 'Performing Arts',
                'slug' => 'performing-arts',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            104 => 
            array (
                'id' => 105,
                'label' => 'Pharmaceuticals',
                'slug' => 'pharmaceuticals',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            105 => 
            array (
                'id' => 106,
                'label' => 'Philanthropy',
                'slug' => 'philanthropy',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            106 => 
            array (
                'id' => 107,
                'label' => 'Photography',
                'slug' => 'photography',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            107 => 
            array (
                'id' => 108,
                'label' => 'Plastics',
                'slug' => 'plastics',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            108 => 
            array (
                'id' => 109,
                'label' => 'Political Organization',
                'slug' => 'political-organization',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            109 => 
            array (
                'id' => 110,
                'label' => 'Primary/Secondary Education',
                'slug' => 'primarysecondary-education',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            110 => 
            array (
                'id' => 111,
                'label' => 'Printing',
                'slug' => 'printing',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            111 => 
            array (
                'id' => 112,
                'label' => 'Professional Training',
                'slug' => 'professional-training',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            112 => 
            array (
                'id' => 113,
                'label' => 'Program Development',
                'slug' => 'program-development',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            113 => 
            array (
                'id' => 114,
                'label' => 'Public Policy',
                'slug' => 'public-policy',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            114 => 
            array (
                'id' => 115,
                'label' => 'Public Relations',
                'slug' => 'public-relations',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            115 => 
            array (
                'id' => 116,
                'label' => 'Public Safety',
                'slug' => 'public-safety',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            116 => 
            array (
                'id' => 117,
                'label' => 'Publishing',
                'slug' => 'publishing',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            117 => 
            array (
                'id' => 118,
                'label' => 'Railroad Manufacture',
                'slug' => 'railroad-manufacture',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            118 => 
            array (
                'id' => 119,
                'label' => 'Ranching',
                'slug' => 'ranching',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            119 => 
            array (
                'id' => 120,
                'label' => 'Real Estate',
                'slug' => 'real-estate',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            120 => 
            array (
                'id' => 121,
                'label' => 'Recreational Facilities And Services',
                'slug' => 'recreational-facilities-and-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            121 => 
            array (
                'id' => 122,
                'label' => 'Religious Institutions',
                'slug' => 'religious-institutions',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            122 => 
            array (
                'id' => 123,
                'label' => 'Renewables And Environment',
                'slug' => 'renewables-and-environment',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            123 => 
            array (
                'id' => 124,
                'label' => 'Research',
                'slug' => 'research',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            124 => 
            array (
                'id' => 125,
                'label' => 'Restaurants',
                'slug' => 'restaurants',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            125 => 
            array (
                'id' => 126,
                'label' => 'Retail',
                'slug' => 'retail',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            126 => 
            array (
                'id' => 127,
                'label' => 'Security And Investigations',
                'slug' => 'security-and-investigations',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            127 => 
            array (
                'id' => 128,
                'label' => 'Security Systems Services',
                'slug' => 'security-systems-services',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            128 => 
            array (
                'id' => 129,
                'label' => 'Semiconductors',
                'slug' => 'semiconductors',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            129 => 
            array (
                'id' => 130,
                'label' => 'Shipbuilding',
                'slug' => 'shipbuilding',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            130 => 
            array (
                'id' => 131,
                'label' => 'Sporting Goods',
                'slug' => 'sporting-goods',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            131 => 
            array (
                'id' => 132,
                'label' => 'Sports',
                'slug' => 'sports',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            132 => 
            array (
                'id' => 133,
                'label' => 'Staffing And Recruiting',
                'slug' => 'staffing-and-recruiting',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            133 => 
            array (
                'id' => 134,
                'label' => 'Supermarkets',
                'slug' => 'supermarkets',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            134 => 
            array (
                'id' => 135,
                'label' => 'Telecommunications',
                'slug' => 'telecommunications',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            135 => 
            array (
                'id' => 136,
                'label' => 'Textiles',
                'slug' => 'textiles',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            136 => 
            array (
                'id' => 137,
                'label' => 'Think Tanks',
                'slug' => 'think-tanks',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            137 => 
            array (
                'id' => 138,
                'label' => 'Tobacco',
                'slug' => 'tobacco',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            138 => 
            array (
                'id' => 139,
                'label' => 'Translation And Localization',
                'slug' => 'translation-and-localization',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            139 => 
            array (
                'id' => 140,
                'label' => 'Transportation/Trucking/Railroad',
                'slug' => 'transportationtruckingrailroad',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            140 => 
            array (
                'id' => 141,
                'label' => 'Utilities',
                'slug' => 'utilities',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            141 => 
            array (
                'id' => 142,
                'label' => 'Venture Capital',
                'slug' => 'venture-capital',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            142 => 
            array (
                'id' => 143,
                'label' => 'Veterinary',
                'slug' => 'veterinary',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            143 => 
            array (
                'id' => 144,
                'label' => 'Warehousing',
                'slug' => 'warehousing',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            144 => 
            array (
                'id' => 145,
                'label' => 'Wholesale',
                'slug' => 'wholesale',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            145 => 
            array (
                'id' => 146,
                'label' => 'Wine And Spirits',
                'slug' => 'wine-and-spirits',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            146 => 
            array (
                'id' => 147,
                'label' => 'Wireless',
                'slug' => 'wireless',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
            147 => 
            array (
                'id' => 148,
                'label' => 'Writing And Editing',
                'slug' => 'writing-and-editing',
                'created_at' => '2024-10-12 12:09:32',
                'updated_at' => '2024-10-12 12:09:32',
            ),
        ));
        
        
    }
}