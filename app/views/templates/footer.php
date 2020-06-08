        <footer class="site-footer border-top">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <p>
                            Copyright &copy; 2020
                            </script> All rights reserved | Develop By <a href="https://github.com/jendrabayu/technozilla">JeNdRa</a> | Template By <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                        </p>
                    </div>

                </div>
            </div>
        </footer>
        </div>

        <script src="<?= asset('frontend/js/jquery-3.3.1.min.js') ?>"></script>
        <script src="<?= asset('frontend/js/jquery-ui.js') ?>"></script>
        <script src="<?= asset('frontend/js/popper.min.js') ?>"></script>
        <script src="<?= asset('frontend/js/bootstrap.min.js') ?>"></script>
        <script src="<?= asset('frontend/js/owl.carousel.min.js') ?>"></script>
        <script src="<?= asset('frontend/js/jquery.magnific-popup.min.js') ?>"></script>
        <script src="<?= asset('frontend/js/aos.js') ?>"></script>

        <script src="<?= asset('frontend/js/main.js') ?>"></script>

        <script>
            function initThumbnail() {
                if ($('.single_product_thumbnails ul li').length) {
                    var thumbs = $('.single_product_thumbnails ul li ');
                    var singleImage = $('.single_product_image img');

                    thumbs.each(function() {
                        var item = $(this);
                        item.on('click', function() {

                            thumbs.removeClass('active-image');
                            item.addClass('active-image');
                            var img = item.find('img').data('image');


                            //   singleImage.css('background-image', 'url(' + img + ')');
                            singleImage.attr('src', img)
                        });
                    });
                }
            }

            initThumbnail();

            document.querySelector("html").classList.add('js');

            var fileInput = document.querySelector(".input-file"),
                button = document.querySelector(".input-file-trigger"),
                the_return = document.querySelector(".file-return");

            button.addEventListener("keydown", function(event) {
                if (event.keyCode == 13 || event.keyCode == 32) {
                    fileInput.focus();
                }
            });
            button.addEventListener("click", function(event) {
                fileInput.focus();
                return false;
            });
            fileInput.addEventListener("change", function(event) {
                the_return.innerHTML = this.value;
            });
        </script>
        </body>

        </html>