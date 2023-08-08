<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Joblist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'nip' => '19216811',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('password'),
            'foto' =>'/img/profil.jpg',
            'remember_token' => 'tokenadmin'
        ]);
        User::create([
            'name' => 'user',
            'nip' => '19216812',
            'email' => 'user@gmail.com',
            'level' => 'user',
            'password' => bcrypt('password'),
            'foto' =>'/img/profil.jpg',
            'remember_token' => 'tokenuser'
        ]);
        User::create([
            'name' => 'hermansyah',
            'nip' => '1812000415',
            'email' => 'herman@gmail.com',
            'level' => 'user',
            'password' => bcrypt('password'),
            'foto' =>'/img/profil.jpg',
            'remember_token' => 'tokenuserr'
        ]);

        Joblist::create([
            'jabatan' => 'Lurah',
            'pekerjaan' => 'mempunyai tugas pokok melaksanakan kewenangan pemerintahan yang dilimpahkan oleh camat sesuai karateristik wilayah dan kebutuhan daerah serta melaksanakan tugas pemerintahan lainnya berdasarkan ketentuan peraturan perundang-undangan.'
        ]);
        Joblist::create([
            'jabatan' => 'Sekretaris',
            'pekerjaan' => '1. Menyusun rencana pengendalian dan evaluasi kegiatan-kegiatan penyelenggaraan pemerintahan, pelaksanaan pembangunan dan pembinaan kemasyarakatan.<br>
            2. Menyusun rencana dan pembinaan administrasi urusan ketatausahaan, kepegawaian, perlengkapan dan rumah tangga.<br>
            3. Mengevaluasi hasil pelaksanaan kegiatan dan melaporkan pelaksanaan kegiatan kepada lurah sebagai pertanggungjawaban pelaksanaan tugas.<br>
            4. Melaksanakan tugas lain yang diberikan atasan sesuai tugas.'
        ]);
        Joblist::create([
            'jabatan' => 'Kasi Pemerintahan',
            'pekerjaan' => '1. Pengumpulan, pengolahan dan evaluasi data di bidang pemerintahan dan kemasyarakatan.<br>
            2. Pengumpulan bahan dalam rangka pembinaan wilayah dan masyarakat.<br>
            3. Pelaksanaan pelayanan kepada masyarakat di bidang pemerintahan dan kemasyarakatan.<br>
            4. Pelaksanaan tugas-tugas pembantuan di bidang pemungutan Pajak Bumi dan Bangunan.<br>
            5. Pelakanaan tugas-tugas di bidang administrasi pertanahan sesuai dengan peraturan perundang-undangan yang berlaku.<br>
            6. Pelaksanaan kegiatan yang berkaitan dengan pembinaan lembaga kemasyarakatan.<br>
            7. Pelaksanaan pelayanan dan pengelolaan administrasi kependudukan dan data kependudukan.<br>
            8. Pelaksanaan pembinaan dalam bidang keagamaan, kesehatan, keluarga berencana & pendidikan masyarakat.<br>
            11. Pelaksanaan pengumpulan dana Palang Merah Indonesia (PMI).<br>
            12. Pengumpulan bahan dan menyusun laporan di bidang pemerintahan dan kemasyarakatan.<br>'
        ]);
        Joblist::create([
            'jabatan' => 'Kasi Trantib (Seksi Ketentraman dan Ketertiban Umum)',
            'pekerjaan' => '1. Pengumpulan, pengolahan dan evaluasi data di bidang ketentraman & ketertiban kelurahan.<br>
            2. Pembinaan ketentraman &ketertiban masyarakat termasuk pembinaan perlindungan masyarakat.<br>
            3. Pelayanan masyarakat di bidang ketentraman dan ketertiban masyarakat termasuk penanggulangan bencana alam.<br>
            4. Pelaksanaan kegiatan dalam rangka meningkatkan swadaya dan partisipasi masyarakat untuk menciptakan keamanan swakarsa di kelurahan.'
        ]);
        Joblist::create([
            'jabatan' => 'Kasi Pembangunan (Seksi Ekonomi dan Pembangunan)',
            'pekerjaan' => '1. Pengumpulan, pengolahan, dan evaluasi data di bidang ekonomi dan pembangunan.<br>
            2. Pelaksanaan kegiatan dalam rangka meningkatkan swadaya dan partisipasi masyarakat dalam rangka meningkatkan perekonomian dan pelaksanaan pembangunan.<br>
            3. Pembinaan koordinasi pelaksanaan pembangunan serta pemeliharaan prasarana dan sarana fisik asset pemerintahan kota di lingkungan kelurahan.<br>
            4. Pelaksanaan administrasi perekonomian dan pembangunan di kelurahan.<br>
            5. Pembinaan dan penyiapan bahan-bahan dalam rangka pelaksanaan Musyawarah Rencana Pembangunan (Musrenbang) Tingkat Kelurahan.<br>
            6. Pengumpulan bahan dan penyusunan laporan di bidang perekonomian dan pembangunan.'
        ]);
    }
}
