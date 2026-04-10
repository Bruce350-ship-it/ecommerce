<?php
	include("includes/connection.php");
	include("includes/header.php");

	$slideshow_q = mysqli_query($link, "SELECT * FROM item ORDER BY b_id DESC LIMIT 0, 6");
	if (!$slideshow_q) {
		die('Slideshow query failed: ' . mysqli_error($link));
	}

	$slides = [];
	while ($row = mysqli_fetch_assoc($slideshow_q)) {
		$slides[] = $row;
	}

	$latest_q = mysqli_query($link, "SELECT * FROM item ORDER BY b_id DESC LIMIT 0, 12");
	if (!$latest_q) {
		die('Latest query failed: ' . mysqli_error($link));
	}
?>
<style>
/* Premium Home Page Aesthetics */
body {
    background: #f8fafc; /* light modern background */
}
.hero-slideshow {
    border-radius: 24px;
    box-shadow: 0 30px 60px -15px rgba(0,0,0,0.15);
    overflow: hidden;
    margin-bottom: 50px;
    background: #fff;
    border: 1px solid rgba(0,0,0,0.05);
}
.slideshow-wrap {
    background: linear-gradient(135deg, #e0f2fe 0%, #f0fdf4 100%);
    min-height: 400px;
}
.hero-slideshow .slide-link {
    background: transparent !important;
    gap: 40px !important;
}
.slide-img-wrap {
    background: transparent !important;
    width: 350px !important;
    transform: scale(0.9);
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}
.hero-slideshow .slide.active .slide-img-wrap {
    transform: scale(1.05);
}
.slide-img-wrap img {
    filter: drop-shadow(0 20px 30px rgba(0,0,0,0.15));
}
.slide-caption h2 {
    font-size: 2.8rem !important;
    color: #0f172a !important;
    font-weight: 800 !important;
    line-height: 1.1;
    margin-bottom: 20px !important;
    background: linear-gradient(to right, #0f766e, #2563eb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    opacity: 0;
    transform: translateX(30px);
    transition: opacity 0.8s ease 0.2s, transform 0.8s ease 0.2s;
}
.hero-slideshow .slide.active .slide-caption h2 {
    opacity: 1;
    transform: translateX(0);
}
.slide-price {
    font-size: 1.8rem !important;
    color: #f59e0b !important;
    font-weight: 900 !important;
    opacity: 0;
    transform: translateX(30px);
    transition: opacity 0.8s ease 0.4s, transform 0.8s ease 0.4s;
}
.hero-slideshow .slide.active .slide-price {
    opacity: 1;
    transform: translateX(0);
}
.slideshow-btn {
    background: rgba(255,255,255,0.7) !important;
    color: #0f172a !important;
    font-size: 30px !important;
    border-radius: 50% !important;
    width: 56px !important;
    height: 56px !important;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.slideshow-btn:hover {
    background: #ffffff !important;
    transform: translateY(-50%) scale(1.1);
}
.slideshow-dots {
    bottom: 24px !important;
}
.slideshow-dot {
    width: 12px !important;
    height: 12px !important;
    background: rgba(0,0,0,0.2) !important;
    border-radius: 6px !important;
    transition: all 0.3s ease !important;
}
.slideshow-dot.active {
    width: 32px !important;
    background: #0f766e !important;
}

/* Latest Products Section */
.post.latest-products {
    background: transparent;
    box-shadow: none;
    border: none;
}
.post.latest-products .title a {
    font-size: 2.2rem;
    font-weight: 800;
    color: #1e293b;
    position: relative;
    display: inline-block;
}
.post.latest-products .title a::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 60px;
    height: 4px;
    background: #0f766e;
    border-radius: 2px;
}

.premium-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 32px;
    padding: 10px 0;
}
.premium-item {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    padding: 24px;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    display: flex;
    flex-direction: column;
    height: 100%;
}
.premium-item:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 45px rgba(0,0,0,0.1);
    background: #ffffff;
    border-color: #e2e8f0;
}
.premium-item-img {
    height: 200px;
    margin-bottom: 24px;
    border-radius: 12px;
    background: #f8fafc;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.4s ease;
}
.premium-item:hover .premium-item-img {
    transform: scale(1.05);
    background: #f1f5f9;
}
.premium-item img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    mix-blend-mode: multiply;
}
.premium-item h2 {
    font-size: 1.15rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 12px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}
.premium-item p {
    font-size: 1.25rem;
    font-weight: 800;
    color: #0f766e;
    margin: 0;
    padding-top: 16px;
    border-top: 1px dashed #e2e8f0;
}
.premium-item-link {
    text-decoration: none !important;
    display: block;
    height: 100%;
}

/* About Us Section */
.premium-section {
    margin-top: 80px;
    margin-bottom: 80px;
}
.section-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #1e293b;
    margin-bottom: 40px;
    text-align: center;
    position: relative;
}
.section-title::after {
    content: '';
    position: absolute;
    bottom: -12px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: linear-gradient(to right, #0f766e, #2563eb);
    border-radius: 2px;
}
.about-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}
.about-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(248,250,252,0.9) 100%);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(255,255,255,0.8);
    border-radius: 20px;
    padding: 35px 25px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.about-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}
.about-icon {
    font-size: 3.5rem;
    margin-bottom: 20px;
}
.about-card h3 {
    font-size: 1.4rem;
    color: #0f172a;
    margin-bottom: 15px;
    font-weight: 700;
}
.about-card p {
    color: #475569;
    line-height: 1.6;
    font-size: 1.05rem;
    margin: 0;
}

/* FAQ Section (Accordion) */
.faq-container {
    max-width: 800px;
    margin: 0 auto;
    background: transparent;
}
.faq-item {
    background: rgba(255,255,255,0.8);
    backdrop-filter: blur(10px);
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    margin-bottom: 16px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    transition: all 0.3s ease;
}
.faq-item:hover {
    border-color: #cbd5e1;
    box-shadow: 0 6px 15px rgba(0,0,0,0.05);
}
.faq-question {
    width: 100%;
    text-align: left;
    padding: 24px;
    background: transparent;
    border: none;
    font-size: 1.15rem;
    font-weight: 700;
    color: #1e293b;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background 0.3s ease, color 0.2s ease;
}
.faq-question:hover {
    background: #f8fafc;
    color: #0f766e;
}
.faq-question::after {
    content: '+';
    font-size: 1.5rem;
    color: #0f766e;
    transition: transform 0.3s ease;
}
.faq-question.active {
    background: #f1f5f9;
    color: #0f766e;
    padding-bottom: 10px;
}
.faq-question.active::after {
    content: '-';
    transform: rotate(180deg);
}
.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s cubic-bezier(0, 1, 0, 1);
    background: #f1f5f9;
}
.faq-answer p {
    padding: 0 24px 24px;
    margin: 0;
    color: #475569;
    line-height: 1.7;
    font-size: 1.05rem;
}
.faq-answer.show {
    max-height: 1000px;
    transition: max-height 0.6s ease-in-out;
}
</style>

<section class="hero-slideshow" aria-label="Featured products">
	<div class="slideshow-wrap">
		<?php foreach ($slides as $i => $row): ?>
		<div class="slide<?php echo $i === 0 ? ' active' : ''; ?>" data-slide="<?php echo $i; ?>">
			<a href="item_detail.php?id=<?php echo (int)$row['b_id']; ?>" class="slide-link">
				<div class="slide-img-wrap">
					<img src="<?php echo htmlspecialchars($row['b_img']); ?>" alt="<?php echo htmlspecialchars($row['b_nm']); ?>">
				</div>
				<div class="slide-caption">
					<h2><?php echo htmlspecialchars($row['b_nm']); ?></h2>
					<p class="slide-price">UGX <?php echo number_format($row['b_price']); ?></p>
				</div>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
	<?php if (count($slides) > 1): ?>
	<button type="button" class="slideshow-btn slideshow-prev" aria-label="Previous slide">&lsaquo;</button>
	<button type="button" class="slideshow-btn slideshow-next" aria-label="Next slide">&rsaquo;</button>
	<div class="slideshow-dots">
		<?php foreach ($slides as $i => $row): ?>
		<button type="button" class="slideshow-dot<?php echo $i === 0 ? ' active' : ''; ?>" data-slide="<?php echo $i; ?>" aria-label="Go to slide <?php echo $i + 1; ?>"></button>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</section>

<div class="post latest-products">
	<h2 class="title" style="padding: 0 0 30px;"><a href="#">Discover Products</a></h2>
	<div class="entry" style="padding: 0;">
		<div class="premium-grid">
			<?php while ($lrow = mysqli_fetch_assoc($latest_q)): ?>
			<div class="premium-item">
				<a href="item_detail.php?id=<?php echo (int)$lrow['b_id']; ?>" class="premium-item-link">
					<div class="premium-item-img">
                        <img src="<?php echo htmlspecialchars($lrow['b_img']); ?>" alt="">
                    </div>
					<h2><?php echo htmlspecialchars($lrow['b_nm']); ?></h2>
					<p>UGX <?php echo number_format($lrow['b_price']); ?></p>
				</a>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<div class="premium-section">
    <h2 class="section-title">Why Choose JK Computers</h2>
    <div class="about-grid">
        <div class="about-card">
            <div class="about-icon">💻</div>
            <h3>Premium Selection</h3>
            <p>We hand-pick the latest, high-performance laptops and accessories to ensure you only get top-tier, reliable technology for your personal or business needs.</p>
        </div>
        <div class="about-card">
            <div class="about-icon">🛡️</div>
            <h3>Guaranteed Warranty</h3>
            <p>Every product we sell comes with a robust warranty and comprehensive support so you can shop with absolute peace of mind.</p>
        </div>
        <div class="about-card">
            <div class="about-icon">⚡</div>
            <h3>Fast & Secure Delivery</h3>
            <p>Experience hassle-free shopping with our secure checkout process and nationwide rapid delivery straight to your doorstep.</p>
        </div>
    </div>
</div>

<div class="premium-section">
    <h2 class="section-title">Frequently Asked Questions</h2>
    <div class="faq-container">
        <div class="faq-item">
            <button class="faq-question">How fast is your delivery service?</button>
            <div class="faq-answer">
                <p>We process all orders within 24 hours. Standard delivery typically takes 2-3 business days depending on your region. Expedited delivery options are also available at checkout.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Do you offer warranty on accessories?</button>
            <div class="faq-answer">
                <p>Yes! All our computers come with at least a 1-year manufacturer warranty, and our accessories generally include a 6-month defect guarantee ensuring their long-lasting quality.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Can I return a product if I am not satisfied?</button>
            <div class="faq-answer">
                <p>Absolutely. We accept returns within 14 days of purchase as long as the item is in its original packaging and condition. Simply contact our support team to initiate a return.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Is Cash on Delivery available?</button>
            <div class="faq-answer">
                <p>Yes, we currently prioritize Cash on Delivery (COD) exactly so you can inspect your products upon their arrival before finalizing your payment.</p>
            </div>
        </div>
    </div>
</div>

<script>
    // FAQ Accordion Logic
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                const currentlyActive = document.querySelector('.faq-question.active');
                
                if (currentlyActive && currentlyActive !== button) {
                    currentlyActive.classList.remove('active');
                    currentlyActive.nextElementSibling.classList.remove('show');
                }
                
                button.classList.toggle('active');
                answer.classList.toggle('show');
            });
        });
    });
</script>

<?php if (count($slides) > 1): ?>
<script>
(function() {
	var slides = document.querySelectorAll('.hero-slideshow .slide');
	var dots = document.querySelectorAll('.hero-slideshow .slideshow-dot');
	var prev = document.querySelector('.hero-slideshow .slideshow-prev');
	var next = document.querySelector('.hero-slideshow .slideshow-next');
	var current = 0;
	var autoplay = 5000;
	var timer;
	function go(n) {
		current = (n + slides.length) % slides.length;
		slides.forEach(function(s, i) { s.classList.toggle('active', i === current); });
		dots.forEach(function(d, i) { d.classList.toggle('active', i === current); });
	}
	function advance() { go(current + 1); }
	function startTimer() {
		clearInterval(timer);
		timer = setInterval(advance, autoplay);
	}
	if (prev) prev.addEventListener('click', function() { go(current - 1); startTimer(); });
	if (next) next.addEventListener('click', function() { go(current + 1); startTimer(); });
	dots.forEach(function(d, i) { d.addEventListener('click', function() { go(i); startTimer(); }); });
	startTimer();
})();
</script>
<?php endif; ?>

<?php include("includes/footer.php"); ?>

