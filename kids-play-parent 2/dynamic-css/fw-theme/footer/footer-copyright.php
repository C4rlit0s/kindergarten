/* copyright and social area background & space */
.fw-footer-bar {
  position: relative;
  background-size: cover;
  background-repeat: no-repeat;
  background-color: <?php echo esc_js($the_core_less_variables['fw-footer-bar-bg']); ?>;
  padding-top: <?php echo esc_js($the_core_less_variables['fw-footer-bar-padding-top']); ?>;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-footer-bar-padding-bot']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-footer-bar-text']); ?>;
}

/* -------------------------------------------------------- */
/* Calculate positioning the footer copyright & social icon */
/* -------------------------------------------------------- */
<?php if( floatval($the_core_less_variables['fw-footer-social-size']) >= floatval($the_core_less_variables['fw-copyright-line-height']) ) : ?>
  .fw-copyright {
    top: <?php echo floatval($the_core_less_variables['fw-footer-social-size'])/2 - floatval($the_core_less_variables['fw-copyright-line-height'])/2; ?>px;
  }
<?php endif; ?>

<?php if( floatval($the_core_less_variables['fw-footer-social-size']) < floatval($the_core_less_variables['fw-copyright-line-height']) ) : ?>
  .fw-footer-social {
    top: <?php echo floatval($the_core_less_variables['fw-copyright-line-height'])/2 - floatval($the_core_less_variables['fw-footer-social-size'])/2; ?>px;
  }
<?php endif; ?>

/* footer copyright */
.fw-copyright {
  font-size: <?php echo esc_js($the_core_less_variables['fw-copyright-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-copyright-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-copyright-font-weight']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-copyright-font-family']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-copyright-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-copyright-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-copyright-text-color']); ?>;
  position: relative;
}
.fw-copyright a {
  color: <?php echo esc_js($the_core_less_variables['fw-copyright-text-color']); ?>;
  text-decoration: underline;
}
.fw-copyright a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-copyright-text-color']); ?>;
  text-decoration: none;
}
.fw-copyright-left .fw-copyright {
  float: left;
}
.fw-copyright-left .fw-footer-social {
  float: right;
}
.fw-copyright-right .fw-copyright {
  float: right;
}
.fw-copyright-right .fw-footer-social {
  float: left;
}
.fw-copyright-center {
  text-align: center;
}
.fw-copyright-center .fw-copyright,
.fw-copyright-center .fw-footer-social {
  top: inherit;
}

/* footer social */
.fw-footer-social {
  position: relative;
  line-height: <?php echo (floatval($the_core_less_variables['fw-footer-social-size'])*0.8); ?>px;
}
.fw-footer-social a {
  font-size: <?php echo esc_js($the_core_less_variables['fw-footer-social-size']); ?>;
  width: <?php echo esc_js($the_core_less_variables['fw-footer-social-size']); ?>;
  height: <?php echo floatval($the_core_less_variables['fw-footer-social-size'])-1; ?>px;
  color: <?php echo esc_js($the_core_less_variables['fw-footer-social-color']); ?>;
  display: inline-block;
  margin: 0 2px;
}
.fw-footer-social a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-social-hover-color']); ?>;
}

/*----> Responsive <---- */
/* Screen 568px */
@media(max-width:767px) {
  .fw-copyright-left .fw-copyright,
  .fw-copyright-left .fw-footer-social,
  .fw-copyright-right .fw-copyright,
  .fw-copyright-right .fw-footer-social {
    float: none;
    text-align: center;
  }
  .fw-footer-social {
    top: auto !important;
    margin-bottom: 10px;
  }
  .fw-footer-social a {
    margin: 0 5px;
  }
}
/* Screen 320px */
@media(max-width:479px) {
  .fw-footer-social {
    margin-bottom: 20px;
  }
}
