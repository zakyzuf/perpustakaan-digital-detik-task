<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('buku')->insert([
            ['judul' => 'test',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test1',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test2',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test3',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test4',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test5',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test6',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test7',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test8',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test9',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
            ['judul' => 'test10',
            'id_kategori' => '1',
            'id_user' => '2',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb'
            ],
        ]);
    }
}
