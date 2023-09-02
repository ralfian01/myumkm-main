<?= $this->extend("MainLayout/template.php"); ?>

<!-- Pre-process - Start -->


<!-- Pre-process - Finish -->

<!-- Main content - Start -->
<?= $this->section('main'); ?>

<div class="hero1 hero_light_tx" style="background: #8383d4;">

    <nav class="nav1 mb_px0" style="z-index: 2; margin-bottom: -50px; --nv_color: #fff; --nv_item_hv_color: rgb(50, 50, 50); --nv_gr_item_hv_bg: rgb(245, 245, 245); --nv_gr_item_hv_color: rgb(50, 50, 50);">
        <div class="nav_container">
            <a href="<?= base_url(); ?>" class="nav_item py1c5 tx_lh0 mb_py0c5 tb_py0c5">
                <img class="dk_hide" src="<?= cdnURL('logo/original/origin_simplied_v1.svg'); ?>" style="height: 50px;">
            </a>

            <div class="flex y_center x_center flex_gap5 mb_hide tb_hide">

                <a href="#service" class="nav_item">
                    Layanan
                </a>

                <a href="#features" class="nav_item">
                    Fitur
                </a>

                <a href="<?= base_url(); ?>" class="nav_item py1c5 tx_lh0 mb_py0c5 tb_py0c5 mb_hide tb_hide">
                    <img src="<?= cdnURL('logo/original/origin_simplied_v1.svg'); ?>" style="height: 80px;">
                </a>

                <a href="#portofolio" class="nav_item">
                    Portofolio
                </a>

                <a href="#contact" class="nav_item">
                    Kontak
                </a>
            </div>

            <div class="mb_hide tb_hide nav_item"></div>

            <div class="nav_item">
                <div class="nav_alter_btn"></div>
            </div>
        </div>

        <div class="nav_container_alter nv_item_hv3" style="--nv_color: rgb(50, 50, 50);">

            <a href="#service" class="nav_item">
                Layanan
            </a>

            <a href="#features" class="nav_item">
                Fitur
            </a>

            <a href="#portofolio" class="nav_item">
                Portofolio
            </a>

            <a href="#contact" class="nav_item">
                Kontak
            </a>
        </div>

        <div class="alter_fixed"></div>
    </nav>
    <script type="text/javascript">
        // 
        $('body')
            .find('nav')
            .on('click', '.nav_container_alter .nav_item_group .group_init', function() {

                let mxHeight = $(this).parents('nav').height();

                $(this).parents('.nav_item_group')
                    .toggleClass('expand')
                    .css({
                        maxHeight: `calc(100vh - ${mxHeight}px)`
                    });
            })
            .on('click', '.nav_alter_btn, .alter_fixed', function() {

                let nav = $(this).parents('nav');

                $(nav)
                    .find('.nav_container_alter').toggleClass('expand');
            })
            .end();
    </script>

    <div class="hero_content">
        <div class="main_content">

            <div class="tx_w_bold tx_bg5 tb_tx_bg4 mb_tx_bg3 tx_lh1">
                Tampil Profesional dengan Website Efisien dan Ekonomis
            </div>

            <div class="mt2 tx_fam_nunito_sans tx_bg0c5 tx_lh1c9">
                Bangun website untuk bisnis anda dengan mudah dan murah
            </div>

            <div class="flex y_center x_start mt5">
                <a href="#service" class="button1 bt_white_bg">
                    Lihat layanan
                </a>

                <a href="#more" class="button1 ml0c5" style="--bt_bg: transparent; --bt_border_color: transparent;">
                    Lebih lanjut
                    <i class="ri-arrow-right-line ml0c5"></i>
                </a>
            </div>
        </div>

        <div class="addon_content tx_al_ct mb_mb4 tb_mb4" style="position: relative; z-index: -1;">
            <img class="wd100pc tb_mxa" src="<?= cdnURL('svg/original/software-anim.svg'); ?>" style="z-index: 0; max-width: 500px;">
        </div>
    </div>

    <div class="hero_background" style="filter: blur(30px); opacity: 0.5; background-image: url(<?= cdnURL('image/230316/23140105.jpg'); ?>);"></div>
</div>


<!-- Content -->
<div class="block tx_bg1 mb_tx_bg0c5 mb_tx_al_ct" style="--ctn_max_width: 1100px; --bg_netral: rgb(245, 245, 245); --bg_theme1: rgb(var(--Col_theme-main)); --col_theme1: #fff; --bg_theme1b: rgb(var(--Col_theme-main2)); --bg_theme2: rgb(var(--Col_theme-sub1)); --bg_theme2b: rgb(var(--Col_theme-sub2))">

    <!-- Services -->
    <div id="service" class="block mt10 mb_mt5">

        <div class="flex flex_gap2 y_center x_center mb_block px3 py5 mb_px2 mb_py3 mxa" style="max-width: var(--ctn_max_width);">
            <div class="flex_child">
                <div class="tx_bg2 tx_w_bolder mb_tx_bg1">
                    Apa yang kami tawarkan untuk anda?
                </div>

                <div class="mt2 anim_on_scroll anim_typing_word">
                    Kami menawarkan layanan unggulan dalam pembuatan website company profile yang dirancang untuk memenuhi kebutuhan bisnis Anda dengan segala kemudahan dan harga yang terjangkau.
                </div>
            </div>
            <div class="flex_child">
                <img src="<?= cdnURL('image/230316/23140106.png'); ?>" alt="" style="width: 100%; height: 400px; object-fit: contain;">
            </div>
        </div>

        <div class="block px3 py7 mb_px2 mb_py3" style="background: var(--bg_theme1); color: var(--col_theme1);">

            <div class="flex flex_gap2 y_center x_center mb_block mxa" style="max-width: var(--ctn_max_width);">
                <div class="flex_child">
                    <img src="<?= cdnURL('image/230316/23140107.png'); ?>" alt="" style="width: 100%; height: 400px; object-fit: contain;">
                </div>

                <div class="flex_child">
                    <div class="tx_bg2 tx_w_bolder mb_tx_bg1">
                        Kelebihan layanan kami
                    </div>

                    <hr class="sg_line3 mx0 mb_mxa" style="border-color: #fff; max-width: 100px;">

                    <div class="mt2 anim_on_scroll anim_typing_word">
                        Pengalaman kami dalam pengembangan web memungkinkan kami menyediakan fitur-fitur yang beragam, memastikan bahwa website Anda tidak hanya tampak menarik, tetapi juga fungsional.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Features -->
    <div id="features" class="block py10 mb_py3" style="background: rgb(240, 240, 240);">

        <div class="px3 mb_px2">
            <div class="tx_al_ct tx_bg2 tx_w_bolder mb_tx_bg1">
                Fitur Utama
            </div>

            <hr class="sg_line3 mxa" style="border-color: var(--bg_theme2); max-width: 70px;">

            <div class="tx_al_ct mxa mt2" style="max-width: var(--ctn_max_width);">
                Pengalaman kami dalam pengembangan web memungkinkan kami menyediakan fitur-fitur yang beragam, memastikan bahwa website Anda tidak hanya tampak menarik, tetapi juga fungsional.
            </div>
        </div>

        <?php
        $list = [
            ['title' => 'CMS Custom', 'description' => 'Loading halaman lebih cepat dengan CMS custom yang kami kembangkan', 'img' => '230316/23140108.png'],
            ['title' => 'Tampilan Responsif', 'description' => 'Tampilan UI menyesuaikan saat website dibuka di perangkat mobile, tablet, dan desktop', 'img' => '230316/23140111.png'],
            ['title' => 'Image Compression', 'description' => 'Optimasi gambar dengan format webp. Ukuran file lebih kecil tanpa menurunkan kualitas', 'img' => '230316/23140109.png'],
            // ['title' => 'Email Bisnis', 'description' => 'Tingkatkan kredibilitas bisnis anda dengan email bisnis', 'img' => '230316/23140108.png'],
            ['title' => 'Integrasi Sosial Media', 'description' => 'Integrasi website dengan akun sosial media usaha anda', 'img' => '230316/23140112.png'],
            ['title' => 'Integrasi Marketplace', 'description' => 'Integrasi website dengan akun marketplace usaha anda', 'img' => '230316/23140110.png'],
        ];
        ?>

        <div class="block tx_al_ct mxa mt5 tx_bg0c5 px3 mb_px1" style="max-width: 1500px;">

            <?php foreach ($list as $key => $val) : ?>

                <div class="borad5 p3 mx1 mb2c5 mb_mx0 mb_p2" style="box-sizing: border-box; display: inline-block; vertical-align: top; width: 100%; max-width: 400px; background: #fff; box-shadow: 0 0 30px 2px rgba(0, 0, 0, 0.08);">
                    <img src="<?= cdnURL("image/{$val['img']}"); ?>" alt="" style="width: 100%; max-width: 200px; height: 130px; object-fit: contain;">

                    <div class="block mt2">
                        <div class="tx_w_bolder tx_bg1">
                            <?= $val['title']; ?>
                        </div>
                        <div class="mt1">
                            <?= $val['description']; ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <!-- Portofolio -->
    <?php if (isset($portofolio) && count($portofolio) >= 1) : ?>

        <div id="portofolio" class="block py10 mb_py3" style="--ctn_max_width: 1400px;">

            <div class="block mxa px3 mb_px2" style="max-width: var(--ctn_max_width);">
                <div class="tx_bg2 tx_w_bolder mb_tx_bg1">
                    Portofolio
                </div>

                <hr class="sg_line3 mx0 mb_mxa" style="border-color: var(--bg_theme2); max-width: 70px;">

                <div class="mxa mt2" style="max-width: var(--ctn_max_width);">
                    Beberapa pekerjaan yang telah kami selesaikan
                </div>
            </div>

            <div class="block tx_al_ct mxa mt5 tx_bg0c5 px3 mb_px1" style="max-width: var(--ctn_max_width);">

                <?php foreach ($portofolio as $key => $val) : ?>

                    <a href="<?= $val['url']; ?>" target="_blank" class="card1 mx0c5 mb2" style="border-color: rgb(230, 230, 230); width: 100%; max-width: <?= count($portofolio) % 2 == 0 ? '320px' : '400px'; ?>; box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.1);">
                        <div class="card_img">
                            <div class="image" style="padding-bottom: 55%;">
                                <img src="<?= cdnURL("image/{$val['image_path']}"); ?>" alt="">
                            </div>
                        </div>
                    </a>

                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>

    <div class="block px3 py7 mb_px2 mb_py3" style="--ctn_max_width: 1400px; background-color: var(--bg_theme1b); background-image: url('<?= cdnURL('svg/original/fill1.svg'); ?>'); background-size: 50%; background-position: left center; background-repeat: no-repeat; color: var(--col_theme1);">

        <div class="tx_al_ct tx_bg2 tx_w_bolder mb_tx_bg1">
            Punya pertanyaan? Hubungi kami
        </div>

        <div class="form_target block mt2 mxa tx_bg0c5" style="max-width: 600px;">
            <div class="tx_field1 tx_sz_inh">
                <div class="input_label">
                    <label for="name">
                        Nama
                    </label>
                </div>

                <div class="input_item" style="color: rgb(50, 50, 50);">
                    <input type="text" name="name" id="name" placeholder="Nama anda/bisnis anda" value="">
                </div>
            </div>

            <div class="tx_field1 mt2 tx_sz_inh">
                <div class="input_label">
                    <label for="email">
                        Email
                    </label>
                </div>

                <div class="input_item" style="color: rgb(50, 50, 50);">
                    <input type="email" name="email" id="email" placeholder="ct: myname@email.com" value="">
                </div>
            </div>

            <div class="tx_field1 mt1c5 tx_sz_inh">
                <div class="input_label">
                    <label for="message">
                        Pesan
                    </label>
                </div>

                <div class="input_item" style="color: rgb(50, 50, 50);">
                    <textarea id="message" name="message" placeholder="Silakan tulis pesan" style="min-height: 150px;" maxlength="1000"></textarea>
                </div>
            </div>

            <button class="submit button1 mt2 wd100pc p1c5 tx_sz_inh">
                Kirim
            </button>
        </div>
    </div>

    <!-- Contact -->
    <div id="contact" class="block px3 py7 mb_px2 mb_py3" style="background: var(--bg_netral); --ctn_max_width: calc(425px * 3);">

        <div class="block mxa" style="max-width: var(--ctn_max_width);">
            <div class="tx_bg2 tx_w_bolder mb_tx_bg1">
                Kontak
            </div>

            <hr class="sg_line3 mx0 mb_mxa" style="border-color: var(--bg_theme2); max-width: 70px;">
        </div>

        <?php
        $contact = [
            ['username' => $address, 'url' => "", 'icon' => "ri-map-pin-line"],
            ['username' => $email, 'url' => "mailto:{$email}", 'icon' => "ri-mail-line"],
            ['username' => $phone_number, 'url' => "tel:{$phone_number}", 'icon' => "ri-phone-fill"],
        ];
        ?>

        <div class="block tx_al_ct mxa mt5 tx_bg0c5" style="max-width: var(--ctn_max_width);">

            <?php foreach ($contact as $key => $val) : ?>

                <a href="<?= $val['url']; ?>" class="borad5 p3 mx1 mb2c5 mb_mx0 mb_p2" style="color: inherit; text-decoration: none; box-sizing: border-box; display: inline-block; vertical-align: top; width: 100%; max-width: 400px; background: #fff; box-shadow: 0 0 30px 2px rgba(0, 0, 0, 0.08);">

                    <i class="<?= $val['icon']; ?> tx_w_regular tx_bg6" style="color: var(--bg_theme1);"></i>

                    <div class="block mt1">
                        <?= $val['username']; ?>
                    </div>
                </a>

            <?php endforeach; ?>

            <?php if (isset($social_media)) : ?>
                <?php foreach ($social_media as $key => $val) : ?>
                    <?php if (!in_array($val['username'], [null, ''])) : ?>

                        <a href="<?= "{$val['url']}{$val['username']}"; ?>" class="borad5 p3 mx1 mb2c5 mb_mx0 mb_p2" style="color: inherit; text-decoration: none; box-sizing: border-box; display: inline-block; vertical-align: top; width: 100%; max-width: 400px; background: #fff; box-shadow: 0 0 30px 2px rgba(0, 0, 0, 0.08);">

                            <?php if (isset($val['img']) && !empty($val['img'])) : ?>
                                <img src="<?= cdnURL($val['img']); ?>" alt="" style="width: 21px; height: 21px; fit-content: contain;">
                            <?php else : ?>
                                <i class="<?= $val['icon']; ?> tx_w_regular tx_bg6" style="color: var(--bg_theme1);"></i>
                            <?php endif; ?>

                            <div class="block mt1">
                                <?= $val['username']; ?>
                            </div>
                        </a>

                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- FAQ -->
    <div id="faq" class="block px3 py5 mb_px2 mb_py3 mb_tx_al_justify">

        <div class="tx_al_ct tx_bg2 tx_w_bolder mb_tx_bg1">
            FAQ
        </div>

        <hr class="sg_line3 mxa" style="border-color: var(--bg_theme2); max-width: 70px;">

        <div class="tx_al_ct mxa mt2" style="max-width: var(--ctn_max_width);">
            Rangkuman pertanyaan yang sering ditanyakan
        </div>

        <?php
        $list = [
            [
                'title' => 'Bagaimana cara melakukan pemesanan?',
                'description' => "
                    Anda dapat menghubungi tim kami melalui nomor whatsapp yang tersedia di bagian <a href=\"#contact\" style=\"color: rgb(var(--Col_theme-main));\">kontak</a> pada halaman ini.
                "
            ],
            [
                'title' => 'Berapa lama proses pengerjaan website?',
                'description' => "
                    Proses pengerjaan website kurang lebih selama <b>2 - 3 hari kerja</b>.
                    <br><br>Terhitung setelah anda menyelesaikan pembayaran uang muka dan melengkapi data - data yang dibutuhkan untuk pembuatan website
                "
            ],
            [
                'title' => 'Apa yang perlu saya sediakan kepada penyedia layanan untuk memulai proyek pembuatan website?',
                'description' => "
                    Berikut data - data yang biasanya kami butuhkan untuk melakukan pembuatan website:
                    <br><b>Legalitas</b>
                    <ol>
                        <li>NIB</li>
                    </ol>
                    <b>Kontak pemilik usaha</b>
                    <ol>
                        <li>Email</li>
                        <li>Nomor telepon</li>
                        <li>Alamat</li>
                    </ol>
                    <b>Profil Usaha</b>
                    <ol>
                        <li>Nama usaha</li>
                        <li>Logo usaha</li>
                        <li>Nomor telepon usaha</li>
                        <li>Alamat usaha</li>
                        <li>Kategori usaha (Kuliner, Jasa, Otomotif, Properti, dll)</li>
                        <li>Foto - foto produk atau layanan</li>
                    </ol>
                "
            ],
            [
                'title' => 'Apakah saya bisa menggunakan domain saya sendiri?',
                'description' => "
                    Maaf untuk saat ini layanan <a href=\"https://myumkm.com\" style=\"color: rgb(var(--Col_theme-main));\">MyUMKM.com</a> belum menyediakan pembuatan website dengan custom domain.
                    <br><br>Kami menyarankan anda menggunakan layanan pembuatan website dari <a href=\"https://putsutech.com\" style=\"color: rgb(var(--Col_theme-main));\">Putsutech.com</a> agar bisa membuat website dengan custom domain dan mendapatkan fitur yang lebih beragam serta desain yang dibuat custom khusus untuk website anda.
                "
            ],
            [
                'title' => 'Apakah ada biaya tambahan yang perlu saya pertimbangkan, seperti biaya perawatan atau hosting?',
                'description' => "
                    Tidak ada biaya perawatan.
                    <br>Namun ada biaya untuk hosting yang perlu anda bayar setiap 1 tahun sekali.
                "
            ],
            [
                'title' => 'Apakah saya akan memiliki akses atau kendali terhadap website setelah selesai dibuat?',
                'description' => "
                    Tentu. Anda akan diberikan hak akses halaman admin untuk mengelola konten di dalam website anda.
                "
            ],
            [
                'title' => 'Bisakah saya melihat portofolio atau contoh website yang pernah dibuat oleh penyedia layanan ini?',
                'description' => "
                    Ya. Anda dapat melihat daftar portofolio website yang telah kami selesaikan sebelumnya di bagian <a href=\"#portofolio\" style=\"color: rgb(var(--Col_theme-main));\">portofolio</a> pada halaman ini.
                "
            ],
            [
                'title' => 'Bagaimana dengan pemeliharaan dan pembaruan website setelah selesai dibuat?',
                'description' => "
                    Anda akan diberikan layanan pemeliharaan selama <b>2 minggu</b> setelah website selesai dibuat. Layanan pemeliharaan website meliputi: perubahan desain website, modifikasi konten statis pada web, penggantian domain web, dan beberapa konfigurasi pada website anda.
                    <br><br>Terkait pembaruan, setiap pembaruan pada sistem website seperti perbaikan bug, penambahan fitur, dan lain - lain <u>tim kami akan secara otomatis meng-install pembaruan tersebut ke dalam sistem website anda tanpa biaya tambahan</u> walaupun website sudah lewat dari masa pemeliharaan, namun dengan syarat anda telah menyelesaikan tagihan tahunan layanan kami yang berlaku.
                "
            ],
            [
                'title' => 'Apakah saya akan mendapatkan source code dari website saya?',
                'description' => "
                    Ya. Anda akan mendapatkan source code website beserta dokumentasi teknis tentang cara instalasi website pada komputer atau server anda.
                "
            ],
        ];
        ?>

        <div class="clp_parent block mxa mt3 tx_bg0c5" style="max-width: 900px;">

            <?php foreach ($list as $key => $val) : ?>

                <div class="collapse1 clp_anim mb2">
                    <div class="clp_init tx_w_bolder" style="cursor: pointer;">
                        <?= $val['title']; ?>
                    </div>

                    <div class="clp_container" style="border: none; background: var(--bg_netral);">
                        <div class="p1 px1c5">
                            <?= $val['description']; ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

            <script type="text/javascript">
                // Collapse box without animation
                $('body')
                    .find('.collapse1:not(.clp_anim)')
                    .on('click', '.clp_init', function() {

                        let parent = $(this).parents('.collapse1')[0],
                            grandParent = $(parent).parents('.clp_parent')[0];

                        $(grandParent).find('.collapse1').not(parent).removeClass('expand');

                        $(parent).toggleClass('expand');
                    })
                    .end()

                // Collapse box with animation
                $('body')
                    .find('.collapse1.clp_anim')
                    .on('click', '.clp_init', function() {

                        let parent = $(this).parents('.collapse1'),
                            clpContainer = $(parent).find('.clp_container')[0],
                            cntMxHeight = clpContainer.scrollHeight,
                            grandParent = $(parent).parents('.clp_parent')[0];

                        $(grandParent).find('.collapse1').not(parent).removeClass('expand');

                        $(clpContainer).css('--clp_cntr_mx_height', cntMxHeight + 'px');

                        $(parent).toggleClass('expand');
                    })
                    .end()
            </script>
        </div>
    </div>

    <!-- Review -->
    <div id="review" class="block px3 py7 mb_px2 mb_py3" style="background: var(--bg_theme2); color: #fff;">

        <div class="tx_al_ct tx_bg2 tx_w_bolder mb_tx_bg1">
            Ulasan
        </div>

        <hr class="sg_line3 mxa" style="border-color: #fff; max-width: 70px;">

        <div class="tx_al_ct mxa mt2" style="max-width: var(--ctn_max_width);">
            Lihat bagaimana klien kami memberi penilaian atas pelayanan kami
        </div>

        <?php
        $list = [
            ['name' => 'Rifky Alfian', 'review' => 'Tampilan halaman admin sederhana dan mudah dipahami. Memudahkan saya untuk mengelola konten di dalam website.', 'profession' => 'Full-stack developer'],
            ['name' => 'Muhammad Rifky', 'review' => 'Optimasi gambar dengan format webp. Ukuran file lebih kecil tanpa menurunkan kualitas.', 'profession' => 'Software developer'],
            ['name' => 'Muhammad Rifky Alfian', 'review' => 'Website berkualitas dan ramah dikantong para pelaku UMKM. Semoga sukses terus untuk MYUMKM.COM', 'profession' => 'Pelaku UMKM'],
        ];
        ?>

        <?php foreach ($list as $key => $val) : ?>

            <input type="hidden" name="reviews[]" value="<?= base64_encode(json_encode($val)); ?>">

        <?php endforeach; ?>

        <div class="block mxa mt5 tx_bg0c5 px3 mb_px1" style="max-width: 600px">

            <div class="review_target">

                <!--  -->

            </div>

            <div class="flex flex_gap3 y_center x_center mt2">

                <div class="flex_child fits">
                    <button id="prev" class="button1 tx_bg0c5" style="background: none !important; border-color: #fff !important; border-radius: 1000px; height: 40px; width: 40px;">
                        <i class="ri-arrow-left-s-line"></i>
                    </button>
                </div>

                <div class="flex_child fits">
                    <button id="next" class="button1 tx_bg0c5" style="background: none !important; border-color: #fff !important; border-radius: 1000px; height: 40px; width: 40px;">
                        <i class="ri-arrow-right-s-line"></i>
                    </button>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            // 
            let reviews = document.body.querySelectorAll('#review input[name="reviews[]"]'),
                currentIndex = 0;

            const showReview = function(data, transition) {

                const reviewTarget = document.body.querySelector('#review').querySelector('.review_target');

                const pushDOM = () => {

                    reviewTarget
                        .innerHTML = `
                            <div class="block borad10 p2 mb_p2 mxa" style="width: 100%; border: 1px solid #fff;">

                                <div class="flex y_center x_between mt2c5" style="--fit_width: 50px; min-height: 100px; position: relative;">
                                    <div class="flex_child fits" style="min-width: var(--fit_width); max-width: var(--fit_width);">
                                        <i class="ri-double-quotes-l tx_bg6 tx_lh0" style="color: var(--bg_theme2); filter: brightness(70%); position: absolute; top: -10px; z-index: 0;"></i>
                                    </div>

                                    <div class="flex_child tx_al_justify" style="position: relative; z-index: 1;">
                                        ${data['review']}
                                    </div>

                                    <div class="flex_child fits" style="min-width: var(--fit_width); max-width: var(--fit_width);">
                                        <i class="ri-double-quotes-r tx_bg6 tx_lh0" style="color: var(--bg_theme2); filter: brightness(70%); position: absolute; bottom: 0; z-index: 0;"></i>
                                    </div>
                                </div>

                                <div class="tx_w_bolder mt2c5 tx_fam_montserrat">
                                    ${data['name']}
                                </div>
                                <div class="tx_w_bolder mt0c5">
                                    ${data['profession']}
                                </div>
                            </div>
                        `;
                }

                switch (transition) {

                    case 'fadein':

                        reviewTarget.style.opacity = '0';
                        reviewTarget.style.transition = '0';
                        reviewTarget.style.transform = 'translate(0, 50px)';

                        setTimeout(() => {

                            reviewTarget.style.transition = '450ms';

                            setTimeout(() => {

                                reviewTarget.style.opacity = '1';
                                reviewTarget.style.transform = 'translate(0, 0)';

                                pushDOM();

                                setTimeout(() => {

                                    reviewTarget.style.removeProperty('opacity');
                                    reviewTarget.style.removeProperty('transform');
                                    reviewTarget.style.removeProperty('transition');
                                }, 451);
                            }, 1);
                        }, 1);
                        break;

                    default:

                        pushDOM();
                        break;
                }
            }

            // Show first review data
            if (reviews.length >= 1)
                showReview(JSON.parse(atob(reviews[currentIndex].value)));

            // When button clicked
            document.body.querySelector('#review').querySelector('button#prev')
                .addEventListener('click', function(e) {

                    if (currentIndex == 0) currentIndex = reviews.length - 1;
                    else currentIndex--;

                    showReview(JSON.parse(atob(reviews[currentIndex].value)), 'fadein');
                });

            document.body.querySelector('#review').querySelector('button#next')
                .addEventListener('click', function(e) {

                    if (currentIndex == reviews.length - 1) currentIndex = 0;
                    else currentIndex++;

                    showReview(JSON.parse(atob(reviews[currentIndex].value)), 'fadein');
                })
        </script>
    </div>
</div>

<script text="text/javascript">
    // 

    HTMLElement.prototype.typingAnimation = function(charOrWord = 'word', typingSpeed = 50) {

        const elem = this;

        const textChar = this.textContent.trim();
        let charIndex = 0;

        function typeChar() {

            elem.textContent = textChar.slice(0, charIndex);
            charIndex++;

            if (charIndex <= textChar.length)
                setTimeout(typeChar, typingSpeed);
        }

        const textWord = textChar.split(" ");

        function typeWord() {

            elem.textContent = textWord.slice(0, charIndex).join(" ");
            charIndex++;

            if (charIndex <= textWord.length)
                setTimeout(typeWord, typingSpeed);
        }

        if (charOrWord == 'word') typeWord();
        else if (charOrWord == 'char') typeChar();

        elem.classList.add('anim_running');
    }

    window.onload = function(e) {

        document.body.querySelectorAll('*[class*="anim_typing"]:not(.anim_on_scroll):not(.anim_running)')
            .forEach(function(elem, key) {

                if (elem.classList.contains('anim_typing_word')) {

                    elem.typingAnimation('word', 150);
                } else if (elem.classList.contains('anim_typing_char')) {

                    elem.typingAnimation('char', 30);
                }
            });
    };

    document.body.addEventListener('scroll', function(e) {

        this.querySelectorAll('.anim_on_scroll:not(.anim_running)')
            .forEach(function(elem, key) {

                let elemYPos = elem.getBoundingClientRect().y - window.innerHeight;

                if (elemYPos <= 0) {

                    if (elem.classList.contains('anim_typing_word')) {

                        elem.typingAnimation('word', 150);
                    } else if (elem.classList.contains('anim_typing_char')) {

                        elem.typingAnimation('char', 30);
                    }
                }
            });
    });
</script>

<!-- Footer -->
<?= $this->include("{$base_path}/components/footer.php"); ?>

<?= $this->endSection('main'); ?>
<!-- Main content - Finish -->