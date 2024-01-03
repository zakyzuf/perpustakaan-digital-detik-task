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
            'id_user' => '3',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa1'
            ],
            ['judul' => 'test1',
            'id_kategori' => '1',
            'id_user' => '4',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa2'
            ],
            ['judul' => 'test2',
            'id_kategori' => '1',
            'id_user' => '3',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa3'
            ],
            ['judul' => 'test3',
            'id_kategori' => '1',
            'id_user' => '4',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa4'
            ],
            ['judul' => 'test4',
            'id_kategori' => '1',
            'id_user' => '3',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa5'
            ],
            ['judul' => 'test5',
            'id_kategori' => '1',
            'id_user' => '4',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa6'
            ],
            ['judul' => 'test6',
            'id_kategori' => '1',
            'id_user' => '3',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa7'
            ],
            ['judul' => 'test7',
            'id_kategori' => '1',
            'id_user' => '4',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa8'
            ],
            ['judul' => 'test8',
            'id_kategori' => '1',
            'id_user' => '3',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa9'
            ],
            ['judul' => 'test9',
            'id_kategori' => '1',
            'id_user' => '4',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa10'
            ],
            ['judul' => 'test10',
            'id_kategori' => '1',
            'id_user' => '3',
            'deskripsi' => 'lorem ipsum sir dolor amet',
            'jumlah' => '100',
            'file' => 'aaaaaaaaa',
            'cover' => 'bbbbbbbb',
            'slug' => 'aaa11'
            ],
        ]);
    }
}
