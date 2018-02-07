/* Mobile Menu */
.mm-menu {
  z-index: 998;
  font-size: 14px;
  font-weight: normal;
  font-style: normal;
  letter-spacing: 0;
  text-transform: uppercase;
}
.mm-menu .mm-panels,
.mm-menu .mm-panel,
.mm-menu .mm-panel.mm-current{
  -webkit-box-shadow: inset 1px 0 8px 0 rgba(0, 0, 0, 0.3);
  -moz-box-shadow: inset 1px 0 8px 0 rgba(0, 0, 0, 0.3);
  box-shadow: inset 1px 0 8px 0 rgba(0, 0, 0, 0.3);
}
html.mm-opening .mm-slideout,
html.mm-menu-event-open .mm-slideout {
  -webkit-transition: -webkit-transform 0.4s ease;
  -ms-transition: -ms-transform 0.4s ease;
  transition: transform 0.4s ease;
}
.mm-slideout {
  -webkit-transition-property: none;
  -moz-transition-property: none;
  -o-transition-property: none;
  transition-property: none;
  z-index: 999;
}
.mm-menu * {
  box-sizing: content-box;
}
.mmenu-link {
  display: none;
  line-height: 0;
  white-space: nowrap;
}
.mmenu-link i {
  font-size: <?php echo esc_js($the_core_less_variables['fw-icon-font-size-mobile-menu']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-icon-line-height-mobile-menu']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
  font-weight: normal;
}
.show-mobile-only {
  display: none;
}
.mm-listview{
  font-size: 14px;
  line-height: 22px;
  font-weight: normal;
  font-style: normal;
  letter-spacing: 0;
}
.header-1 .mm-listview > li > a,
.header-1 .mm-listview > li > span,
.header-2 .mm-listview > li > a,
.header-2 .mm-listview > li > span,
.header-3 .mm-listview > li > a,
.header-3 .mm-listview > li > span,
.header-4 .mm-listview > li > a,
.header-4 .mm-listview > li > span {
  padding: 15px 10px 15px 20px;
}
.mm-listview > li > p {
  padding: 10px 10px 10px 20px;
  color: rgba(255, 255, 255, 0.4);
}
.mm-listview > li > a i{
  margin-right: 10px;
}
.mm-menu .menu-separator{
  display: none;
}
.fw-header.fw-sticky-menu nav#mobile-menu {
  display: none;
}
.fw-header .fw-mobile-mega-menu-item-list {
  display: none !important;
}

/* Screen 1024px */
@media (max-width: 1199px) {
  .mm-menu {
    font-family: 'Helvetica', sans-serif;
  }
  .fw-header .mmenu-link {
    display: inline-block;
  }
  /* Reponsive Header 1 */
  .header-1.fw-top-logo-left .mmenu-link {
    float: right;
    margin-left: 1em;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search {
    float: right;
  }
  .header-1.fw-top-logo-right .mmenu-link {
    float: left;
    margin-right: 1em;
  }
  .header-1.fw-top-logo-right.search-in-menu .fw-search.fw-mini-search {
    float: left;
  }
  /* Reponsive Header 2 */
  .header-2 .mmenu-link {
    display: table-cell;
    vertical-align: middle;
    width: 1%;
  }

  /* Reponsive Header 3 */
  .header-3.search-in-menu .fw-search,
  .header-3 .mmenu-link {
    display: table-cell;
    width: 50%;
  }
  .header-3 .fw-nav-wrap {
    margin-top: 1em;
  }
  .header-3.search-in-menu .fw-mini-search .fw-search-icon {
    margin: 0 auto;
  }
  /* Reponsive Header 4 */
  .header-4 .fw-nav-wrap .fw-container {
    border-bottom: none;
    background-color: transparent;
  }
  .header-4.search-in-menu .fw-header-main .fw-nav-wrap .fw-search,
  .header-4.search-in-menu .fw-header-main .fw-nav-wrap .mmenu-link {
    display: table-cell;
    width: 50%;
    text-align: center;
  }
  .header-4.search-in-menu .fw-header-main .fw-nav-wrap .fw-mini-search .fw-search-icon {
    margin: 0 auto;
  }
  .fw-site-navigation {
    display: none !important;
  }
  em.mm-counter + a.mm-subopen {
    padding-left: 30px !important;
  }
  .mm-menu .mm-search input {
    border-radius: 4px;
  }
}
@media (min-width: 1200px) {
  #mm-my-menu,
  #mobile-menu {
    display: none !important;
  }
  .show-mobile-only {
    display: none !important;
  }
}
@media (max-width: 479px) {
  /* Reponsive Header 1 */
  .header-1.fw-top-logo-left .mmenu-link,
  .header-1.fw-top-logo-right .mmenu-link {
    display: inline-block;
    width: 100%;
    text-align: center;
    float: inherit;
    margin: 0 0 1em;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search,
  .header-1.fw-top-logo-right.search-in-menu .fw-search {
    display: inline-block;
    width: 100%;
    text-align: center;
    float: inherit;
    position: inherit;
    margin: 1em 0 0;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search .fw-wrap-search-form,
  .header-1.fw-top-logo-right.search-in-menu .fw-search .fw-wrap-search-form {
    margin: 0 auto;
    left: 0;
    right: 0;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search,
  .header-1.fw-top-logo-right.search-in-menu .fw-search.fw-mini-search {
    float: inherit;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search .fw-search-icon,
  .header-1.fw-top-logo-right.search-in-menu .fw-search.fw-mini-search .fw-search-icon {
    margin: 0 auto;
  }
  .header-1.fw-top-logo-left .fw-wrap-logo,
  .header-1.fw-top-logo-right .fw-wrap-logo {
    float: inherit;
    display: inline-block;
    width: 100%;
  }
  .header-1.fw-top-logo-left .fw-wrap-logo .fw-site-logo,
  .header-1.fw-top-logo-right .fw-wrap-logo .fw-site-logo {
    margin: 0 auto;
  }
  .header-1 .fw-sticky-menu .fw-wrap-logo {
    display: block;
    margin: 0 auto;
  }
  /* Reponsive Header 2 */
  .header-2 .fw-container .mmenu-link,
  .header-2 .fw-container .fw-nav-wrap,
  .header-2 .fw-container .fw-wrap-logo {
    width: 100%!important;
    display: table-row !important;
  }
  .header-2 .fw-container .mmenu-link {
    height: 40px;
  }
}
