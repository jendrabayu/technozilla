function printData() {
    var divToPrint = document.getElementById("printTable");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
}

function initThumbnail() {
    if ($('.single_product_thumbnails ul li').length) {
        var thumbs = $('.single_product_thumbnails ul li ');
        var singleImage = $('.single_product_image img');

        thumbs.each(function () {
            var item = $(this);
            item.on('click', function () {

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

if (button) {
    button.addEventListener("keydown", function (event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput.focus();
        }
    });
    button.addEventListener("click", function (event) {
        fileInput.focus();
        return false;
    });
    fileInput.addEventListener("change", function (event) {
        the_return.innerHTML = this.value;
    });
}


var sliderTerlaris = function () {
    $('.slider_terlaris').owlCarousel({
        center: false,
        items: 1,
        loop: false,
        stagePadding: 15,
        margin: 20,
        nav: true,
        navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
        responsive: {
            600: {
                margin: 20,
                items: 3
            },
            1000: {
                margin: 20,
                items: 4
            },
            1200: {
                margin: 20,
                items: 5
            }
        }
    });
};
sliderTerlaris();