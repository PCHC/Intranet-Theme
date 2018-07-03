<?php

namespace App;

/**
 * Custom actions
 */
 add_action( 'send_email_digest', function () {
   $args = array(
     'post_type' => 'post',
     'post_status' => 'publish',
     'orderby' => 'date',
     'order' => 'DESC',
     'date_query' => array(
       array(
         'after' => '1 week ago'
       ),
     ),
   );

   $to = 'cviolette@pchc.com';
   $subject = 'Latest PCHC Employee News - ' . date('F j, Y');
   $body = "<p>Here's what you may have missed this week:</p>";
   $headers = array(
     'Content-Type: text/html; charset=UTF-8'
   );

   $digestQuery = new \WP_Query( $args );

   if( $digestQuery->have_posts() ) {
     while( $digestQuery->have_posts() ) {
       $digestQuery->the_post();

       if( has_post_thumbnail() ) {
         $body .= '<a href="'.get_the_permalink().'">';
          $body .= get_the_post_thumbnail(
            get_the_ID(),
            'thumbnail',
            array(
              'style' => 'float: left; margin-right: 12px; margin-bottom: 12px; max-width: 100px;'
            )
          );
         $body .= '</a>';
       }

       $body .= '<h2 style="font-size: 24px; font-weight: bold;"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
       $body .= "<p><em>" . get_the_date('F j, Y') . " &mdash; </em>" . get_the_excerpt() . "</p>";
       $body .= '<hr style="clear: both;"/>';
     }

     $body .= '<br/><hr/><br/><p>Stay up to date by visiting the <a href="' . get_home_url() . '">PCHC Employee Intranet</a>.</p>';
     wp_mail($to, $subject, $body, $headers);
   }

   wp_reset_postdata();
 } );
