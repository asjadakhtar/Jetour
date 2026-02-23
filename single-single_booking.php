<?php
/**
 * Template Name: Single Booking
 * Template for displaying single booking posts
 * Save this file as: single-booking.php in your theme directory
 */

get_header(); ?>

<section class="w-full bg-[#f5f5f5] py-20">

  <!-- MAIN CONTAINER -->
  <div class="container mx-auto px-6">

    <!-- TOP ROW -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

      <!-- LEFT : BOOKING FORM -->
      <div>
        <h2 class="text-3xl font-medium mb-6">Booking</h2>

        <div class="bg-white p-8 rounded-xl border border-gray-200">

          <form class="space-y-5">

            <!-- Row 1 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <input type="text" placeholder="Name"
                class="w-full border border-gray-300 rounded px-4 py-3
                focus:outline-none focus:ring-2 focus:black">

              <input type="email" placeholder="Email Address"
                class="w-full border border-gray-300 rounded px-4 py-3
                focus:outline-none focus:ring-2 focus:black">
            </div>

            <!-- Row 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <input type="text" placeholder="Phone Number"
                class="w-full border border-gray-300 rounded px-4 py-3
                focus:outline-none focus:ring-2 focus:black">

              <input type="text" placeholder="CNIC"
                class="w-full border border-gray-300 rounded px-4 py-3
                focus:outline-none focus:ring-2 focus:black">
            </div>

            <!-- Row 3 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

              <select
                class="w-full border border-gray-300 rounded px-4 py-3
                focus:outline-none focus:ring-2 focus:black bg-white">
                <option>Select Model</option>
                <option>Dashing</option>
                <option>X70 Plus</option>
              </select>

              <select
                class="w-full border border-gray-300 rounded px-4 py-3
                focus:outline-none focus:ring-2 focus:black bg-white">
                <option>Select City</option>
                <option>Karachi</option>
                <option>Lahore</option>
                <option>Islamabad</option>
              </select>

            </div>

            <!-- Submit -->
            <button
              class="w-full bg-[#39aeb2] text-white py-4 rounded font-medium
              hover:bg-[#2d8a8d] transition">
              SUBMIT
            </button>


          </form>

        </div>

      </div>


      <!-- RIGHT : CAR IMAGE -->
      <?php
        $car_title = get_field('car_title');
        $car_image = get_field('car_image');
        ?>

      <div class="text-center">

        <?php if($car_title): ?>
          <h3 class="text-3xl font-medium mb-6">
            <?php echo esc_html($car_title); ?>
          </h3>
        <?php endif; ?>

        <?php if($car_image): ?>
          <img
            src="<?php echo esc_url($car_image['url']); ?>"
            alt="<?php echo esc_attr($car_image['alt']); ?>"
            class="mx-auto object-contain">
        <?php endif; ?>

      </div>


    </div>


    


  
    <?php 
    $spec = get_field('specifications_section');

    if( $spec && !empty($spec['spec_tabs']) ):
    ?>

    <section class="section">
    <section class="max-w-4xl px-4 mx-auto py-10 mt-20">

    <!-- TITLE -->
    <?php if(!empty($spec['section_title'])): ?>
    <div class="text-4xl font-medium pb-12 text-center">
        <?php echo esc_html($spec['section_title']); ?>
    </div>
    <?php endif; ?>


    <!-- TAB BUTTONS -->
    <div class="mb-8 overflow-x-auto tabs-scroll">
    <div class="flex gap-3 justify-center flex-wrap min-w-max md:min-w-0">

    <?php 
    $i = 0;
    foreach($spec['spec_tabs'] as $tab): 
    if(empty($tab['tab_slug'])) continue;
    ?>
    <button
    onclick="openTab('<?php echo esc_attr($tab['tab_slug']); ?>')"
    class="tab-button px-6 py-3 rounded-full text-base font-medium border-2 border-black
    <?php echo ($i==0) ? 'active bg-black text-white' : 'bg-white text-black'; ?>">
    <?php echo esc_html($tab['tab_title'] ?? 'Tab'); ?>
    </button>
    <?php $i++; endforeach; ?>

    </div>
    </div>


    <!-- TAB CONTENT -->
    <div class="bg-white rounded-lg border-2 border-black/20 p-6" style="min-height:520px;">

    <?php 
    $i = 0;
    foreach($spec['spec_tabs'] as $tab):

    if(empty($tab['tab_rows'])) continue;

    $cols = $tab['table_columns'] ?? '2';
    ?>

    <div id="<?php echo esc_attr($tab['tab_slug']); ?>"
    class="tab-content <?php echo ($i==0)?'active':''; ?>">

    <table class="w-full border-collapse border border-slate-200 text-lg text-black">
    <tbody>

    <?php 
    $row_index = 0;
    foreach($tab['tab_rows'] as $row):

    $bg = ($row_index % 2 == 0) ? 'bg-[#f6f6f6]' : '';
    ?>

    <tr>

    <?php if($cols == '2'): ?>

    <td class="border border-slate-200 p-3 w-1/2 <?php echo $bg; ?>">
    <?php echo !empty($row['col_1']) ? esc_html($row['col_1']) : '●'; ?>
    </td>

    <td class="border border-slate-200 p-3 w-1/2 <?php echo $bg; ?>">
    <?php echo !empty($row['col_2']) ? esc_html($row['col_2']) : '●'; ?>
    </td>

    <?php else: ?>

    <td class="border border-slate-200 p-3 w-1/4 <?php echo $bg; ?>">
    <?php echo !empty($row['col_1']) ? esc_html($row['col_1']) : '●'; ?>
    </td>

    <td class="border border-slate-200 p-3 w-1/4 <?php echo $bg; ?>">
    <?php echo !empty($row['col_2']) ? esc_html($row['col_2']) : '●'; ?>
    </td>

    <td class="border border-slate-200 p-3 w-1/4 <?php echo $bg; ?>">
    <?php echo !empty($row['col_3']) ? esc_html($row['col_3']) : '●'; ?>
    </td>

    <td class="border border-slate-200 p-3 w-1/4 <?php echo $bg; ?>">
    <?php echo !empty($row['col_4']) ? esc_html($row['col_4']) : '●'; ?>
    </td>

    <?php endif; ?>

    </tr>

    <?php $row_index++; endforeach; ?>

    </tbody>
    </table>

    </div>

    <?php $i++; endforeach; ?>

    </div>
    </section>
    </section>

    <?php endif; ?>

      </div>
  </section>


<?php get_footer(); ?>