/* Posts Format */
/* -------------------------------------------------- */
.wp-caption-text,
.sticky,
.gallery-caption,
.bypostauthor {
  text-transform: none;
}
.post .entry-format:before {
  font-family: "FontAwesome";
  font-style: normal;
  margin-right: 5px;
}
.post.format-gallery .entry-format:before {
  content: "\f083";
}
.post.format-image .entry-format:before {
  content: "\f03e";
}
.post.format-audio .entry-format:before {
  content: "\f028";
}
.post.format-video .entry-format:before {
  content: "\f03d";
}
.post.format-aside .entry-format:before {
  content: "\f06a";
}
.post.format-status .entry-format:before {
  content: "\f0a1";
}
.post.format-link .entry-format:before {
  content: "\f0c1";
}
.post.format-quote .entry-format:before {
  content: "\f10d";
}
.post .aligncenter,
.post div.aligncenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.post .alignleft {
  float: left;
}
.post .alignright {
  float: right;
}
.post img.aligncenter,
.post .wp-caption {
  margin-bottom: 0;
}
.post img.alignleft,
.post .wp-caption.alignleft {
  margin: 0 5% 5px 0;
}
.post img.alignright,
.post .wp-caption.alignright {
  margin: 0 0 5px 5%;
}
.post img.alignnone,
.post .wp-caption.alignnone {
  margin: 0 0 5px;
}
.post .wp-caption img[class*="wp-image-"] {
  display: block;
  margin: 0;
}
.post figure.wp-caption {
  max-width: 100%;
  color: #767676;
}
.post .alignnone img,
.post img.alignnone,
.post .alignleft img,
.post img.alignleft,
.post .alignright img,
.post img.alignright,
.post .aligncenter img,
.post img.aligncenter {
  height: auto;
}
.post .wp-caption-text {
  font-size: <?php echo floor(floatval($the_core_less_variables['font-size-base'])*0.8); ?>px;
  line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
  color: #b6b8b9;
  position: relative;
  margin: 9px 0 0 0;
  padding: 0 5px 0 10px;
}
/* Post Format Gallery */
.post .gallery:before,
.post .gallery:after {
  content: " ";
  display: table;
}
.post .gallery:after {
  clear: both;
}
.post .gallery {
  margin-bottom: 20px;
  clear: both;
}
.post .gallery-item {
  display: inline-block;
  padding: 1.79104477%;
  text-align: center;
  vertical-align: top;
  width: 100%;
}
.post .gallery-item .gallery-caption {
  display: block;
  padding: 0.5em 0;
}
.post .gallery-item img {
  display: block;
  margin: 0 auto;
  height: auto;
}
.post .gallery-columns-2 .gallery-item {
  max-width: 50%;
}
.post .gallery-columns-3 .gallery-item {
  max-width: 33.33%;
}
.post .gallery-columns-4 .gallery-item {
  max-width: 25%;
}
.post .gallery-columns-5 .gallery-item {
  max-width: 20%;
}
.post .gallery-columns-6 .gallery-item {
  max-width: 16.66%;
}
.post .gallery-columns-7 .gallery-item {
  max-width: 14.28%;
}
.post .gallery-columns-8 .gallery-item {
  max-width: 12.5%;
}
.post .gallery-columns-9 .gallery-item {
  max-width: 11.11%;
}
.gallery-columns-6 .gallery-caption,
.gallery-columns-7 .gallery-caption,
.gallery-columns-8 .gallery-caption,
.gallery-columns-9 .gallery-caption {
  display: none;
}
.post .gallery-columns-1 .gallery-item:nth-of-type(1n),
.post .gallery-columns-2 .gallery-item:nth-of-type(2n),
.post .gallery-columns-3 .gallery-item:nth-of-type(3n),
.post .gallery-columns-4 .gallery-item:nth-of-type(4n),
.post .gallery-columns-5 .gallery-item:nth-of-type(5n),
.post .gallery-columns-6 .gallery-item:nth-of-type(6n),
.post .gallery-columns-7 .gallery-item:nth-of-type(7n),
.post .gallery-columns-8 .gallery-item:nth-of-type(8n),
.post .gallery-columns-9 .gallery-item:nth-of-type(9n) {
  margin-right: 0;
}
.post .gallery-item:hover .gallery-caption {
  opacity: 1;
}
.post .gallery-columns-7 .gallery-caption,
.post .gallery-columns-8 .gallery-caption,
.post .gallery-columns-9 .gallery-caption {
  display: none;
}