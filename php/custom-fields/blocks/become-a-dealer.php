<div class="max-w-5xl mx-auto px-4 py-32">

  <h2 class="text-3xl md:text-4xl font-semibold text-center mb-12">
    Become A Dealer
  </h2>

  <div class="bg-white">
    
    <?php echo do_shortcode('[contact-form-7 id="81baaf8" title="Become a Dealer"]'); ?>

  </div>

</div>


<style>
  .dealer-form {
  max-width: 900px;
  margin: auto;
  padding: 20px;
}

.dealer-title {
  text-align: center;
  font-size: 32px;
  font-weight: 600;
  margin-bottom: 40px;
}

.dealer-row {
  display: flex;
  gap: 30px;
  margin-bottom: 30px;
}

.dealer-field {
  width: 100%;
}

.dealer-field input {
  width: 100%;
  border: none;
  border-bottom: 2px solid #36b2b0;
  padding: 10px 5px;
  font-size: 16px;
  outline: none;
}

.dealer-field input::placeholder {
  color: #777;
}

.dealer-captcha {
  margin-top: 20px;
}

.dealer-submit input {
  width: 100%;
  background: #36b2b0;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 18px;
  font-size: 16px;
  letter-spacing: 1px;
  cursor: pointer;
  text-transform: uppercase;
}

.dealer-submit input:hover {
  background: #2aa3a1;
}

/* Mobile */
@media (max-width: 768px) {
  .dealer-row {
    flex-direction: column;
  }
}

</style>
