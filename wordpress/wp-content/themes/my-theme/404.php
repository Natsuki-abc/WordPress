<?php get_header(); ?>

<main class="site-main error-404-area">
    <div class="container">
        <section class="error-404 not-found">
            <div class="error-content">
                <div class="error-image">
                    <div class="error-code">404</div>
                    <svg class="error-illustration" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 300">
                        <!-- シンプルな宇宙飛行士のイラスト -->
                        <circle cx="250" cy="150" r="100" fill="#f0f0f0" />
                        <path d="M200,100 Q250,50 300,100 L300,200 Q250,250 200,200 Z" fill="#fff" stroke="#e0e0e0" stroke-width="2" />
                        <circle cx="250" cy="120" r="35" fill="#fff" stroke="#e0e0e0" stroke-width="2" />
                        <circle cx="235" cy="110" r="5" fill="#555" />
                        <circle cx="265" cy="110" r="5" fill="#555" />
                        <path d="M240,135 Q250,145 260,135" fill="none" stroke="#555" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>

                <div class="page-header">
                    <h1 class="page-title">Page Not Found</h1>
                </div>

                <div class="page-content">
                    <p>指定したページが存在しません。URLが間違っていないかご確認ください。</p>
                    <div class="error-actions">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="button button-primary">
                            TOPページへ戻る
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
