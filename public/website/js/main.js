// lazy loader
!function(window){
    var $q = function(q, res){
          if (document.querySelectorAll) {
            res = document.querySelectorAll(q);
          } else {
            var d=document
              , a=d.styleSheets[0] || d.createStyleSheet();
            a.addRule(q,'f:b');
            for(var l=d.all,b=0,c=[],f=l.length;b<f;b++)
              l[b].currentStyle.f && c.push(l[b]);

            a.removeRule(0);
            res = c;
          }
          return res;
        }
      , addEventListener = function(evt, fn){
          window.addEventListener
            ? this.addEventListener(evt, fn, false)
            : (window.attachEvent)
              ? this.attachEvent('on' + evt, fn)
              : this['on' + evt] = fn;
        }
      , _has = function(obj, key) {
          return Object.prototype.hasOwnProperty.call(obj, key);
        }
      ;

    function loadImage (el, fn) {
      var img = new Image()
        , src = el.getAttribute('data-src');
      img.onload = function() {
        if (!! el.parent)
          el.parent.replaceChild(img, el)
        else
          el.src = src;

        fn? fn() : null;
      }
      img.src = src;
    }

    function elementInViewport(el) {
      var rect = el.getBoundingClientRect()

      return (
         rect.top    >= 0
      && rect.left   >= 0
      && rect.top <= (window.innerHeight || document.documentElement.clientHeight)
      )
    }

      var images = new Array()
        , query = $q('img.lazy')
        , processScroll = function(){
            for (var i = 0; i < images.length; i++) {
              if (elementInViewport(images[i])) {
                loadImage(images[i], function () {
                  images.splice(i, i);
                });
              }
            };
          }
        ;
      // Array.prototype.slice.call is not callable under our lovely IE8 
      for (var i = 0; i < query.length; i++) {
        images.push(query[i]);
      };
  processScrollMobile = function(){
      for(var i = 0; i < images.length; i++) {
          loadImage(images[i], function() {
              images.splice(i,i);
          });
      };
  }
      processScroll();
      addEventListener('scroll',processScroll);
  addEventListener('touchmove', processScrollMobile);
  }(this);

  // end lazy loader



$('.photo_gallary').owlCarousel({
    loop: true,
    margin: 10,

    nav: true,
dot:false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})
$('.video_gallary').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
})
    $(document).ready(function () {
        $(".icon_bar").click(function () {
            $(".mobile_mega").toggle();
        });
    });
    /*mobile tooglr*/
    $(document).ready(function () {
        $(".fa-search").click(function () {
            $(".search-input").toggle();
        });
    });
    $('.video_sm_gallary').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
    });
     /*marquee*/
     $(function () {

        $('.simple-marquee-container').SimpleMarquee();

    });

/*backto top*/
//Back to top
    $('.scroll_top').click(function() {
        $('html,body').animate({

            scrollTop: 0
        }, 2000)
    });
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        
        if (scroll >= 600) {
            $('.scroll_top').fadeIn();
        } else {
            $('.scroll_top').fadeOut();
        }
    });


