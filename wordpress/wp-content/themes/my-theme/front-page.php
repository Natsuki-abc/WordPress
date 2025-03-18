<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">美しくおしゃれな空間づくり</h1>
                <p class="hero-subtitle">Beautiful & Fashionable</p>
                <div class="hero-buttons">
                    <a href="#contact" class="btn btn-primary">お問い合わせ</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="service-item">
                <div class="service-image" style="background-image: url('<?php echo esc_url(get_theme_mod('service1_image', get_template_directory_uri() . '/assets/images/house.jpg')); ?>');"></div>
                <div class="service-content">
                    <h2 class="section-title">得意な注文住宅</h2>
                    <div class="service-description">
                        <p>デザイン性と機能性を両立させた、あなただけのオリジナル住宅をご提案します。ライフスタイルに合わせた間取りから、素材選びまで、トータルにサポートいたします。</p>
                    </div>
                    <a href="TODO" class="btn btn-secondary">詳しく見る</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="philosophy-section">
        <div class="container">
            <div class="philosophy-item">
                <div class="philosophy-content">
                    <h2 class="section-title">家づくりの流れ</h2>
                    <div class="philosophy-description">
                        <p>初回のご相談から設計、施工、アフターフォローまで、一貫したサービスをご提供します。お客様のご要望を丁寧にヒアリングし、理想の住まいを実現します。</p>
                    </div>
                    <a href="TODO" class="btn btn-secondary">詳しく見る</a>
                </div>
                <div class="philosophy-image" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/process_of_building_house.jpg'); ?>');"></div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-item">
                <div class="about-image" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/about.jpeg'); ?>');"></div>
                <div class="about-content">
                    <h2 class="section-title">Sample工務店について</h2>
                    <div class="about-description">
                        <p>創業以来、地域に根ざした家づくりを行ってきました。職人の技術と最新の設備を組み合わせることで、高品質な住宅を実現しています。</p>
                    </div>
                    <a href="/company/" class="btn btn-secondary">詳しく見る</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Reform Section -->
    <section class="reform-section">
        <div class="container">
            <h2 class="section-title text-center">REFORM</h2>
            <p class="section-description text-center">お客様のご要望に合わせたリフォームプランをご提案します。</p>
            <div class="reform-grid">
                <?php
                $tags = array('house', 'water_area', 'room');
                foreach ($tags as $tag) {
                    $post = get_latest_post_by_tag($tag);
                    if ($post) {
                        // アイキャッチ画像を取得
                        $reform_image = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'large') : '';
                        setup_postdata($post);
                ?>
                        <div class="reform-item">
                            <a href="<?php echo get_permalink($post); ?>" class="reform-image" style="display: block; background-image: url('<?php echo esc_url($reform_image); ?>');">
                                <div class="reform-overlay" style="position: absolute; bottom: 0; width: 100%; background: rgba(0,0,0,0.6); color: white; padding: 10px;">
                                    <h3 class="reform-item-title"><?php echo get_the_title($post); ?></h3>
                                </div>
                            </a>
                        </div>
                <?php wp_reset_postdata();
                    }
                } ?>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="features-grid">
                <?php
                $features = array(
                    array(
                        'icon' => 'icon_house',
                        'title' => '注文住宅',
                        'description' => 'ライフスタイルに合わせたオーダーメイドの住宅をご提案します。'
                    ),
                    array(
                        'icon' => 'icon_reform',
                        'title' => 'リフォーム',
                        'description' => '既存の空間を活かしながら、新しい価値を創造するリフォームプランをご提案します。'
                    ),
                    array(
                        'icon' => 'icon_support',
                        'title' => 'アフターサポート',
                        'description' => '施工後も安心の長期サポート体制でお客様の住まいをサポートします。'
                    )
                );

                foreach ($features as $index => $feature) :
                    $feature_icon =  get_template_directory_uri() . '/assets/images/' . $feature['icon'] . '.png';
                    $feature_title = get_theme_mod('feature_title' . ($index + 1), $feature['title']);
                    $feature_description = get_theme_mod('feature_description' . ($index + 1), $feature['description']);
                ?>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <img src="<?php echo esc_url($feature_icon); ?>" alt="アイコン_<?php echo esc_attr($feature_title); ?>" class="feature-image">
                        </div>
                        <h3 class="feature-title"><?php echo esc_html($feature_title); ?></h3>
                        <p class="feature-description"><?php echo esc_html($feature_description); ?></p>
                        <a href="<?php echo esc_url(get_theme_mod('feature_link' . ($index + 1), '#')); ?>" class="btn btn-small">詳しく見る</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <h2 class="section-title text-center">ACCESS MAP</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.511625527926!2d139.75534647669753!3d35.689025472584596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c0e84b3ae87%3A0x10353c93941a4c82!2z44CSMTAwLTAwMDEg5p2x5Lqs6YO95Y2D5Luj55Sw5Yy65Y2D5Luj55Sw77yR4oiS77yR!5e0!3m2!1sja!2sjp!4v1741938820175!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="map-info">
                <p>最寄り駅から徒歩5分、お気軽にお立ち寄りください。</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo esc_html(get_theme_mod('contact_title', 'お問い合わせ')); ?></h2>
            <p class="section-description text-center"><?php echo esc_html(get_theme_mod('contact_description', 'ご質問やご相談は、下記フォームよりお気軽にお問い合わせください。')); ?></p>
            <div class="contact-form">
                <?php echo do_shortcode(get_theme_mod('contact_form_shortcode', '[contact-form-7 id="325771b" title="Contact form 1"]')); ?>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php get_footer(); ?>
