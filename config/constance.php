<?php

return [

    /***
     * All the categories for the app
     * -----------------------------------------------------------------------------------------------------------------
     */
    'categories' => [
        1 => [
            'name'   => "Electronics",
            'slug'   => "electronics",
            'image'  => env('APP_URL').'images/categories/electronics.png',
            'sub_cat'    => [
                1 => [
                    'name' => 'All',
                    'slug' => 'electronics',
                    'image' => env('APP_URL').'images/categories/electronics.png'
                ],
                2 => [
                    'name' => 'Mobile Phones & Accessories',
                    'slug' => 'mobile-phone-and-accessories',
                    'image' => env('APP_URL').'images/categories/smartphone.png'
                ],
                3 => [
                    'name' => 'Computers , Laptops & TABS',
                    'slug' => 'computers-laptops-and-tabs',
                    'image' => env('APP_URL').'images/categories/computers.png'
                ],
                4 => [
                    'name' => 'Cameras, Drones  & Accessories',
                    'slug' => 'cameras-drones-and-accessories',
                    'image' => env('APP_URL').'images/categories/camera.png'
                ],
                5 => [
                    'name' => 'TV, LCD,LED',
                    'slug' => 'tv-lcd-led',
                    'image' => env('APP_URL').'images/categories/television.png'
                ],
                6 => [
                    'name' => 'DVD & Home Theater',
                    'slug' => 'dvd-and-home-theater',
                    'image' => env('APP_URL').'images/categories/home_theater.png'
                ],
                7 => [
                    'name' => 'Games & Entertainment',
                    'slug' => 'games-and-entertainment',
                    'image' => env('APP_URL').'images/categories/games.png'
                ],
                8 => [
                    'name' => 'Home Appliances',
                    'slug' => 'home-appliances',
                    'image' => env('APP_URL').'images/categories/iron.png'
                ],
                9 => [
                    'name' => 'Tools',
                    'slug' => 'electronic-tools',
                    'image' => env('APP_URL').'images/categories/backup.png'
                ],
                10 => [
                    'name' => 'Others',
                    'slug' => 'electronic-others',
                    'image' => env('APP_URL').'images/categories/blueprint.png'
                ],
            ]
        ],
        2 => [
            'name'   => "Fashion & Life Style",
            'slug'   => "fashion_and_life_style",
            'image'  => env('APP_URL').'images/categories/fashion_and_life_style.png',
            'sub_cat' => [
                11 => [
                    'name'   => "All",
                    'slug'   => "fashion_and_life_style",
                    'image'  => env('APP_URL').'images/categories/fashion_and_life_style.png',
                ],
                12 => [
                    'name'   => "Watches & Accessories",
                    'slug'   => "watches-and-accessories",
                    'image'  => env('APP_URL').'images/categories/smartwatch.png',
                ],
                13 => [
                    'name'   => "Jewellery",
                    'slug'   => "jewellery",
                    'image'  => env('APP_URL').'images/categories/rings.png',
                ],
                14 => [
                    'name'   => "Clothing",
                    'slug'   => "clothing",
                    'image'  => env('APP_URL').'images/categories/laundry.png',
                ],
                15 => [
                    'name'   => "Shoes",
                    'slug'   => "shoes",
                    'image'  => env('APP_URL').'images/categories/shoe.png',
                ],
                16 => [
                    'name'   => "Bags & luggage",
                    'slug'   => "bags_and_luggage",
                    'image'  => env('APP_URL').'images/categories/backpack.png',
                ],
                17 => [
                    'name'   => "Vision care",
                    'slug'   => "vision_care",
                    'image'  => env('APP_URL').'images/categories/sunglasses.png',
                ],
                18 => [
                    'name'   => "Other",
                    'slug'   => "fashion_others",
                    'image'  => env('APP_URL').'images/categories/purse.png',
                ],
            ]
        ],
        3 => [
            'name'   => "Cars & Vehicles",
            'slug'   => "car_and_vehicles",
            'image'  => env('APP_URL').'images/categories/car_and_vehicles.png',
            'sub_cat' => [
                19 => [
                    'name'   => "All",
                    'slug'   => "car_and_vehicles",
                    'image'  => env('APP_URL').'images/categories/car_and_vehicles.png',
                ],
                20 => [
                    'name'   => "Cars",
                    'slug'   => "cars",
                    'image'  => env('APP_URL').'images/categories/car.png',
                ],
                21 => [
                    'name'   => "Motor bikes & Scooters",
                    'slug'   => "motor_bikes_and_scooters",
                    'image'  => env('APP_URL').'images/categories/motor-bike.png',
                ],
                22 => [
                    'name'   => "Three wheelers",
                    'slug'   => "three_wheelers",
                    'image'  => env('APP_URL').'images/categories/rickshaw.png',
                ],
                23 => [
                    'name'   => "Buses, Vans & Lorries",
                    'slug'   => "buses_van_and_lorries",
                    'image'  => env('APP_URL').'images/categories/school-bus.png',
                ],
                24 => [
                    'name'   => "Heavy Vehicles & Tractors",
                    'slug'   => "heavy_vehicles_and_tractors",
                    'image'  => env('APP_URL').'images/categories/tractor.png',
                ],
                25 => [
                    'name'   => "Push Cycles",
                    'slug'   => "push_cycles",
                    'image'  => env('APP_URL').'images/categories/bycicle.png',
                ],
                26 => [
                    'name'   => "Boats & Water Transport",
                    'slug'   => "boat_and_water_transport",
                    'image'  => env('APP_URL').'images/categories/boat.png',
                ],
                27 => [
                    'name'   => "Auto Parts & Accessories",
                    'slug'   => "auto_parts_and_accessories",
                    'image'  => env('APP_URL').'images/categories/car-parts.png',
                ],
                28 => [
                    'name'   => "Others",
                    'slug'   => "vehicle_others",
                    'image'  => env('APP_URL').'images/categories/electric-car.png',
                ],
            ]
        ],
        4 => [
            'name'   => "Hobby, Sport & Kids",
            'slug'   => "hobby_sport_and_kids",
            'image'  => env('APP_URL').'images/categories/hobby_sport_and_kids.png',
            'sub_cat' => [
                29 => [
                    'name'   => "All",
                    'slug'   => "hobby_sport_and_kids",
                    'image'  => env('APP_URL').'images/categories/hobby_sport_and_kids.png',
                ],
                30 => [
                    'name'   => "Fitness",
                    'slug'   => "fitness",
                    'image'  => env('APP_URL').'images/categories/gym.png',
                ],
                31 => [
                    'name'   => "Sports equipments",
                    'slug'   => "sport_equipments",
                    'image'  => env('APP_URL').'images/categories/basketball.png',
                ],
                32 => [
                    'name'   => "Travels & Tickets",
                    'slug'   => "travels_and_tickets",
                    'image'  => env('APP_URL').'images/categories/tickets.png',
                ],
                33 => [
                    'name'   => "Music & Movies",
                    'slug'   => "music_and_movies",
                    'image'  => env('APP_URL').'images/categories/film-reel.png',
                ],
                34 => [
                    'name'   => "Kids Collections",
                    'slug'   => "kids_collections",
                    'image'  => env('APP_URL').'images/categories/puzzle.png',
                ],
                35 => [
                    'name'   => "Others",
                    'slug'   => "hobby_others",
                    'image'  => env('APP_URL').'images/categories/ice-skates.png',
                ],
            ]
        ],
        5 => [
            'name'   => "Pets & Animals",
            'slug'   => "pets_and_animals",
            'image'  => env('APP_URL').'images/categories/pets_and_animals.png',
            'sub_cat' => [
                36 => [
                    'name'   => "All",
                    'slug'   => "pets_and_animals",
                    'image'  => env('APP_URL').'images/categories/pets_and_animals.png',
                ],
                37 => [
                    'name'   => "Pets",
                    'slug'   => "pets",
                    'image'  => env('APP_URL').'images/categories/bulldog.png',
                ],
                38 => [
                    'name'   => "Aquarium",
                    'slug'   => "aquarium",
                    'image'  => env('APP_URL').'images/categories/fish.png',
                ],
                39 => [
                    'name'   => "Veterinary Services",
                    'slug'   => "veterinary_service",
                    'image'  => env('APP_URL').'images/categories/medicine.png',
                ],
                40 => [
                    'name'   => "Pet Care & Foods",
                    'slug'   => "pet_care_and_foods",
                    'image'  => env('APP_URL').'images/categories/dog-food.png',
                ],
                41 => [
                    'name'   => "Others",
                    'slug'   => "pet_others",
                    'image'  => env('APP_URL').'images/categories/tortoise.png',
                ],
            ]
        ],
        6 => [
            'name'   => "Jobs",
            'slug'   => "jobs",
            'image'  => env('APP_URL').'images/categories/jobs.png',
            'sub_cat' => [
                42 => [
                    'name'   => "All",
                    'slug'   => "jobs",
                    'image'  => env('APP_URL').'images/categories/jobs.png',
                ],
                43 => [
                    'name'   => "Accounting",
                    'slug'   => "accounting",
                    'image'  => env('APP_URL').'images/categories/accounting.png',
                ],
                44 => [
                    'name'   => "Marketing",
                    'slug'   => "marketing",
                    'image'  => env('APP_URL').'images/categories/sales.png',
                ],
                45 => [
                    'name'   => "Agriculture",
                    'slug'   => "agriculture",
                    'image'  => env('APP_URL').'images/categories/plants.png',
                ],
                46 => [
                    'name'   => "Automobile",
                    'slug'   => "automobile",
                    'image'  => env('APP_URL').'images/categories/mechanic.png',
                ],
                47 => [
                    'name'   => "Aviation & Marine",
                    'slug'   => "aviation_and_marine",
                    'image'  => env('APP_URL').'images/categories/pilot.png',
                ],
                48 => [
                    'name'   => "Bakery & Foods",
                    'slug'   => "bakery_and_foods",
                    'image'  => env('APP_URL').'images/categories/pasta.png',
                ],
                49 => [
                    'name'   => "Banking",
                    'slug'   => "banking",
                    'image'  => env('APP_URL').'images/categories/bank.png',
                ],
                50 => [
                    'name'   => "Civil Engineering & Construction",
                    'slug'   => "civil_engineering_and_construction",
                    'image'  => env('APP_URL').'images/categories/building.png',
                ],
                51 => [
                    'name'   => "Engineering & Architecture",
                    'slug'   => "engineering_and_architecture",
                    'image'  => env('APP_URL').'images/categories/sketch.png',
                ],
                52 => [
                    'name'   => "Fashion & Beauty",
                    'slug'   => "fashion_and_beauty",
                    'image'  => env('APP_URL').'images/categories/makeover.png',
                ],
                53 => [
                    'name'   => "Government & Public",
                    'slug'   => "government_and_public",
                    'image'  => env('APP_URL').'images/categories/government-buildings.png',
                ],
                54 => [
                    'name'   => "Hotel & Hospitality",
                    'slug'   => "hotel_and_hospitality",
                    'image'  => env('APP_URL').'images/categories/valet.png',
                ],
                55 => [
                    'name'   => "Health Care",
                    'slug'   => "healthcare",
                    'image'  => env('APP_URL').'images/categories/hospital.png',
                ],
                56 => [
                    'name'   => "IT & Telecom",
                    'slug'   => "it_and_telecom",
                    'image'  => env('APP_URL').'images/categories/24-hours.png',
                ],
                57 => [
                    'name'   => "Legal",
                    'slug'   => "legal",
                    'image'  => env('APP_URL').'images/categories/law.png',
                ],
                58 => [
                    'name'   => "Logistics & Transpiration",
                    'slug'   => "logistics_and_transportation",
                    'image'  => env('APP_URL').'images/categories/boxes.png',
                ],
                59 => [
                    'name'   => "Medical & Pharmaceutical",
                    'slug'   => "medical_and_pharmaceutical",
                    'image'  => env('APP_URL').'images/categories/vaccine.png',
                ],
                60 => [
                    'name'   => "News & Media",
                    'slug'   => "news_nad_media",
                    'image'  => env('APP_URL').'images/categories/newspaper.png',
                ],
                61 => [
                    'name'   => "Office & Administration",
                    'slug'   => "office_and_administration",
                    'image'  => env('APP_URL').'images/categories/man.png',
                ],
                62 => [
                    'name'   => "Security",
                    'slug'   => "security",
                    'image'  => env('APP_URL').'images/categories/policeman.png',
                ],
                63 => [
                    'name'   => "Teaching & Education",
                    'slug'   => "teaching_and_education",
                    'image'  => env('APP_URL').'images/categories/professor.png',
                ],
                64 => [
                    'name'   => "Others",
                    'slug'   => "jobs_others",
                    'image'  => env('APP_URL').'images/categories/job.png',
                ],
            ]
        ],
        7 => [
            'name'   => "Property",
            'slug'   => "property",
            'image'  => env('APP_URL').'images/categories/property.png',
            'sub_cat' => [
                65 => [
                    'name'   => "All",
                    'slug'   => "property",
                    'image'  => env('APP_URL').'images/categories/property.png',
                ],
                66 => [
                    'name'   => "Apartments & Rooms",
                    'slug'   => "apartments_and_rooms",
                    'image'  => env('APP_URL').'images/categories/double-bed.png',
                ],
                67 => [
                    'name'   => "Houses",
                    'slug'   => "houses",
                    'image'  => env('APP_URL').'images/categories/farm.png',
                ],
                68 => [
                    'name'   => "Lands",
                    'slug'   => "lands",
                    'image'  => env('APP_URL').'images/categories/fields.png',
                ],
                69 => [
                    'name'   => "Others",
                    'slug'   => "property_others",
                    'image'  => env('APP_URL').'images/categories/house.png',
                ],
            ]
        ],
        8 => [
            'name'   => "Education",
            'slug'   => "education",
            'image'  => env('APP_URL').'images/categories/education.png',
            'sub_cat' => [
                70 => [
                    'name'   => "All",
                    'slug'   => "education",
                    'image'  => env('APP_URL').'images/categories/education.png',
                ],
                71 => [
                    'name'   => "International Education",
                    'slug'   => "international_education",
                    'image'  => env('APP_URL').'images/categories/day-and-night.png',
                ],
                72 => [
                    'name'   => "Tuition",
                    'slug'   => "tuition",
                    'image'  => env('APP_URL').'images/categories/teacher.png',
                ],
                73 => [
                    'name'   => "Vocational",
                    'slug'   => "vocational",
                    'image'  => env('APP_URL').'images/categories/vocational.png',
                ],
                74 => [
                    'name'   => "Others",
                    'slug'   => "education_others",
                    'image'  => env('APP_URL').'images/categories/physics.png',
                ],
            ]
        ],
        9 => [
            'name'   => "Other",
            'slug'   => "other",
            'image'  => env('APP_URL').'images/categories/other.png',
            'sub_cat' => [
                75 => [
                    'name'   => "All",
                    'slug'   => "other",
                    'image'  => env('APP_URL').'images/categories/other.png',
                ],
            ]
        ]
    ],

    /**
     * Available user types for the system
     * -----------------------------------------------------------------------------------------------------------------
     */
    'user_types' => [
        'corporate' => 3,
        'individual' => 1,
        'admin' => 2
    ],


    /**
     * Website Pages
     * -----------------------------------------------------------------------------------------------------------------
     * */
    'pages' => [
        1 => 'Landing Page',
        2 => 'Corporate Ads Page',
        3 => 'Individual Ads Page',
        4 => 'Single Ad Page',
        6 => 'Listing Page'
    ],


    /**
     * Banner ad posting locations
     * -----------------------------------------------------------------------------------------------------------------
     */
    'locations' => [
        1 => 'Top',
        2 => 'Middle',
        3 => 'Bottom',
        4 => 'Left',
        5 => 'Right'
    ],




    /**
     * Available district in SriLanka
     * -----------------------------------------------------------------------------------------------------------------
     */
    'districts' => [
        1=>'Colombo' ,
        2=>'Kandy' ,
        3=>'Galle' ,
        4=>'Ampara',
        5=>'Anuradhapura' ,
        6=>'Badulla',
        7=>'Batticaloa',
        8=>'Gampaha' ,
        9=> 'Hambantota',
        10=>'Jaffna' ,
        11=>'Kaluthara',
        12=>'Kegalle',
        13=>'Kilinochchi',
        14=>'Kurunagala' ,
        15=>'Mannar',
        16=>'Matale',
        17=>'Matara',
        18=>'Moneragala',
        19=>'Mullativu' ,
        20=>'Polonnaruwa',
        21=>'Puttalam',
        22=>'Ratnapura',
        23=>'Trincomalee',
        24=>'Vavuniya',
        25=>'Nuwara eliya'

    ],
    'admin_email'=>'adrpdmail@gmail.com'
];
