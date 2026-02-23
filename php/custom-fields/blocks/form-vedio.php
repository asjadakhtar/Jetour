<style>
    :root {
        --primary-color: #39aeb2; 
        --primary-dark: #2d8a8d;
        --text-light: #ffffff;
        --text-muted: #b0b0b0;
        --bg-overlay: rgba(0, 0, 0, 0.8);
        --input-bg: #393939;
        --input-border: rgba(255, 255, 255, 0.15);
        --header-height: 86px; 
    }

    /* 2. Background Images */
    .video-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .video-background img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        filter: brightness(0.4);
    }

    /* Toggle visibility between Desktop and Mobile */
    .img-desktop { display: block; }
    .img-mobile { display: none; }

    @media (max-width: 768px) {
        .img-desktop { display: none !important; }
        .img-mobile { display: block !important; }
    }

    /* 3. Content Wrapper - Reduced Vertical Padding */
    .content-wrapper {
        position: relative;
        z-index: 10;
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 3rem; /* Reduced gap */
        max-width: 1300px;
        padding: 20px 2rem; /* Reduced top/bottom padding */
        width: 100%;
        align-items: center;
        margin: 0 auto;
    }

    /* 4. Intro Text */
    .intro-section {
        animation: slideInLeft 1s ease-out;
    }

    .intro-section .tagline {
        font-size: 1rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .intro-section h1 {
        font-size: clamp(2.5rem, 4vw, 3.8rem); /* Slightly smaller font */
        font-family: 'Roboto', sans-serif;
        line-height: 1.1;
        margin-bottom: 1rem;
        background: #ffffff;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
    }

    .intro-section .subtitle {
        font-size: 1.2rem;
        color: var(--text-muted);
        font-weight: 300;
    }

    /* 5. Form Container - Reduced Padding to shorten height */
    .form-container {
        background: var(--bg-overlay);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 12px;
        padding: 2rem 2.5rem; /* Reduced from 3rem */
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        animation: slideInRight 1s ease-out;
    }

    .vedio-contact-form .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .vedio-contact-form input:not([type="submit"]),
    .vedio-contact-form select {
        width: 100%;
        padding: 0.8rem 1rem; /* Slightly smaller inputs */
        background: var(--input-bg);
        border: 1px solid var(--input-border);
        border-radius: 4px;
        color: var(--text-light);
    }

    .form-submit input[type="submit"] {
        width: 100%;
        padding: 1rem;
        background: white;
        border: none;
        border-radius: 4px;
        color: #fff;
        font-weight: 700;
        text-transform: uppercase;
        color: black;
        cursor: pointer;
        transition: 0.3s;
    }

    /* --- TABLET & MOBILE CENTERING --- */
    @media (max-width: 1024px) {
        .vedio-section {
            height: auto;
            padding-bottom: 50px;
            min-height: 500px; /* Even shorter on tablet */
        }

        .content-wrapper {
            grid-template-columns: 1fr; /* Stack elements */
            text-align: center;
            max-width: 650px;
            gap: 2rem;
        }

        .form-container {
            margin: 0 auto;
            width: 100%;
        }

        .intro-section h1 br {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .vedio-section {
            padding-top: calc(var(--header-height) + 30px);
        }

        .intro-section h1 {
            font-size: 2.2rem;
        }

        /* Stack form inputs on small mobile */
        .vedio-contact-form .form-row {
            grid-template-columns: 1fr;
        }
        
        .form-container {
            padding: 1.5rem;
        }
    }

    @keyframes slideInLeft { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }
    @keyframes slideInRight { from { opacity: 0; transform: translateX(30px); } to { opacity: 1; transform: translateX(0); } }
</style>

<section class="vedio-section section">
    <div class="video-background">
        <!-- Desktop Background Image -->
        <img 
            src="https://jetour.diginest.co/wp-content/uploads/2026/02/duplicate.png" 
            alt="Desktop Background" 
            class="img-desktop"
        >
        <!-- Mobile Background Image -->
        <img 
            src="https://jetour.diginest.co/wp-content/uploads/2026/02/x70plusform2-m.png" 
            alt="Mobile Background" 
            class="img-mobile"
        >
    </div>

    <div class="content-wrapper">
        <div class="intro-section">
            <div class="tagline">Get in touch</div>
            <h1>Request a<br> Test Drive</h1>
            <div class="subtitle">Nationwide Dealerships Available</div>
        </div>

        <div class="form-container">
            <div class="vedio-contact-form">
                <?php echo do_shortcode('[contact-form-7 id="3c09baa" title="Form-Vedio"]'); ?>
            </div>
        </div>
    </div>
</section>