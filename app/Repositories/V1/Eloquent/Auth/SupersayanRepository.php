<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\Contents;
use App\Repositories\V1\Eloquent\BaseRepository;
use App\Models\Users;
use App\Models\Roles;
use App\Models\MasterMenus;
use App\Models\Menus;
use App\Models\MenuDetails;
use App\Models\PermissionAccess;
use App\Models\Permissions;
use GuzzleHttp\Promise\Create;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Hash;


class SupersayanRepository extends BaseRepository
{
    protected $users;
    protected $roles;
    protected $masterMenus;

    public function __construct(
        Users $users,
        Roles $roles,
        MasterMenus $masterMenus,
    ) {
        $this->users = $users;
        $this->roles = $roles;
        $this->masterMenus = $masterMenus;
    }


    public function init()
    {
        Users::insert([
            // 'id' => 1,
            [
                'name'          => 'Supersayan',
                'email'         => 'fikrifauzans.goku@gmail.com',
                'username'      => 'supersayan',
                'password'      => Hash::make('supersayan2118'),
                'role_id'       => 1
            ],

        ]);
        Roles::insert([
            ['name'  => 'Superadmin',         'slug' => 'master',              'master_menu_id' => 1], //1
            ['name'  => 'Siswa',              'slug' => 'siswa',              'master_menu_id' => 1], //1
            ['name'  => 'Guru',               'slug' => 'guru',              'master_menu_id' => 1], //1

        ]);

        $menus = [
            ['name' => 'Dashboard',           'icon' => 'dashboard',                       'path' => 'dashboard',                    'link' => '/dashboard'],        //1
            ['name' => 'Management Accounts', 'icon' => 'manage_accounts',                 'path' => null,                           'link' => null],                //2
            ['name' => 'Users',               'icon' => 'person',                          'path' => 'users',                        'link' => '/users'],            //3
            ['name' => 'Menus',               'icon' => 'widgets',                         'path' => 'menus',                        'link' => '/menus'],            //5
            ['name' => 'Master Menus',        'icon' => 'menu_open',                       'path' => 'master-menus',                 'link' => '/master-menus'],     //6
            ['name' => 'Permissions',         'icon' => 'accessibility',                   'path' => 'permissions',                  'link' => '/permissions'],      //7
            ['name' => 'Roles',               'icon' => 'assignment_ind',                  'path' => 'roles',                        'link' => '/roles'],            //4
            ['name' => 'Master Data',         'icon' => 'source',                          'path' => null,                           'link' => null],                //8
            ['name' => 'Files',               'icon' => 'source',                          'path' => 'files',                        'link' => '/files'],            //9
            ['name' => 'CMS',                 'icon' => 'circle',                          'path' => null,                           'link' =>  null],               //10
            ['name' => 'Contents',            'icon' => 'circle',                          'path' => 'contents',                     'link' =>  '/contents'],       //11



        ];
        Menus::insert($menus);
        MasterMenus::insert(
            [
                ['name' => 'Superadmin',          'status' => 1], //1
                ['name' => 'Siswa',               'status' => 1], //1
                ['name' => 'Guru',                'status' => 1], //1
            ]
        );

        $superadmin = [
            ['master_menu_id' => 1, 'parent_id' => null, 'menu_id' => 1, 'sort' => 1], //'id' => 1,
            ['master_menu_id' => 1, 'parent_id' => null, 'menu_id' => 2, 'sort' => 2], //'id' => 2,
            //Management Accounts ---------------------------------------------------------------/
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 3, 'sort' => 1], //'id' => 3, //
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 4, 'sort' => 2], //'id' => 4, //
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 5, 'sort' => 3], //'id' => 5, //
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 6, 'sort' => 4], //'id' => 6, //
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 7, 'sort' => 5], //'id' => 7, //
            //Master Data ------------------------------------------------------------------------/
            ['master_menu_id' => 1, 'parent_id' => null, 'menu_id' => 8, 'sort' => 3], //'id' => 8,
            ['master_menu_id' => 1, 'parent_id' => 8,    'menu_id' => 9, 'sort' => 1], //'id' => 9, //
            ['master_menu_id' => 1, 'parent_id' => null, 'menu_id' => 10, 'sort' => 4], //'id' => 10, //
            ['master_menu_id' => 1, 'parent_id' => 10,   'menu_id' => 11, 'sort' => 1], //'id' => 11, //



        ];



        MenuDetails::insert($superadmin);


        //PERMISSIONS
        $permissionsInit = [
            ['name' => 'Dashboard',           'slug' => 'dashboard'],
            ['name' => 'Users',               'slug' => 'users'],
            ['name' => 'Roles',               'slug' => 'roles'],
            ['name' => 'Menus',               'slug' => 'menus'],
            ['name' => 'Master Menus',        'slug' => 'master-menus'],
            ['name' => 'Permissions',         'slug' => 'permissions'],
            ['name' => 'Permission Acess',    'slug' => 'permission-access'],
            ['name' => 'Files',               'slug' => 'files'],
            ['name' => 'Schools',               'slug' => 'schools'],
            ['name' => 'Studies',               'slug' => 'studies'],
            ['name' => 'Classes',               'slug' => 'classes'],
            ['name' => 'Lesson Timetable',               'slug' => 'lesson-timetable'],
            ['name' => 'Lesson Timetable',               'slug' => 'lesson-timetable'],
            ['name' => 'Presences',               'slug' => 'presences'],
            ['name' => 'Contents',               'slug' => 'contents'],
            // Master Data

        ];
        $permissions = [];

        foreach ($permissionsInit as $key => $permission) {
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Index',    'slug' =>  $permission['slug'] . '-index']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Show',     'slug' =>  $permission['slug'] . '-show']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Update',   'slug' =>  $permission['slug'] . '-update']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Store',    'slug' =>  $permission['slug'] . '-store']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Restore',  'slug' =>  $permission['slug'] . '-restore']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Delete',   'slug' =>  $permission['slug'] . '-destroy']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Force',    'slug' =>  $permission['slug'] . '-force']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Bin',      'slug' =>  $permission['slug'] . '-bin']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Csv',      'slug' =>  $permission['slug'] . '-csv']));
        }
        // Tambahan
        // Permissions::create(['name' => 'Paket/Berangkat',       'slug' => 'packages-berangkat']);
        foreach ($permissions as $key => $access) {
            PermissionAccess::create(['permission_id' => $access['id'], 'role_id' => 1, 'status' => true]);
        }
    }

    public function getMaster()
    {
        $user = Users::with('Role')->get();
        Self::getContent();

        return $user;
    }
    public static function getContent()
    {
        /**
         * The attributes that are mass assignable.
         * @var code string 
         * @var parent_id integer 
         * @var group string 
         * @var name string 
         * @var page string 
         * @var device string 
         * @var title string 
         * @var subtitle string 
         * @var description string 
         * @var path string 
         * @var link string 
         * @var sort string 
         * @var remark text 
         * @var details text 
         * @var photo_id integer 
         */
        Contents::insert([

            // ['group' => null, 'name' => null, 'path' => null,  'sort' => null  ,'title' => null , 'subtitle' => null , 'description' => null , 'link' => null , 'code' => null],
            // NAVBAR MENU
            ['group' => 'Menu',      'name' => 'Beranda',                 'path' => 'home',       'sort' => 1, 'title' => null, 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],
            ['group' => 'Menu',      'name' => 'Paket Umrah',             'path' => 'paket-umrah', 'sort' => 2, 'title' => null, 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],
            ['group' => 'Menu',      'name' => 'Paket Haji',              'path' => 'paket-haji', 'sort' => 3, 'title' => null, 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],
            ['group' => 'Menu',      'name' => 'Dokumentasi',             'path' => 'paket-haji', 'sort' => 4, 'title' => null, 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],
            ['group' => 'Menu',      'name' => 'Tentang Kami',            'path' => 'paket-haji', 'sort' => 4, 'title' => null, 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],
            ['group' => 'Carousel',  'name' => 'Carousel',            'path' => null,        'sort' => null, 'title' => null, 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],
            ['group' => 'Awards',    'name' => 'Traver Maghfirah Awards', 'path' => null,        'sort' => null, 'title' => null, 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],
            ['group' => 'Titles',    'name' => null, 'path' => null,         'sort' => null,      'title' => 'Maghfirah Travel', 'subtitle' => 'Temukan Esensi Perjalan Suci Bersama', 'description' => null, 'link' => null, 'code' => 'title-first'],
            ['group' => 'Titles',    'name' => null, 'path' => null,         'sort' => null,      'title' => 'Maghfirah Travel', 'subtitle' => 'Paket Umrah & Haji ',                 'description' => null, 'link' => null, 'code' => 'title-haji-umrah'],


            ['group' => 'Counter', 'name' => 'Jamaah Umrah', 'path' => null,  'sort' => null, 'title' => '67,065', 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],
            ['group' => 'Counter', 'name' => 'Jamaah Haji', 'path' => null,  'sort' => null, 'title' => '3,151', 'subtitle' => null, 'description' => null, 'link' => null, 'code' => null],

            [
                'group' => 'Text',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => null,
                'subtitle' => null,
                'description' => 'Terimakasih telah mempercayakan keberangkatan anda bersama kami',
                'link' => null,
                'code' => 'text-container-2'
            ],
            [
                'group' => 'Titles',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Mengapa Memilih Maghfirah Travel ?',
                'subtitle' => 'Membantu saudara muslim sebanyak-banyaknya untuk bisa berangkat Umrah & Haji dengan mudah dan nyaman.',
                'description' => null,
                'link' => null,
                'code' => 'title-question'
            ],

            [
                'group' => 'Card Solution',
                'name' => null,
                'path' => null,
                'sort' => 1,
                'title' => 'Pembimbing Berpengalaman',
                'subtitle' => 'Memandu jamaah dengan ramah dan bersahabat dengan bimbingan ibadah Umroh dan Haji yang sesuai Sunnah Nabi ﷺ.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Card Solution',
                'name' => null,
                'path' => null,
                'sort' => 2,
                'title' => 'Legalitas Perusahaan',
                'subtitle' => 'Perusahaan travel umroh yang terdaftar dari Kementrian Agama dan bersertifikat resmi',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Card Solution',
                'name' => null,
                'path' => null,
                'sort' => 3,
                'title' => 'Harga Terjangkau',
                'subtitle' => 'Dapatkan paket Umrah & Haji maupun komponen lainnya dengan penawaran terbaik',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Card Solution',
                'name' => null,
                'path' => null,
                'sort' => 4,
                'title' => 'Layanan Terbaik',
                'subtitle' => 'Perjalanan sesuai dengan deskripsi yang ditawarkan. Informasi produk terperinci, transparan, dan tidak ada hal yang kami tutupi.',
                'description' => null,
                'link' => null,
                'code' => null
            ],

            [
                'group' => 'About Us Summary',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Sekilas Maghfirah Travel',
                'subtitle' => null,
                'description' => '
                Maghfirah Travel didirikan oleh DR.H. Ahmad Hatta, MA. dan H. Firman M Nur, M.Sc. pada tahun 2001 sebagai penyelenggara perjalanan ibadah umrah dan haji. Izin resmi dari Kemenag telah dimiliki oleh Maghfirah Travel sejak tahun 2002, yaitu:

1. Umroh No.D/252 Th.2002 dan diperbaharui No. U.561 Th. 2020
2. Haji Khusus No. D/222 Th.2004 dan diperbaharui No.557 Th. 2019

Dengan komitmen terus-menerus memberikan pelayanan terbaik bagi jamaah dan menerapkan manajemen berstandar internasional, Maghfirah Travel telah meraih sertifikat standar mutu layanan dan manajemen ISO 9001:2015. Maghfirah Travel juga banyak meraih penghargaan dari berbagai institusi dan perusahaan-perusahaan yang menjalin kerjasama dengan Maghfirah Travel.
                ',
                'link' => null,
                'code' => null
            ],

            [
                'group' => 'Card - Contact Us',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Kami Siap Melayani Anda',
                'subtitle' => null,
                'description' => 'Dapatkan informasi lengkap tentang Paket-paket Umrah dan Haji Maghfirah Travel dan program - program diskon atau promo terbaru.',
                'link' => 'Hubungi Kami',
                'code' => null
            ],
            [
                'group' => 'About Us - Service description',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Melayani & Membimbing dengan hati',
                'subtitle' => null,
                'description' => 'Jamaah haji dan umroh adalah tamu Allah, sehingga menjadi kehormatan bagi kami untuk memberikan pelayanan terbaik',
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Titles',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Apa Kata Sahabat Maghfirah',
                'subtitle' => 'Testimoni jamaah Maghfirah Travel',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Card - Testimonies',
                'name' => 'Nama Orang',
                'path' => null,
                'sort' => null,
                'title' => null,
                'subtitle' => null,
                'description' => 'Training THE POWER OF HAJJ & UMRAH membuat saya berpikir seandainya belum umrah atau haji mengikuti training ini pastilah kemabruran itu akan didapatkan." - Dini Budiarti (Peserta TPOH Maret 2015)',
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Titles',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Para Ustadz Pembimbing Pilihan',
                'subtitle' => 'Para pembimbing adalah ustadz-ustadz dengan pendidikan S1 dan S2 di universitas-universitas Islam ternama di Timur Tengah. Mereka memahami ilmu Islam dengan sangat baik dan mereka akan membimbing anda dengan sepenuh hati.',
                'description' => null,
                'link' => null,
                'code' => 'title-ustadz-list'
            ],
            [
                'group' => 'Titles',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Menjalin Kerjasama dengan Maghfirah Travel',
                'subtitle' => null,
                'description' => 'Beberapa perusahaan dan institusi yang telah bekerjasama dalam program perjalanan ibadah umroh dan haji bagi karyawan, nasabah dan para mitranya.',
                'link' => null,
                'code' => 'title-partner'
            ],
            [
                'group' => 'Titles',
                'name' => 'Ruang Edukasi',
                'path' => null,
                'sort' => null,
                'title' => 'Maghfirah Travel',
                'subtitle' => null,
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Banner - Register',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Segera Daftarkan Diri Anda',
                'subtitle' => 'Dapatkan pengalaman perjalanan yang nyaman untuk diri anda bersama kami',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'About Us - Content',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Maghfirah Travel',
                'subtitle' => null,
                'description' => 'Maghfirah yang bermakna “Ampunan” adalah tujuan umat Islam menjalankan ibadah umrah dan haji. Sesuai namanya, Maghfirah Travel sangat menginginkan dapat membimbing jamaah untuk dapat melaksanakan ibadah umroh dan haji sebenar-benarnya, yaitu sesuai sunnah Nabi Muhammad saw, sehingga dapat meraih ampunan Allah. Pada tahun 2001, DR.H. Ahmad Hatta, MA. dan H. Firman M Nur, M.Sc. mendirikan Maghfirah Travel dengan badan hukum PT. Kafilah Maghfirah Wisata. Maghfirah yang berarti ampunan menjadi visi Maghfirah Travel.',
                'link' => null,
                'code' => null
            ],

            [
                'group' => 'About Us - Vision',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => null,
                'subtitle' => null,
                'description' => 'Mengantarkan umat mendapatkan maghfirah (ampunan) dengan ilmu dan nilai yang sesuai tuntunan sunnah Rasulullah saw menuju bangsa yang diridhai.',
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'About Us - Mission',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => null,
                'subtitle' => null,
                'description' => '
                Fokus pada penanaman nilai dan pencerahan hidup
                Pelaksanaan Ibadah sesuai sunnah Rasulullah saw.
                Memberikan pelayanan prima, Memberikan layanan terbaik bagi para tamu Allah adalah bagian dari ibadah kami kepada Allah.
                Memudahkan tercapainya tujuan atau cita-cita ibadah bagi umat Islam di Indonesia, agar semakin banyak umat Islam yang bisa menunaikan ibadah di tanah suci.',
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Awards - List',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Meraih Sertifikasi ISO 9001',
                'subtitle' => null,
                'description' => 'Keseriusan Maghfirah Travel dalam memberikan pelayanan terbaik kepada jamaah diwujudkan dengan upaya standarisasi sistem manajemen dengan sertifikasi ISO 9001: 2015.
                Dan dengan komitmen terus-menerus memberikan pelayanan terbaik bagi jamaah dan mempertahankan penerapan sistem manajemen berstandar internasional, Maghfirah Travel telah meraih sertifikat standar mutu manajemen ISO 9001:2015.
                Selain itu, Maghfirah Travel juga banyak meraih penghargaan dari berbagai institusi dan perusahaan-perusahaan yang menjalin kerjasama dengan Maghfirah Travel.',
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Titles',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Maghfirah Travel',
                'subtitle' => '10 Keunggulan',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 1,
                'title' => null,
                'subtitle' => '1. Maghfirah Travel berpengalaman 21 tahun dalam memberikan pelayanan dan bimbingan terbaik kepada jamaah Haji dan Umroh Indonesia dengan telah memberangkatkan lebih dari 70.000 jamaah.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 2,
                'title' => null,
                'subtitle' => '2. Memiliki Pembimbing Ibadah terbaik dan merupakan lulusan S1, S2, dan S3 dari Universitas Ternama di Timur Tengah.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 3,
                'title' => null,
                'subtitle' => '3. Fokus pada optimalisasi ibadah, peningkatan ilmu, dan wawasan islam.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 4,
                'title' => null,
                'subtitle' => '4. Berkomitmen memberikan pelayanan terbaik dengan menerapkan manajemen mutu dan pelayanan yang berstandar Internasional ISO 9001:2015 yang dikeluarkan oleh Bureau Veritas Perancis dan Komite Akreditasi Nasional (KAN).',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 5,
                'title' => null,
                'subtitle' => '5. Maghfirah Travel berakreditasi Nilai A dari Kementrian Agama.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 6,
                'title' => null,
                'subtitle' => '6. Dipercaya oleh perusahaan Nasional, Internasional dan berbagai lembaga pemerintah dalam melayani Umroh, Haji, dan Muslim Tour.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 7,
                'title' => null,
                'subtitle' => '7. Maghfirah Travel telah mendapatkan penghargaan Moslem Choice Award pada tahun 2019 sebagai “The Best Management and Education Hajj & Umroh Organizer.”',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 8,
                'title' => null,
                'subtitle' => '8. Maghfirah Travel mendapatkan penghargaan sebagai Provider Visa Umrah terbaik dari Asosiasi Muslim Penyelenggara Haji dan Umrah Republik Indonesia (AMPHURI) tahun 2022.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 9,
                'title' => null,
                'subtitle' => '9. Secara konsisten survei tingkat kepuasan jamaah rata-rata berada di angka 9,8 dari skala 1-10.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Top Service',
                'name' => null,
                'path' => null,
                'sort' => 10,
                'title' => null,
                'subtitle' => '10. Maghfirah Travel berkomitmen untuk terus amanah dan akuntable dalam menjalankan bisnis serta melayani para Tamu Allah.',
                'description' => null,
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Footer - Address',
                'name' => 'Maghfirah Travel',
                'path' => null,
                'sort' => null,
                'title' => null,
                'subtitle' => null,
                'description' => 'Perkantoran Mitra Matraman Blok A1 No. 25-26, Jl. Matraman Raya No. 148 Jakarta 13150',
                'link' => null,
                'code' => null
            ],
            [
                'group' => 'Banner - CSO',
                'name' => null,
                'path' => null,
                'sort' => null,
                'title' => 'Kami siap membantu anda',
                'subtitle' => null,
                'description' => 'Jika anda masih bingung memilih paket yang sesuai dengan kebutuhan anda segera hubungi kami.',
                'link' => 'Konsultasi Sekarang',
                'code' => null
            ],











            // BERANDA - END 










        ]);
    }
}
