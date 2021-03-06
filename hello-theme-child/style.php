<?php
    header("Content-type: text/css; charset: UTF-8");
    // needed to load get_option, cant use symlinks to out of public_html
    require_once('../../../wp-config.php');
    // we get the hover color
    $hover = get_option('autosofta_json_color_hover');
    // we get the button color
    $button = get_option('autosofta_json_color_button');
    // we get the para color
    $para = get_option('autosofta_json_color_para');
    // we get the bg color
    $bg = get_option('autosofta_json_color_bg');
    
    
    
?>
<?php echo '

.noUi-base .noUi-connect {
  background-color: #'. $button.'!important;
}
.alm-filter--radio .field-radio.active:before {
  background-color: #'. $button.'!important;
  border-color: #'. $button.'!important;
}
.alm-filter--select select {
  position: relative;
  padding: 8px 20px;
  outline: none;
  border-color: #'. $button.'!important;
  border-width: 2px;
  width: 100%;
  border-radius: 10px;
}
.page-template-page-cars .alm-filters-container, .page-template-page-vaihtoautot .alm-filters-container {
  display: block;
  background-color: rgba(124, 124, 124, 0.1);
  box-shadow: 0px 0px 10px rgb(0 0 0 / 20%);
  border-radius: 50px;
  padding: 15px;
  margin: 0 15px;
  text-align: center;
}
#alm-filters-cars {
  display: grid;
  background-color: rgba(124, 124, 124, 0.1);
  box-shadow: 0px 0px 10px rgb(0 0 0 / 20%);
  border-radius: 15px;
  padding: 15px;
  margin: 0 15px;
  text-align: center;
  grid-template-columns: 15% 15% 15% 25% 25%;
  grid-template-rows: auto auto auto auto auto;
  grid-gap: 10px;
}
#alm-filter-7 {
  display:none;
}
.alm-filter--range_slider {
  width: 90%;
}
';
?>
<?php echo '.single-car {
  padding: 30px;
  font-size: 18px;
  line-height: 1.4;
}
@media (min-width: 576px) {
  .single-car {
    padding: 50px 50px;
  }
}
.single-car .single-car-content {
  display: block;
  width: 100%;
  color: #'. $para.';
  font-family: "roboto";

}
.single-car .single-car-content .car-section {
  max-width: 1024px;
  margin: 0 auto 65px auto;
}
.single-car .single-car-content .car-section.nomargin {
  margin-bottom: 0;
}
@media (min-width: 1600px) {
  .single-car .single-car-content .car-section.car-split-section {
    max-width: 1500px;
    display: flex;
    flex-wrap: wrap;
  }
  .single-car .single-car-content .car-section.car-split-section .split-section {
    position: relative;
  }
  .single-car .single-car-content .car-section.car-split-section .split-section.left-section {
    width: 65%;
  }
  .single-car .single-car-content .car-section.car-split-section .split-section.right-section {
    width: 35%;
    display: flex;
  }
}
.single-car .single-car-content .car-section .car-back-to {
  display: table;
  color: #'. $hover.';
  text-decoration: none;
}
.single-car .single-car-content .car-section .car-back-to:hover {
  color: #'. $hover.';
  text-decoration: underline;
}
.single-car .single-car-content .car-section .car-slider .slick-slide {
  z-index: 1;
  position: relative;
}
.single-car .single-car-content .car-section .car-slider .slick-slide .inner {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  padding-bottom: 66.66%;
}
.single-car .single-car-content .car-section .car-slider .slick-slide a {
  z-index: 2;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  cursor: zoom-in;
}
.single-car .single-car-content .car-section .car-slider .slick-arrow {
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 3;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 30px;
  height: 30px;
  margin: 0;
  padding: 0;
  color: #'. $bg.';
  border-color: #'. $bg.';
  border-width: 1px;
  border-style: double;
  outline: none;
  box-shadow: none;
  font-size: 18px;
  font-weight: normal;
  line-height: normal;
  background-color: transparent;
}
@media (min-width: 576px) {
  .single-car .single-car-content .car-section .car-slider .slick-arrow {
    width: 50px;
    height: 50px;
    font-size: calc(18px * 1.33);
  }
}
.single-car .single-car-content .car-section .car-slider .slick-arrow:hover {
  background-color: #'. $bg.';
  color: #'. $hover.';
  cursor: pointer;
}
.single-car .single-car-content .car-section .car-slider .slick-arrow:focus {
  background-color: transparent;
  color: #'. $bg.';
}
.single-car .single-car-content .car-section .car-slider .slick-arrow.slick-prev {
  left: 5px;
}
.single-car .single-car-content .car-section .car-slider .slick-arrow.slick-next {
  right: 5px;
}
.single-car .single-car-content .car-section .car-ingress {
  flex: 1;
  margin-top: 0;
  background-color: #'. $bg.';
  border-radius: 0;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  padding: 20px 30px;
}
.single-car .single-car-content .car-section .car-ingress h2 {
  margin: 0;
  color: #'. $hover.';
}
.single-car .single-car-content .car-section .car-ingress hr {
  margin: 25px 0;
}
.single-car .single-car-content .car-section .car-ingress .price {
  margin-top: 35px;
  margin-bottom: 0;
  font-size: calc(18px * 2);
}
.single-car .single-car-content .car-section .car-ingress div.car-cta {
  padding: 40px 25px;
  margin: 50px 0 0 0;
  border-radius: 15px;
  background: #'. $hover.';
  color: #'. $bg.';
  text-align: center;
}
.single-car .single-car-content .car-section .car-ingress div.car-cta h3, .single-car .single-car-content .car-section .car-ingress div.car-cta h4 {
  margin: 0 0 35px 0;
}
.single-car .single-car-content .car-section .car-ingress div.car-cta h3 a, .single-car .single-car-content .car-section .car-ingress div.car-cta h4 a {
  color: #'. $bg.';
  text-decoration: none;
}
.single-car .single-car-content .car-section .car-ingress div.car-cta h3 a:hover, .single-car .single-car-content .car-section .car-ingress div.car-cta h4 a:hover {
  text-decoration: underline;
}
.single-car .single-car-content .car-section .car-ingress div.car-cta h3 a:focus, .single-car .single-car-content .car-section .car-ingress div.car-cta h4 a:focus {
  color: #'. $bg.';
}
.single-car .single-car-content .car-section .car-ingress div.car-cta .links {
  display: table;
  margin: 0 auto 30px auto;
  text-align: left;
}
.single-car .single-car-content .car-section .car-ingress div.car-cta .links a {
  display: table;
  margin: 0 0 15px 0;
  transition: all 0.33s ease;
  color: #'. $bg.';
  text-decoration: none;
  font-size: calc(18px * 1.2);
}
.single-car .single-car-content .car-section .car-ingress div.car-cta .links a:hover {
  color: #'. $bg.';
  text-decoration: underline;
}
.single-car .single-car-content .car-section .car-ingress div.car-cta .links a i {
  margin-right: 15px;
}
.single-car .single-car-content .car-section .car-ingress div.car-cta .contact-link {
  transition: all 0.33s ease;
  display: table;
  margin: 0 auto;
  padding: 15px 25px;
  border-radius: 15px;
  border: 2px solid #'. $bg.';
  background-color: #'. $hover.';
  color: #'. $bg.';
  font-size: 18px;
  letter-spacing: 1.5px;
  text-decoration: none;
}
.single-car .single-car-content .car-section .car-ingress div.car-cta .contact-link:hover {
  text-decoration: none;
  background-color: #'. $bg.';
  color: #'. $hover.';
}
.single-car .single-car-content .car-table {
  width: 100%;
  border-spacing: 0;
  border-collapse: collapse;
}
.single-car .single-car-content .car-table th, .single-car .single-car-content .car-table td {
  font-size: 18px;
  padding: 15px;
  line-height: 1.5;
  vertical-align: top;
  border: 1px solid #ccc;
}
.single-car .single-car-content .car-table tr:nth-child(odd) > td {
  background-color: #f8f8f8;
}

.page-template-page-cars .filter-section,
.page-template-page-vaihtoautot .filter-section {
  display: none;
}
@media (min-width: 768px) {
  .page-template-page-cars .filter-section,
.page-template-page-vaihtoautot .filter-section {
    display: block;
  }
}
.page-template-page-cars #show-filters,
.page-template-page-vaihtoautot #show-filters {
  display: table;
  min-width: 250px;
  transition: all 0.33s ease;
  background-color: transparent;
  border: 1px solid #'. $button.';
  border-radius: 15px;
  padding: 15px 30px;
  color: #'. $button.';
  font-weight: bold;
  text-align: center;
  margin: 0 auto;
  letter-spacing: 1px;
  text-decoration: none;
}
@media (min-width: 768px) {
  .page-template-page-cars #show-filters,
.page-template-page-vaihtoautot #show-filters {
    display: none;
  }
}
.page-template-page-cars #show-filters:after,
.page-template-page-vaihtoautot #show-filters:after {
  content: "???";
  margin-left: 10px;
  font-family: "Font Awesome 5 Free";
}
.page-template-page-cars #show-filters:hover,
.page-template-page-vaihtoautot #show-filters:hover {
  background-color: #'. $button.';
  color: #'. $bg.';
  text-decoration: none;
}
.page-template-page-cars #clear-filters,
.page-template-page-vaihtoautot #clear-filters {
  display: none;
  margin: 25px auto 0 auto;
  color: #'. $button.';
  font-weight: bold;
  text-align: center;
  text-decoration: none;
}
.page-template-page-cars .alm-filters-container,
.page-template-page-vaihtoautot .alm-filters-container {
  display: block;
  background-color: rgba(124, 124, 124, 0.1);
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  border-radius: 15px;
  padding: 15px;
  margin: 0 15px;
  text-align: center;
}
@media (min-width: 768px) {
  .page-template-page-cars .alm-filters-container,
.page-template-page-vaihtoautot .alm-filters-container {
    padding: 15px 25px;
    text-align: left;
  }
}
.page-template-page-cars .alm-filters-container *,
.page-template-page-vaihtoautot .alm-filters-container * {
  font-size: calc(18px * 0.9) !important;
}
.page-template-page-cars .alm-filters-container .alm-filter,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter {
  margin: 0;
  padding: 15px 15px 0 15px;
}
@media (min-width: 768px) {
  .page-template-page-cars .alm-filters-container .alm-filter,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter {
    display: inline-block;
    width: auto;
  }
}
.page-template-page-cars .alm-filters-container .alm-filter.clear,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.clear {
  margin: 0;
  padding: 0;
  width: 1px;
  height: 1px;
  display: block;
  opacity: 0;
}
.page-template-page-cars .alm-filters-container .alm-filter.year, .page-template-page-cars .alm-filters-container .alm-filter.km,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km {
  width: 100%;
}
@media (min-width: 768px) {
  .page-template-page-cars .alm-filters-container .alm-filter.year, .page-template-page-cars .alm-filters-container .alm-filter.km,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km {
    width: calc(50% - 10px);
  }
  .page-template-page-cars .alm-filters-container .alm-filter.year.year, .page-template-page-cars .alm-filters-container .alm-filter.km.year,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year.year,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km.year {
    margin-right: 20px;
  }
  .page-template-page-cars .alm-filters-container .alm-filter.year label, .page-template-page-cars .alm-filters-container .alm-filter.km label,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year label,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km label {
    text-align: left !important;
  }
}
@media (min-width: 1200px) {
  .page-template-page-cars .alm-filters-container .alm-filter.year, .page-template-page-cars .alm-filters-container .alm-filter.km,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km {
    width: calc(33.333% - 25px);
    margin-right: 50px;
  }
}
.page-template-page-cars .alm-filters-container .alm-filter.year label, .page-template-page-cars .alm-filters-container .alm-filter.km label,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year label,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km label {
  margin: 15px 0 20px 0;
  text-align: center;
}
.page-template-page-cars .alm-filters-container .alm-filter.year .alm-range-reset, .page-template-page-cars .alm-filters-container .alm-filter.km .alm-range-reset,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year .alm-range-reset,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km .alm-range-reset {
  display: none !important;
}
.page-template-page-cars .alm-filters-container .alm-filter.year .alm-range-slider--label, .page-template-page-cars .alm-filters-container .alm-filter.km .alm-range-slider--label,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year .alm-range-slider--label,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km .alm-range-slider--label {
  margin: 0;
  display: block;
  width: 100%;
  color: rgba(124, 124, 124, 0.1);
}
.page-template-page-cars .alm-filters-container .alm-filter.year .alm-range-slider--label .alm-range-start, .page-template-page-cars .alm-filters-container .alm-filter.km .alm-range-slider--label .alm-range-start,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year .alm-range-slider--label .alm-range-start,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km .alm-range-slider--label .alm-range-start {
  color: #'. $para.';
  float: left;
}
.page-template-page-cars .alm-filters-container .alm-filter.year .alm-range-slider--label .alm-range-end, .page-template-page-cars .alm-filters-container .alm-filter.km .alm-range-slider--label .alm-range-end,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year .alm-range-slider--label .alm-range-end,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km .alm-range-slider--label .alm-range-end {
  color: #'. $para.';
  float: right;
}
.page-template-page-cars .alm-filters-container .alm-filter.year.km .alm-range-start:after,
.page-template-page-cars .alm-filters-container .alm-filter.year.km .alm-range-end:after, .page-template-page-cars .alm-filters-container .alm-filter.km.km .alm-range-start:after,
.page-template-page-cars .alm-filters-container .alm-filter.km.km .alm-range-end:after,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year.km .alm-range-start:after,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year.km .alm-range-end:after,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km.km .alm-range-start:after,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km.km .alm-range-end:after {
  content: " km";
}
.page-template-page-cars .alm-filters-container .alm-filter.year .noUi-base .noUi-connect, .page-template-page-cars .alm-filters-container .alm-filter.km .noUi-base .noUi-connect,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year .noUi-base .noUi-connect,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km .noUi-base .noUi-connect {
  background-color: #'. $button.';
}
.page-template-page-cars .alm-filters-container .alm-filter.year .noUi-base .noUi-handle, .page-template-page-cars .alm-filters-container .alm-filter.km .noUi-base .noUi-handle,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year .noUi-base .noUi-handle,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km .noUi-base .noUi-handle {
  border-radius: 50%;
  width: 25px;
  height: 25px;
}
.page-template-page-cars .alm-filters-container .alm-filter.year .noUi-base .noUi-handle:before, .page-template-page-cars .alm-filters-container .alm-filter.year .noUi-base .noUi-handle:after, .page-template-page-cars .alm-filters-container .alm-filter.km .noUi-base .noUi-handle:before, .page-template-page-cars .alm-filters-container .alm-filter.km .noUi-base .noUi-handle:after,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year .noUi-base .noUi-handle:before,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.year .noUi-base .noUi-handle:after,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km .noUi-base .noUi-handle:before,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.km .noUi-base .noUi-handle:after {
  display: none;
}
.page-template-page-cars .alm-filters-container .alm-filter.order, .page-template-page-cars .alm-filters-container .alm-filter.orderby,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.order,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter.orderby {
  text-align: left;
}
.page-template-page-cars .alm-filters-container .alm-filter .alm-filter--inner,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter .alm-filter--inner {
  padding: 0;
}
.page-template-page-cars .alm-filters-container .alm-filter .alm-filter--title,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter .alm-filter--title {
  margin: 15px 0 20px 0;
}
.page-template-page-cars .alm-filters-container .alm-filter .alm-filter--title > *,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter .alm-filter--title > * {
  margin: 0;
}
.page-template-page-cars .alm-filters-container .alm-filter .alm-filter--select,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter .alm-filter--select {
  display: block;
  width: 100%;
}
.page-template-page-cars .alm-filters-container .alm-filter .alm-filter--select select,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter .alm-filter--select select {
  position: relative;
  padding: 8px 20px;
  outline: none;
  border-color: #'. $button.';
  border-width: 2px;
  width: 100%;
  border-radius: 10px;
}
.page-template-page-cars .alm-filters-container .alm-filter .alm-filter--select select:disabled,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter .alm-filter--select select:disabled {
  border-color: rgba(0, 15, 80, 0.5);
}
@media (min-width: 768px) {
  .page-template-page-cars .alm-filters-container .alm-filter .alm-filter--select select,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter .alm-filter--select select {
    width: 165px;
  }
}
.page-template-page-cars .alm-filters-container .alm-filter .alm-filter--radio .field-radio.active:before,
.page-template-page-vaihtoautot .alm-filters-container .alm-filter .alm-filter--radio .field-radio.active:before {
  background-color: #'. $button.';
  border-color: #'. $button.';
}
.page-template-page-cars .ajax-load-more-wrap,
.page-template-page-vaihtoautot .ajax-load-more-wrap {
  margin-top: 50px;
  font-weight: bold;
  font-size: 18px;
}
.page-template-page-cars .alm-reveal,
.page-template-page-vaihtoautot .alm-reveal {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
}
.page-template-page-cars .alm-reveal > *,
.page-template-page-vaihtoautot .alm-reveal > * {
  font-size: 18px;
}
.page-template-page-cars .alm-listing,
.page-template-page-vaihtoautot .alm-listing {
  text-align: center;
}
.page-template-page-cars .alm-listing > *,
.page-template-page-vaihtoautot .alm-listing > * {
  text-align: left;
}
.page-template-page-cars .alm-load-more-btn,
.page-template-page-vaihtoautot .alm-load-more-btn {
  margin-top: 50px !important;
  height: auto !important;
  padding: 20px 45px !important;
  font-size: calc(18px * 1.2) !important;
  background-color: #'. $hover.' !important;
  letter-spacing: 1.5px !important;
  font-weight: bold !important;
}
.page-template-page-cars .alm-load-more-btn:hover,
.page-template-page-vaihtoautot .alm-load-more-btn:hover {
  cursor: pointer !important;
  background-color: #'. $button.' !important;
}
.page-template-page-cars .alm-load-more-btn.done:hover,
.page-template-page-vaihtoautot .alm-load-more-btn.done:hover {
  background-color: #'. $hover.' !important;
  cursor: default !important;
}
.page-template-page-cars .alm-load-more-btn:before,
.page-template-page-vaihtoautot .alm-load-more-btn:before {
  display: none !important;
}

.carslist {
  padding: 15px;
  font-family: "Open Sans", Sans-serif;
  line-height: 1.4;
}
@media (min-width: 576px) {
  .carslist {
    padding: 50px 50px;
  }
}
.carslist .listing-title {
  margin: 25px auto 50px auto;
  text-align: center;
  color: #'. $hover.';
  font-size: calc(18px * 1.8);
}
@media (min-width: 576px) {
  .carslist .listing-title {
    margin: 0 auto 50px auto;
  }
}
.carslist .car-listing {
  display: block;
  margin: 0 auto;
  max-width: 1600px;
  width: 100%;
  color: #'. $para.';
}

article > .car-card {
  width: 100% !important;
  height: 100% !important;
  margin-left: 0 !important;
  margin-right: 0 !important;
}

.car-card {
  font-family: "Open Sans", Sans-serif;
  font-size: 18px;
  display: inline-block;
  vertical-align: top;
  width: 31%!important;
  margin: 15px;
  background-color: #'. $bg.';
  color: #'. $para.';
  font-weight: normal;
}
@media (min-width: 768px) {
  .car-card {
    width: calc(50% - 30px);
  }
}
@media (min-width: 1200px) {
  .car-card {
    width: calc(33.3333% - 30px);
  }
}
.car-card .inner {
  height: 100%;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  border-radius: 15px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.car-card .inner .cover {
  position: relative;
  transition: all 0.33s ease;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  padding-bottom: 66.66%;
}
.car-card .inner .cover:hover {
  filter: brightness(115%);
}
.car-card .inner .cover .price {
  position: absolute;
  bottom: 0;
  right: 0;
  padding: 15px;
  background-color: #'. $button.';
  color: #'. $bg.';
  letter-spacing: 1.5px;
  border-radius: 15px 0 0 0;
}
.car-card .inner .text {
  flex: 1;
  padding: 25px 25px 15px 25px;
  display: flex;
  flex-direction: column;
}
.car-card .inner .text hr {
  margin: 25px 0;
}
.car-card .inner .text .model {
  flex: 1;
  font-size: calc(18px * 1.1);
  font-weight: bold;
  color: #'. $button.';
  margin: 0;
}
.car-card .inner .text .model a {
  text-decoration: none;
  color: #'. $button.';
}
.car-card .inner .text .model a:hover {
  text-decoration: underline;
}
.car-card .inner .text .model .definition {
  font-size: 18px;
  color: #'. $para.';
  font-weight: normal;
}
.car-card .inner .text .specs {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.car-card .inner .text .specs .spec {
  margin-bottom: 10px;
  width: 100%;
}
@media (min-width: 992px) {
  .car-card .inner .text .specs .spec {
    width: 50%;
  }
}
@media (min-width: 1200px) {
  .car-card .inner .text .specs .spec {
    width: 100%;
  }
}
@media (min-width: 1400px) {
  .car-card .inner .text .specs .spec {
    width: 50%;
  }
}
.car-card .inner .text .specs .spec svg, .car-card .inner .text .specs .spec span {
  margin: 0 10px 0 0;
  display: inline-block;
  vertical-align: middle;
}
.car-card .inner .text .specs .spec svg {
  height: 20px;
  width: auto;
}
.car-card .inner .call {
  padding: 15px 5px 20px 5px;
  text-align: center;
}
.car-card .inner .read-more {
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  text-align: center;
  font-weight: bold;
}
.car-card .inner .read-more .cta {
  transition: all 0.33s ease;
  padding: 15px 25px;
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  background-color: #'. $button.';
  color: #'. $bg.';
  letter-spacing: 1.5px;
  text-transform: uppercase;
  font-size: calc(18px * 0.9);
  text-decoration: none;
}
.car-card .inner .read-more .cta:hover {
  
  background-color: #'. $hover.';
  text-decoration: none;
}
.car-card .inner .read-more .cta.green {
  background-color: #118d11;
}
.car-card .inner .read-more .cta.green:hover {
  background-color: #678d11;
  text-decoration: none;
}
.car-card .inner #qlwapp {
  display: inline-block;
  vertical-align: middle;
  width: 45px;
  height: 45px;
}
.car-card .inner .phonelink-wrap {
  display: inline-block;
  vertical-align: middle;
}
.car-card .inner #qlwapp .qlwapp-toggle,
.car-card .inner .phonelink {
  transition: all 0.33s ease;
  margin: 0 15px;
  width: 45px;
  height: 45px;
  background-color: #'. $button.';
  border-radius: 50%;
  font-size: calc(18px * 1.4);
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
}
.car-card .inner #qlwapp .qlwapp-toggle i,
.car-card .inner .phonelink i {
  color: #'. $bg.';
  line-height: normal;
}
.car-card .inner #qlwapp .qlwapp-toggle:hover,
.car-card .inner .phonelink:hover {
  background-color: #'. $hover.';
  text-decoration: none;
}';
?>